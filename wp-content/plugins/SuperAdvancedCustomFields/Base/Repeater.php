<?php


namespace Kyser\SACF;
/*
*$this->defaults = array(
	'sub_fields'	=> array(),
	'min'			=> 0,
	'max'			=> 0,
	'layout' 		=> 'table',
	'button_label'	=> '',
	'collapsed'		=> ''
);*
 * */

class Repeater {
	private $args = array();
	private $sub_fields = array();

	public function __construct( $parent, $key, $label, $noParent = false ) {
		if(!$noParent){
			$this->args['parent'] = $parent;
			$this->args['key']    = $key;
			$this->args['name']   = $key;
			$this->args['label']  = $label;
			$this->args['type']   = 'repeater';
		}
		if($noParent){
			$this->args['key']    = $key;
			$this->args['name']   = $key;
			$this->args['label']  = $label;
			$this->args['type']   = 'repeater';
		}
	}
	public function add_sub_field( $name, $args ) {
		$field                                       = array(
			'key'   => $args['key'],
			'label' => $args['label'],
			'name'  => $name,
			'type'  => $args['type'],
		);
		$this->sub_fields[$name] = $field;
	}
	public function import_field( $field) {
		/*$v = array(
			'key'   => $field['key'],
			'label' => $field['label'],
			'name'  => $field['name'],
			'type'  => $field['type'],
		);*/
		$this->sub_fields[$field['name']] = $field;
	}

	private function prepare() {
		$this->args['sub_fields'] = $this->sub_fields;
	}

	public function build() {
		$this->prepare();
		acf_add_local_field( $this->args );
	}
	public function export() {
		$this->prepare();
		return $this->args;
	}
}
