<?php

namespace App\Table;

use Core\Table\Table;
use App;
/**
*
*/
class RecipeTable extends Table {

	/**
	 * Réccupère les dernières recettes
	 * @return array
	 */

	protected $table = 'recette';

	public function getUrl() {

		return 'index.php?p=recipe.show&id=' . $this->id;
	}


	public function findByCategory($id) {

		/**
		 * Récupère un article en liant la catégorie associée
		 * @return array
		 */

		return $this->query("
			SELECT recette.id, id_user, id_categorie, id_souscategorie,
				   id_soussouscategorie, titre, id_difficulty, cout, preparation,
				   cuisson, nb_personnes_min, nb_personnes_max, conseil, photo
			FROM recette
			LEFT JOIN categorie ON id_categorie = categorie.id
			WHERE id_categorie = ?", [$id], true);
	}



	public function getLast() {

		return $this->query("SELECT * FROM {$this->table}", get_called_class());
	}


	public function getLastByUser($id) {

		return $this->query("
			SELECT id
			FROM {$this->table}
			WHERE id=(SELECT MAX(id) FROM {$this->table})
			AND id_user = ?", [$id]
		);
	}


	public function getRecipesByUser($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id_user = ?", [$id]);
	}




	public function getRecipe($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}




	public function getPreparation($id) {

		return $this->query("SELECT numero, instruction FROM preparation WHERE id_recette = ?", [$id]);
	}



	public function getIngredients($id) {

		return $this->query("SELECT ingredient FROM ingredient WHERE id_recette = ?", [$id]);
	}



	public function getNumberOfRecipes() {

		return $this->query("
			SELECT id
			FROM {$this->table}
			WHERE id=(SELECT MAX(id) FROM {$this->table})", null, true
		);
	}



	public function getAllByCategory($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id_categorie = ?", [$id]);
	}



	public function getExtrait() {

		$html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';  // . ajoute à $html
		return $this->contenu;
	}
}
