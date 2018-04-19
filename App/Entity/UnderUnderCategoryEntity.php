<?php

namespace App\Entity;

use Core\Entity\Entity;


class UnderUnderCategoryEntity extends Entity {


	protected $table = 'soussouscategorie';

	public function getUrl() {

		return 'index.php?p=under_under_category.show&id=' . $this->id;
	}


}
