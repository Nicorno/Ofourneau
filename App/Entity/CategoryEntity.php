<?php

namespace App\Entity;

use Core\Entity\Entity;


class CategoryEntity extends Entity {


	protected $table = 'categorie';

	public function getUrl() {

		return 'index.php?p=category.show&id=' . $this->id;
	}


}
