<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class RecipeController extends AppController {


    public function __construct() {

        parent::__construct();
        $this->loadModel('Recipe');
    }



    public function index() {

        $recipes = $this->Recipe->all();
        $this->render('Admin.Recipe.index', compact('recipes'));
    }



    public function add() {

        if (!empty($_POST)) {

            $res = $this->Recipe->create([
                'titre' => $_POST['titre'],
                'id_categorie' => $_POST['id']
            ]);
            if ($res) {

                return $this->index();
            }
        }

        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $this->render('Admin.Recipe.edit', compact('categories', 'form'));

    }



    public function edit() {

        if (!empty($_POST)) {

            $res = $this->Recipe->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'id_categorie' => $_POST['id']

            ]);

            if ($res) {

                return $this->index();
            }
        }

        $this->Recipe->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'nom');
        $form = new BootstrapForm($categories);
        $this->render('Admin.Recipe.edit', compact('categories', 'form'));
    }




    public function delete() {

        if (!empty($_POST)) {

            $res = $this->Recipe->delete($_POST['id']);
            return $this->index();

        }
    }
}
