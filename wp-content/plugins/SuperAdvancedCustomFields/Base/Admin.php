<?php


namespace Kyser\SACF;


class Admin {
	private $args = array();
	public static function Page( $page_title, $menu_title, $slug, $admin_level = 'edit_posts' ) {
		return new Admin( $page_title, $menu_title, $slug, $admin_level );
	}

	public function __construct( $page_title, $menu_title, $slug, $admin_level = 'edit_posts' ) {
		$this->args['page_title']  = $page_title;
		$this->args['menu_title']  = $menu_title;
		$this->args['slug']        = $slug;
		$this->args['admin_level'] = $admin_level;
		$this->_build();
	}

	private function _build() {
		$page = array(
			'page_title' => $this->args['page_title'],
			'menu_title' => $this->args['menu_title'],
			'menu_slug'  => $this->args['slug'],
			'capability' => $this->args['admin_level'],
			'redirect'   => false
		);

		return acf_add_options_page( $page );
	}

}
