<?php

namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []) {

        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'Templates/' . $this->template . '.php');
    }


    protected function notFound() {

		header('HTTP/1.0 404 Not Found');
		header('Location:index.php?p=404');
	}


	protected function forbidden() {

		header('HTTP/1.0 403 Forbidden');
		die('Accès interdit');
	}
}