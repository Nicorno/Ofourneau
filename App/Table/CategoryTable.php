<?php

namespace App\Table;

use Core\Table\Table;
use App;

class CategoryTable extends Table {


	/**
	* 
	*/

	protected $table = 'categorie';


	public function getUrl() {

		return 'index.php?p=category.show&id=' . $this->id;
	}





	// public function getByCategory() {

	// 	return $this->query("SELECT * FROM ")
	// }

}
