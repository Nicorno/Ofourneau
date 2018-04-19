<?php
namespace Core\Table;
use Core\Database;

class Table {

	protected $table;
	protected $db;

	public function __construct(Database $db) {

		$this->db = $db;

		if (is_null($this->table)) {
			$parts = explode('\\', get_class($this));
			$class_name = end($parts);
			$this->table = strtolower(str_replace('Table', '', $class_name));
		}
	}


	public function __get($key) {  // Méthode magique

		/**
		 * Est appelée lorsque qu'il rencontre une variable inconnue
		 */

		$method = 'get' . ucfirst($key);  // ucfirst -> Majuscule première lettre
		$this->$key = $this->$method();
		return $this->$key;
	}




	public function find($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}



	public function update($id, $fields) {

		$sql_parts = [];
		$attributes = [];

		foreach($fields as $k => $v) {

			$sql_parts[] = "$k = ?";
			$attributes[] = $v;
		}

		$attributes[] = $id;
		$sql_part = implode(', ', $sql_parts);

		return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
	}



	public function create($fields) {

		$sql_parts = [];
		$attributes = [];

		foreach($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attributes[] = $v;
		}

		$sql_part = implode(', ', $sql_parts);
		return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
	}



	public function delete($id) {

		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
	}



	public function extract($key, $value, $id = false) {

		if (!$id) {
			$records = $this->all();
		} else {
			$records = $this->underCategoryById($id);
		}
		$return = [];
		foreach($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
	}



	public function all() {

		return $this->query('SELECT * FROM ' . $this->table);
	}

	public function underCategoryById($id) {

		return $this->query("SELECT * FROM {$this->table} WHERE id_categorie = ?", [$id]);
	}


	public function setAutoincrement() {

		$this->query("ALTER TABLE {$this->table} auto_increment = 0");
	}


	public function query($statement, $attributes = null, $one = false) {

		if ($attributes) {
			return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);

		} else {
			return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
		}
	}

}
