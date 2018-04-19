<?php

namespace Core\Auth;

use \Core\Database;


class DbAuth {

	private $db;

	public function __construct(Database $db) {

		$this->db = $db;
	}


	public function getUserId() {

		if ($this->logged()) {
			return $_SESSION['authId'];
		}
		return false;
	}


	public function login($email, $password) {

		/**
		 * @param $email
		 * @param $password
		 * @return boolean
		 */

		$user = $this->db->prepare('SELECT * FROM membre WHERE email = ?', [$email], null, true);
		if ( $user ) {

	        if (password_verify($password, $user->password)) {
				$_SESSION['authId'] = $user->id;
				$_SESSION['authName'] = $user->first_name .' '. $user->last_name;
				$_SESSION['authAdmin'] = $user->is_admin;
				return true;
			}
		}
		return false;
	}


	public function signup($email) {

		/**
		 * Vérifie si l'email est déjà présent dans la base
		 * @param $email
		 * @return boolean
		 */

		$user = $this->db->prepare('SELECT * FROM membre WHERE email = ?', [$email], null, true);
		if ( $user ) {

			return true;
		}
		return false;
	}



	public function logged() {

		return isset($_SESSION['authId']);
	}



	private function hashPass($pass) {

		/*
		 * Chiffre le mot de passe
		 * @return hash
		*/

		$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		return password_hash($pass, PASSWORD_BCRYPT, $options);
	}
}
