<?php

namespace App\Controller;

use \Core\Controller\Controller;
use \App\Controller\UserController;

class RecipeController extends AppController {


    public function __construct() {

        parent::__construct();
        $this->loadModel('Recipe');
        $this->loadModel('Category');
        $this->loadModel('Difficulty');
        $this->loadModel('User');
    }


    public function index() {

        //$recipeTable = $this->Recipe;
        $nbOfRecipes = $this->Recipe->getNumberOfRecipes()->id;
        $randomRecipeId = rand(1, $nbOfRecipes);
    	$randomRecipe = $this->Recipe->getRecipe($randomRecipeId);

        $nbMin = $randomRecipe->nb_personnes_min;
        $nbMax = $randomRecipe->nb_personnes_max;
        $nbPersonnes = $nbMin === $nbMax ? $nbMin : ($nbMin . ' à ' . $nbMax);

        $username = $this->User->getUsername($randomRecipe->id_user);
        $difficulty = $this->Difficulty->getDifficultyById($randomRecipe->id_difficulty);
        $difficulty = $difficulty[0]->difficulty;
        $ingredients = $this->Recipe->getIngredients($randomRecipe->id);
        $preparations = $this->Recipe->getPreparation($randomRecipe->id);

        // CATEGORIES
        $allRecipesByCategory = $this->Recipe->getAllByCategory($randomRecipe->id_categorie);
        // Remove current recipe from all recipes by category
        foreach ($allRecipesByCategory as $key => $r) {
            if($r->id == $randomRecipe->id) {
                array_splice($allRecipesByCategory, $key, 1);
            }
        }
        $photoPath = $randomRecipe->photo;
        // Header
        $UserController = new UserController();
        $navbarConnect = $UserController->navbarConnect();

        $this->render('Recipe.index', compact(  // équivalent à ['recette' => 'recette'...]
            'randomRecipe', 'photoPath', 'username', 'difficulty', 'nbPersonnes',
            'ingredients', 'preparations', 'allRecipesByCategory', 'navbarConnect'
        ));
    }


    public function category() {

        $table = $this->Category;
        var_dump($table);
        //$categorie = $table->getAllByCategory($_GET['id']);
        $categorie = $table->all();
        var_dump($categorie);

        if ($category === false) {
            $this->notFound();
        }

        $this->render('Recipe.category', compact('categorie'));
    }


    public function show() {

        $recipe = $this->Recipe->getRecipe($_GET['id']);
        $username = $this->User->getUsername($recipe->id_user);
        $difficulty = $this->Difficulty->getDifficultyById($recipe->id_difficulty);
        $difficulty = $difficulty[0]->difficulty;
        $nbMin = $recipe->nb_personnes_min;
        $nbMax = $recipe->nb_personnes_max;
        $nbPersonnes = $nbMin === $nbMax ? $nbMin : ($nbMin . ' à ' . $nbMax);
        $ingredients = $this->Recipe->getIngredients($recipe->id);
        $preparations = $this->Recipe->getPreparation($recipe->id);

        // CATEGORIES
        $allRecipesByCategory = $this->Recipe->getAllByCategory($recipe->id_categorie);
        // Remove current recipe from all recipes by category
        foreach ($allRecipesByCategory as $key => $r) {
            if($r->id == $_GET['id']) {
                array_splice($allRecipesByCategory, $key, 1);
            }
        }

        $this->render('Recipe.recipe', compact(
            'recipe', 'username', 'difficulty','nbPersonnes', 'ingredients',
            'preparations', 'allRecipesByCategory'));
    }
}
