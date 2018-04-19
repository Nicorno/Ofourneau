<?php

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

class CategoryController extends AppController {


    public function __construct() {

        parent::__construct();
        $this->loadModel('Category');
    }



    public function index() {

        $categories = $this->Category->all();
        $this->render('Admin.Category.index', compact('categories'));
    }



    public function add() {

        if (!empty($_POST)) {

            $res = $this->Category->create([
                'nom' => $_POST['nom']
            ]);

            if ($res) {

                return $this->index();

            }
        }

        $this->loadModel('Category');
        $form = new BootstrapForm($_POST);
        $this->render('Admin.Category.edit', compact('form'));

    }



    public function edit() {

        if (!empty($_POST)) {

            $res = $this->Category->update($_GET['id'], [
                'nom' => $_POST['nom']
            ]);

            if ($res) {

                return $this->index();
            }
        }

        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('Admin.Category.edit', compact('form'));
    }




    public function delete() {

        if (!empty($_POST)) {

            $res = $this->Category->delete($_POST['id']);
            $this->Category->setAutoincrement();
            return $this->index();
            
        }
    }
}
