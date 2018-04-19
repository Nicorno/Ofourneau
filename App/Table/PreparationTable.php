<?php

namespace App\Table;

use Core\Table\Table;
use App;

class PreparationTable extends Table {

	/**
	*
	*/

	protected $table = 'preparation';


	public function getInstructionsByRecipe($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id_recette = ?", [$id]);
	}


	public function updateSteps($id, $num, $field) {

		return $this->query("UPDATE {$this->table} SET instruction = ? WHERE id_recette = ? AND numero = ?", [$field, $id, $num], true);
	}


	public function insertStep($id, $num, $field) {

		return $this->query("INSERT INTO {$this->table} (numero, instruction)
							 VALUES (?, ?)
							 WHERE id = ?", [$num, $field, $id], true
						   );
	}


	public function deleteStep($id, $num) {

		return $this->query("DELETE FROM {$this->table} WHERE id_recette = ? AND numero = ?", [$id, $num], true);
	}
}
