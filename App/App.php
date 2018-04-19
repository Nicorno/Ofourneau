<?php


use Core\Config;
use Core\Database;
/**
* 
*/
class App { // factory
	
	public $title = "Ofourneau";
	private $db_instance;
	private static $_instance;


	public static function getInstance() {

		if (is_null(self::$_instance)) {
			self::$_instance = new App();
		}
		return self::$_instance;
	}


	public static function load() {

		session_start();
		require ROOT . '/App/Autoloader.php';
		App\Autoloader::register();
		require ROOT . '/Core/Autoloader.php';
		Core\Autoloader::register();
	}


	public function getTable($name) {

		$class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
		return new $class_name($this->getDb());
	}


	public function getDb() {

		$config = Config::getInstance(ROOT . '/Config/config.php');
		
		if (is_null($this->db_instance)) {

			$this->db_instance = new Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
		}
		return $this->db_instance;
	}


	public function getTitle() {

		return $this->title;
	}


	public function setTitle($title) {

		$this->title = $title . ' | ' . $this->title;
	}


}