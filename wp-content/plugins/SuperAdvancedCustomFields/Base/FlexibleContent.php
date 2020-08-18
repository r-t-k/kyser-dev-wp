<?php


namespace Kyser\SACF;
/*$layouts = array(
'One' => array(
'key'			=> 'layout_one',
'name'			=> 'Test',
'label'			=> 'Test',
'display'		=> 'block',
'sub_fields'	=> array(''),
'min'			=> '',
'max'			=> '',
),
);
*/

class FlexibleContent {
	private $args = array();
	private $layouts = array();

	public function __construct( $parent, $key, $label ) {
		$this->args['parent'] = $parent;
		$this->args['key']    = $key;
		$this->args['name']   = $key;
		$this->args['label']  = $label;
		$this->args['type']   = 'flexible_content';
	}

	public function add_layout( $name, $config ) {
		$layout               = array(
			'key'     => 'layout_' . $config['key'],
			'name'    => $config['key'],
			'label'   => $config['label'],
			'display' => $config['display'],
			'min'     => $config['min'],
			'max'     => $config['max'],
		);
		$this->layouts[$name] = $layout;
	}

	public function add_sub_field( $name, $layout, $args ) {
		$field                                       = array(
			'key'   => $args['key'],
			'label' => $args['label'],
			'name'  => $name,
			'type'  => $args['type'],
		);
		$this->layouts[$layout]['sub_fields'][$name] = $field;
	}
	public function import_field( $field, $layout ) {
		/*$v = array(
			'key'   => $field['key'],
			'label' => $field['label'],
			'name'  => $field['name'],
			'type'  => $field['type'],
		);*/
		$this->layouts[$layout]['sub_fields'][$field['name']] = $field;
	}

	private function prepare() {
		$this->args['layouts'] = $this->layouts;
	}

	public function build() {
		$this->prepare();
		acf_add_local_field( $this->args );
	}
}
