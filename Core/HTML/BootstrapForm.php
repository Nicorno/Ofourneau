<?php

namespace Core\HTML;

class BootstrapForm extends Form {

	/**
	 *
	 */

	public function __construct($data = array(), $ingredients = array(), $steps = array()) {

		$this->data = $data;
		$this->ingredients = $ingredients;
		$this->steps = $steps;
	}

	protected function surround($html) {

		/**
		 * @param $html string code HTML à entourrer
		 * @return string
		 */

		return "<div class=\"form-group\">{$html}</div>";
	}



	public function input($name, $label, $options = [], $key = false) {

		/**
		 * @param $name string
		 * @param $label
		 * @param array $options
		 * @return string
		 */

		$type = isset($options['type']) ? $options['type'] : 'text';
		$label = "<label>{$label}</label>";

		if ($type === 'textarea') {
			$input = "<textarea type=\"{$type}\"
				       name=\"{$name}\"
				       class=\"form-control\">{$this->getValue($name)}</textarea>";

		} else if ($type === 'file') {
			$input = "<input type=\"{$type}\"
					   name=\"{$name}\"
					   class=\"form-control-file\">";

		} else {
			$input = "<input type=\"{$type}\"
					   name=\"{$name}\"
					   value=\"{$this->getValue($name)}\"
					   class=\"form-control\">";
		}
		return $this->surround($label . $input);

	}


	public function select($name, $label, $options) {

		$label = '<label>' . $label . '</label>';
		$input = '<select class="form-control" name="' . $name .'">';
		foreach ($options as $k => $v) {

			$attributes = '';
			if ($k == $this->getValue($name, $k)) {
				$attributes = ' selected';
			}
			$input .= '<option value="' . $k . '"'. $attributes .'>' . $v . '</option>';
		}

		$input .= '</select>';
		return $this->surround($label . $input);

	}


}
