<?php

namespace App\Table;

use Core\Table\Table;
use App;
/**
*
*/
class DifficultyTable extends Table {

	/**
	 * Réccupère les dernières recettes
	 * @return array
	 */

	protected $table = 'difficulty';


	public function getDifficultyById($id) {

		return $this->query("SELECT difficulty FROM {$this->table} WHERE id = ?", [$id]);
	}


	public function getDifficulties() {

		return $this->query("SELECT difficulty FROM {$this->table}");
	}

}
