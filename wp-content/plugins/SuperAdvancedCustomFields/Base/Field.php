<?php


namespace Kyser\SACF;


class Field {

	public $key;
	public $label;
	public $name;
	public $type;
	public $parent;
	public $extra = array();
	private $field;

	public static function Add( $key, $label, $name, $type, $parent ) {
		$new = new Field( $key, $label, $name, $type, $parent );
		$new->make();
	}

	public function __construct( $key, $label, $name, $type, $parent ) {
		$this->key    = $key;
		$this->label  = $label;
		$this->name   = $name;
		$this->type   = $type;
		$this->parent = $parent;

	}

	public function option( $option_key, $option_value ) {
		$this->extra[$option_key] = $option_value;
	}

	private function _setOptions($no_parent = false) {
		$field = array(
			'key'    => $this->key,
			'label'  => $this->label,
			'name'   => $this->name,
			'type'   => $this->type,
			'parent' => $this->parent,
		);
		if ($no_parent === true){
			$field = array(
				'key'    => $this->key,
				'label'  => $this->label,
				'name'   => $this->name,
				'type'   => $this->type,
			);
		}
		foreach ( $this->extra as $key => $value ) {
			$field[$key] = $value;
		}
		$this->field = $field;
	}

	private function _build() {
		return acf_add_local_field( $this->field );
	}

	public function make() {
		$this->_setOptions();
		$this->_build();
	}
	public function export() {
		$this->_setOptions(true);
		return $this->field;
	}
}
