<?php

namespace Kyser\SACF;


class Group {
	private $args = array();
	private $location = array();
	private $hide = array();
	private $order = 0;

	public static function OptionGroup($key, $title, $option_page){
		return new Group($key, $title, false,  $option_page);
	}
	public static function OptionSubGroup($key, $title, $option_page){
		return new Group($key, $title, false,'acf-options-'.$option_page);
	}

	public static function NewGroup($key, $title, $param, $operator, $value, $order = 0, $hide = false){
		$group = new Group($key, $title, $order, $hide, false);
		$group->location($param, $operator, $value);
		$group->_build();
	}

	public function __construct( $key, $title, $order = 0, $hide = false, $option_page = false ) {
		$this->args['key']   = $key;
		$this->args['title'] = $title;
		$this->order = $order;
		$this->hide($hide);
		if ( $option_page !== false && $option_page !== true ) {
			$this->location( 'options_page', '==',  $option_page );
			$this->_build();
		}
	}
	public function hide($items = false){
		$default = array(
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
		if($items === false){
			$this->hide = $default;
		}
		if($items !== false){
			$this->hide = $items;
		}
	}
	public function location( $param, $operator, $value ) {
		$this->location['param']    = $param;
		$this->location['operator'] = $operator;
		$this->location['value']    = $value;
	}
	public function build(){
		if($this->location){
			$this->_build();
		}
	}
	private function _build() {
		$group = array(
			'key'      => $this->args['key'],
			'title'    => $this->args['title'],
			'location' => array(
				array(
					array(
						/*'param'    => 'options_page',*/
						'param'    => $this->location['param'],
						'operator' => $this->location['operator'],
						'value'    => $this->location['value'],
					),
				),
			),
			'hide_on_screen'        => $this->hide,
			'menu_order' => $this->order,
		);
		acf_add_local_field_group( $group );
	}
}
