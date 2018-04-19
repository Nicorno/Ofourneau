<?php

namespace App\Controller\Admin;

use \App;
use \Core\Auth\DbAuth;


class AppController extends \App\Controller\AppController {


    public function __construct() {

        parent::__construct();
        
        $app = App::getInstance();
        $auth = new DbAuth($app->getDb());
        
        if (!$auth->logged()) {

            $this->forbidden();
        }
    }
    
    
}