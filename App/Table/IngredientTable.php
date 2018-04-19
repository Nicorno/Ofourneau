<?php

namespace App\Table;

use Core\Table\Table;
use App;
/**
*
*/
class IngredientTable extends Table {

	/**
	 * Réccupère les dernières recettes
	 * @return array
	 */

	protected $table = 'ingredient';


	public function getIngredientsByRecipe($id) {

		return $this->query("SELECT ingredient FROM {$this->table} WHERE id_recette = ?", [$id]);
	}


	public function updateIngredients($id, $ingredient, $field) {

		return $this->query("UPDATE {$this->table} SET ingredient = ? WHERE id_recette = ? AND ingredient = ?", [$field, $id, $ingredient], true);
	}



	public function deleteIngredient($id, $num) {

		return $this->query("DELETE FROM {$this->table} WHERE id_recette = ? AND num = ?", [$id, $num], true);
	}


}
