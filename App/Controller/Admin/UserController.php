<?php

namespace App\Controller\Admin;

use \Core\Auth\DbAuth;
use \Core\HTML\BoostrapForm;

class UserController extends AppController {



    public function login() {

        $errors = false;
        if (!empty($_POST)) {

            $auth = new DbAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['email'], $_POST['password'])) {

                header('Location: index.php?p=admin.recipe.index');

            } else {

                $errors = true;
            }

            $form = new BootstrapForm($_POST);
            $this->render('User.login', compact('form', 'errors'));
        }
    }
}
