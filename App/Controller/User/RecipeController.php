<?php

namespace App\Controller\User;

use \Core\HTML\BootstrapForm;

class RecipeController extends AppController {


    public function __construct() {

        parent::__construct();
        $this->loadModel('Recipe');
        $this->loadModel('Category');
        $this->loadModel('UnderCategory');
        $this->loadModel('UnderUnderCategory');
        $this->loadModel('Difficulty');
        $this->loadModel('Ingredient');
        $this->loadModel('Preparation');
    }



    public function index($errors = false) {

        $recipes = $this->Recipe->getRecipesByUser($_SESSION['authId']);
        $this->render('User.Recipe.index', compact('recipes', 'errors'));
    }



    public function add() {

        if (!empty($_POST)) {

            $res = $this->Recipe->create([
                'id_user' => $_SESSION['authId'],
                'titre' => $_POST['titre'],
                'id_categorie' => $_POST['id_categorie'],
                'id_souscategorie' => $_POST['id_souscategorie'],
                'id_soussouscategorie' => $_POST['id_soussouscategorie'],
                'id_difficulty' => $_POST['id_difficulty'],
                'cout' => $_POST['cout'],
                'preparation' => $_POST['preparation'],
                'cuisson' => $_POST['cuisson'],
                'nb_personnes_min' => $_POST['nb_personnes_min'],
                'nb_personnes_max' => $_POST['nb_personnes_max'],
                'conseil' => $_POST['conseil'],
                // 'photo' => $_POST['photo']
            ]);
            $errors = false;
            if ($res) { // Set ingredients of the recipe
                $recipeId = $this->Recipe->getLastByUser($_SESSION['authId']);
                var_dump($recipeId);

                if($_FILES['photo']['error'] == 0) {
                    $photoName = $_FILES['photo']['name'];
                    $photoTmp = $_FILES['photo']['tmp_name'];
                    $fileDestination = '../Public/photos/'.time().$photoName;
                    var_dump($_FILES['photo']);
                    var_dump($fileDestination);
                    if (move_uploaded_file($photoTmp, $fileDestination) ) {

                        $res = $this->Recipe->update($_GET['id'], [
                            'photo' => $fileDestination
                        ]);
                    }
                } else {
                    $errors = true;
                }
            } else {
                $errors = true;
            }
            return $this->index($errors);
        }

        $categories = $this->Category->extract('id', 'nom');
        $underCategories = $this->UnderCategory->extract('id', 'nom');
        $underUnderCategories = $this->UnderUnderCategory->extract('id', 'nom');
        $difficulties = $this->Difficulty->extract('id', 'difficulty');
        $ingredients = array();
        $steps = array();

        $form = new BootstrapForm($_POST);
        $this->render('User.Recipe.edit',
            compact(
                'titre', 'categories', 'underCategories', 'underUnderCategories',
                'difficulties', 'cout', 'preparation', 'cuisson', 'nb_personnes_min',
                'nb_personnes_max', 'ingredients', 'steps', 'conseil', 'photo', 'form'
            )
        );
    }



    public function edit() {

        if (isset($_GET['confirm'])) {
            var_dump('confirm');
        }

        if ($this->isAuthorized($_GET['id'])) {

            if (!empty($_POST)) {

                $res = $this->Recipe->update($_GET['id'], [
                    'id_user' => $_SESSION['authId'],
                    'titre' => $_POST['titre'],
                    'id_categorie' => $_POST['id_categorie'],
                    'id_souscategorie' => $_POST['id_souscategorie'],
                    'id_soussouscategorie' => $_POST['id_soussouscategorie'],
                    'id_difficulty' => $_POST['id_difficulty'],
                    'cout' => $_POST['cout'],
                    'preparation' => $_POST['preparation'],
                    'cuisson' => $_POST['cuisson'],
                    'nb_personnes_min' => $_POST['nb_personnes_min'],
                    'nb_personnes_max' => $_POST['nb_personnes_max'],
                    'conseil' => $_POST['conseil'],
                    //'photo' => $_POST['photo']
                ]);

                if ($res) {  // Set ingredients of the recipe
                    $res = $this->setIngredientsRecipeInDb();
                    if ($res) {
                        $res = $this->setStepsRecipeInDb();
                        if ($res) {
                            if($_FILES['photo']['error'] == 0) {
                                $photoName = $_FILES['photo']['name'];
                                $photoTmp = $_FILES['photo']['tmp_name'];
                                $fileDestination = '../Public/photos/'.time().$photoName;
                                var_dump($_FILES['photo']);
                                var_dump($fileDestination);
                                if (move_uploaded_file($photoTmp, $fileDestination) ) {

                                    $res = $this->Recipe->update($_GET['id'], [
                                        'photo' => $fileDestination
                                    ]);
                                }
                            } else {
                                $errors = true;
                            }
                        } else {
                            $errors = true;
                        }
                    } else {
                        $errors = true;
                    }
                } else {
                    $errors = true;
                }

                // PHOTO
                var_dump($_POST);


                //return $this->index($errors);

            }

            $recipe = $this->Recipe->getRecipe($_GET['id']);

            $titre = $recipe->titre;

            $categories = $this->Category->extract('id', 'nom');
            $categoryId = $recipe->id_categorie;

            $underCategories = $this->UnderCategory->extract('id', 'nom');
            $underCategoryId = $recipe->id_souscategorie;

            $underUnderCategories = $this->UnderUnderCategory->extract('id', 'nom');
            $underUnderCategoryId = $recipe->id_soussouscategorie;

            $difficulties = $this->Difficulty->extract('id', 'difficulty');
            $difficulty = $this->Difficulty->getDifficultyById($recipe->id_difficulty);
            $difficulty = $difficulty[0]->difficulty;

            $cout = $recipe->cout;
            $preparation = $recipe->preparation;
            $cuisson = $recipe->cuisson;
            $nb_personnes_min = $recipe->nb_personnes_min;
            $nb_personnes_max = $recipe->nb_personnes_max;

            $ingredients = $this->Ingredient->getIngredientsByRecipe($recipe->id);
            $steps = $this->Preparation->getInstructionsByRecipe($recipe->id);

            $conseil = $recipe->conseil;
            $photo = $recipe->photo;

            $form = new BootstrapForm($recipe, $ingredients, $steps);
            $this->render('User.Recipe.edit',
                compact(
                    'titre', 'categories', 'underCategories', 'underUnderCategories',
                    'difficulties', 'cout', 'preparation', 'cuisson', 'nb_personnes_min',
                    'nb_personnes_max', 'ingredients', 'steps', 'conseil', 'photo', 'form'
                )
            );

        } else {
            $this->forbidden();
        }

    }



