<?php

namespace App\Table;

use Core\Table\Table;
use App;

class UnderUnderCategoryTable extends Table {


	/**
	*
	*/

	protected $table = 'soussouscategorie';


	public function getUrl() {

		return 'index.php?p=under_under_category.show&id=' . $this->id;
	}



}
