<?php

namespace Core\HTML;



class Form {

	/**
	 * @var array Données utilisées par le formulaire
	 */

	protected $data;
	protected $ingredients;
	protected $steps;

	/**
	 * @var string Tag utilisé pour entourrer les champs
	 */

	public $surround = 'p';

	/**
	 * @param array $data Données par le formulaire
	 */


	public function __construct($data = array()) {

		$this->data = $data;

	}

	protected function surround($html) {

		/**
		 * @param $html string code HTML à entourrer
		 * @return string
		 */

		return "<{$this->surround}>{$html}</{$this->surround}>";
	}


	protected function getValue($index, $i = false) {

		if (strpos($index, 'ingredient_') === 0) {
			$ingredient = substr($index, 11)-1;
			return $this->ingredients[$ingredient]->ingredient;

		} else if (strpos($index, 'step_') === 0) {
			$step = substr($index, 5)-1;
			return $this->steps[$step]->instruction;

		} else {
			if (is_object($this->data)) {
				return $this->data->$index;
			}
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}


	public function input($name, $label, $options = []) {

		/**
		 * @param $name string
		 * @param $label
		 * @param array $options
		 * @return string
		 */

		$type = isset($options['type']) ? $options['type'] : 'text';
		return $this->surround(
			"<label>{$label}</label><input type=\"{$type}\" name=\"{$name}\" value=\"{$this->getValue($name)}\"");
	}


	public function submit($value = 'Envoyer') {

		/**
		 * @return string
		 */

		return $this->surround('<button type="submit" class="btn btn-primary">'.$value.'</button>');
	}


}
