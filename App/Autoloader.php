<?php

namespace App;

class Autoloader {


	static function register() {

		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class) {

		// if (strpos($class, __NAMESPACE__ . '\\') !== 0){
		// 	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		// 	require __DIR__ . '/' . $class . '.php';

		// } else {
		// 	require __DIR__ . '\\' . $class . '.php';
		// }

		$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		require ROOT . '/' . $class . '.php';
		//require $_SERVER['DOCUMENT_ROOT'] . '/CNAM/CP09_Prog_Sites_Web/NFA021/Ofourneau/' . $class . '.php';
		//require __DIR__ . '/' . $class . '.php';

	}
}