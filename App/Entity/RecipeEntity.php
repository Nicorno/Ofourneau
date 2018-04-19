<?php

namespace App\Entity;

use Core\Entity\Entity;


class RecipeEntity extends Entity {


	protected $table = 'recette';

	public function getUrl() {

		return 'index.php?p=recipe.show&id=' . $this->id;
	}


	public function getExtrait() {

		$html = '<p>' . substr($this->contenu, 0, 50) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';  // . ajoute à $html
		return $this->contenu;
	}
}
