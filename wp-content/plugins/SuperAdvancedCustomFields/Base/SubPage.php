<?php


namespace Kyser\SACF\Admin;


class SubPage {
	private $args = array();
	public static function Add($page_title, $menu_title, $parent){
		return new SubPage($page_title, $menu_title, $parent);
	}
	public function __construct($page_title, $menu_title, $parent) {
		$this->args['page_title']  = $page_title;
		$this->args['menu_title']  = $menu_title;
		$this->args['parent']  = $parent;
		$this->_build();
	}
	private function _build(){
		$sub = array(
			'page_title' 	=> $this->args['page_title'],
			'menu_title'	=> $this->args['menu_title'],
			'parent_slug'	=> $this->args['parent'],
		);
		return acf_add_options_sub_page($sub);
	}
	/*acf_add_options_sub_page(array(
	'page_title' 	=> 'Theme Header Settings',
	'menu_title'	=> 'Header',
	'parent_slug'	=> 'theme-general-settings',
	));*/
}
