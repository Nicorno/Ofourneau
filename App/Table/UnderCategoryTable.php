<?php

namespace App\Table;

use Core\Table\Table;
use App;

class UnderCategoryTable extends Table {

	/**
	*
	*/

	protected $table = 'souscategorie';


	public function getUrl() {

		return 'index.php?p=under_category.show&id=' . $this->id;
	}

}