    public function delete() {

        if ($this->isAuthorized($_POST['id'])) {

            if (!empty($_POST)) {

                $res = $this->Recipe->delete($_POST['id']);
                if ($res) $errors = false;
                else $errors = true;
                $this->Recipe->setAutoincrement();
                return $this->index($errors);
            }
        } else {
            $this->forbidden();
        }
    }


    public function createIngredients() {

        $res = $this->Ingredient->create([
            'id_recette' => $_GET['id'],
            'num' => $i,
            'ingredient' => $_POST['ingredient_'.$i]
        ]);
        if (!$res) return false;
    }




    public function setIngredientsRecipeInDb() {

        $ingredients = $this->Ingredient->getIngredientsByRecipe($_GET['id']);
        $newNbIngredients = $this->countNbOfNewElements('ingredient_',count($ingredients));

        if ($newNbIngredients < 0) {  // Delete obsolete ingredients
            for ($i = count($ingredients); $i > count($ingredients) + $newNbIngredients; $i--) {
                $res = $this->Ingredient->deleteIngredient($_GET['id'], $i);
                $this->Ingredient->setAutoincrement();
                if (!$res) return false;
            }
            // Update current steps filled
            for ($i = 1; $i <= count($ingredients) + $newNbIngredients; $i++) {
                $res = $this->Ingredient->updateIngredients($_GET['id'], $i, $_POST['ingredient_'.$i]);
                if (!$res) return false;
            }

        } else if ($newNbIngredients > 0) {  // Insert new ingredients
            for ($i = count($ingredients)+1; $i <= count($ingredients) + count($newNbIngredients); $i++) {
                $res = $this->Ingredient->create([
                    'id_recette' => $_GET['id'],
                    'num' => $i,
                    'ingredient' => $_POST['ingredient_'.$i]
                ]);
                if (!$res) return false;
            }
            // Update current ingredients filled
            for ($i = 1; $i <= count($ingredients); $i++) {
                $res = $this->Ingredient->updateIngredients($_GET['id'], $i, $_POST['ingredient_'.$i]);
                if (!$res) return false;
            }
        }
        return true;
    }


    public function setStepsRecipeInDb() {

        $steps = $this->Preparation->getInstructionsByRecipe($_GET['id']);
        $newNbSteps = $this->countNbOfNewElements('step_', count($steps));

        if ($newNbSteps < 0) {  // Delete obsolete steps
            for ($i = count($steps); $i > count($steps) + $newNbSteps; $i--) {
                $res = $this->Preparation->deleteStep($_GET['id'], $i);
                $this->Preparation->setAutoincrement();
                if (!$res) return false;
            }
            // Update current steps filled
            for ($i = 1; $i <= count($steps) + $newNbSteps; $i++) {
                $res = $this->Preparation->updateSteps($_GET['id'], $i, $_POST['step_'.$i]);
                if (!$res) return false;
            }

        } else if ($newNbSteps > 0) {  // Insert new steps
            for ($i = count($steps)+1; $i <= count($steps) + count($newNbSteps); $i++) {
                $res = $this->Preparation->create([
                    'id_recette' => $_GET['id'],
                    'numero' => $i,
                    'instruction' => $_POST['step_'.$i]
                ]);
                if (!$res) return false;
            }
            // Update current steps filled
            for ($i = 1; $i <= count($steps); $i++) {
                $res = $this->Preparation->updateSteps($_GET['id'], $i, $_POST['step_'.$i]);
                if (!$res) return false;
            }
        }
        return true;
    }


    public function countNbOfNewElements($elem, $nb) {

        $nbElem = 0;
        foreach ($_POST as $k => $v) {
            if (strpos($k, $elem) === 0)
                $nbElem +=1;
        }
        return $nbElem - $nb;
    }



    public function isAuthorized($id) {

        if ($_SESSION['authAdmin'] == 1)
            return true;
        $recipes = $this->Recipe->getRecipesByUser($_SESSION['authId']);
        foreach ($recipes as $r) {
            if ($r->id == $id)
                return true;
        }
        return false;
        var_dump($recipes);
    }
}
