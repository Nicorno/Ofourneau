<?php

namespace App\Entity;

use Core\Entity\Entity;


class UnderCategoryEntity extends Entity {


	protected $table = 'souscategorie';

	public function getUrl() {

		return 'index.php?p=under_category.show&id=' . $this->id;
	}


}
