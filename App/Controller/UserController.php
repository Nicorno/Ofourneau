<?php

namespace App\Controller;

use \Core\HTML\BootstrapForm;
use \Core\Auth\DbAuth;
use \App;

class UserController extends AppController {


    public function __construct() {

        parent::__construct();
        $this->loadModel('User');
    }


    public function navbarConnect() {

        if ($_SESSION) {
            return
                "<p>".$_SESSION['authName']."
                    | <a href=\"?p=user.logout\">Gérer mes recettes</a>
                    | <a href=\"?p=user.logout\">Déconnexion</a>
                </p>";
        } else {
            return
                '<p>
                    <a href="?p=user.login">Connexion</a> |
                    <a href="?p=user.signup">S\'inscrire</a>
                </p>';
        }
    }


    public function login() {

        $errors = false;

        if (!empty($_POST)) {

            $auth = new DbAuth(App::getInstance()->getDb());
            if ($auth->login($_POST['email'], $_POST['password'])) {

                if($_SESSION['authAdmin'] == 1) {

                    header('Location: index.php?p=admin.recipe.index');

                } else {

                    header('Location: index.php?p=user.recipe.index');
                }

            } else {

                $errors = true;
            }

        }

        $form = new BootstrapForm($_POST);
        $this->render('User.login', compact('form', 'errors'));
    }



    public function signup() {

        $fieldEmpty = false;
        $emailExists = false;
        $error = false;

        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) &&
            !empty($_POST['email']) && !empty($_POST['password'])) {

            $auth = new DbAuth(App::getInstance()->getDb());
            if (!$auth->signup($_POST['email'])) {

                $res = $this->User->createMember(
                    $_POST['first_name'], $_POST['last_name'],
                    $_POST['email'], $_POST['password']
                );
                if ($res) {
                    header('Location: index.php?p=user.recipe.index');
                } else {
                    $error = true;
                }



            } else {
                $emailExists = true;
            }

        } else {
            $fieldEmpty = true;
        }

        $form = new BootstrapForm($_POST);
        $this->render('User.signup', compact(
            'form', 'fieldEmpty', 'emailExists', 'error')
        );
    }


    public function logout() {

        // On démarre la session
        session_start ();

        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();

        // On redirige le visiteur vers la page d'accueil
        header ('Location: index.php');

    }
}
