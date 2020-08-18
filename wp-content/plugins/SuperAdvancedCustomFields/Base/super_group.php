<?php

namespace Kyser;


class super_group {
	public $key = '';
	public $title = '';
	private $fields = array();
	public $post_type; //post or page (string)
	public $target; //name of post or page
	public $order; //(int)
	public $hide = array(
		'the_content',
		'excerpt',
		'discussion',
		'comments',
		'revisions',
		'format',
		'featured_image',
		'categories',
		'tags',
	);

	public function __construct( $key, $title, $post_type, $target, $order ) {
		$this->key       = 'group_'.$key;
		$this->$title    = $title;
		$this->post_type = $post_type;
		$this->target    = $target;
		$this->order     = $order;
	}

	public function register() {
		$this->add_group();

	}

	private function add_group() {
		$group = array(
			/* (string) Unique identifier for field group. Must begin with 'group_' */
			'key'                   => $this->key,
			/* (string) Visible in metabox handle */
			'title'                 => 'My Group2',
			/* (array) An array of fields */
			'fields'                => $this->fields,
			/* (array) An array containing 'rule groups' where each 'rule group' is an array containing 'rules'.
			Each group is considered an 'or', and each rule is considered an 'and'. */
			'location'              => array(
				array(
					array(
						'param'    => $this->post_type,
						'operator' => '==',
						'value'    => $this->target,
					),
				),
			),
			/* (int) Field groups are shown in order from lowest to highest. Defaults to 0 */
			'menu_order'            => $this->order,
			/* (string) Determines the position on the edit screen. Defaults to normal. Choices of 'acf_after_title', 'normal' or 'side' */
			'position'              => 'normal',
			/* (string) Determines the metabox style. Defaults to 'default'. Choices of 'default' or 'seamless' */
			'style'                 => 'default',
			/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
			Choices of 'top' (Above fields) or 'left' (Beside fields) */
			'label_placement'       => 'top',
			/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
			Choices of 'label' (Below labels) or 'field' (Below fields) */
			'instruction_placement' => 'label',
			/* (array) An array of elements to hide on the screen */
			'hide_on_screen'        => $this->hide,
		);
		acf_add_local_field_group( $group );

	}

	//$required = int
	public function add_field( $key, $label, $name, $type, $instructions = '', $required = 0, $default_value = '', $placeholder = '' ) {
		$field = array(
			'key'               => $key,
			'label'             => $label,
			'name'              => $name,
			'type'              => $type,
			'instructions'      => $instructions,
			'required'          => $required,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => $default_value,
			'placeholder'       => $placeholder,
		);
		$temp  = $this->fields;
		array_push( $temp, $field );
		$this->fields = $temp;
	}
	public function create_field( $key, $label, $name, $type ) {
		$field = array(
			'key'    => $key,
			'label'  => $label,
			'name'   => $name,
			'type'   => $type,
			'parent' => $this->key,
		);
		acf_add_local_field( $field );
	}
	public function update_field($key, $value){
		update_field($key, $value);
	}

}
