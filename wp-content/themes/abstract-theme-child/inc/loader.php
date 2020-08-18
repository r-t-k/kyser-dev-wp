<?php

namespace Kyser;


class loader {

	public function autoload() {
		$this->load_settings();
		$this->load_classes();
		$this->load_tasks();
		$this->load_cpt();
		$this->load_shortcodes();
		$this->load_options();
		$this->load_components();
		//$this->load_extras();
		$this->enqueue_theme_assets();
	}


	private function load_settings() // Settings :: Hook = setup_theme
	{
		add_action(
			'setup_theme', function () {
			foreach ( glob( get_stylesheet_directory() . "/settings/*.php" ) as $setting ) {
				require $setting;
			}
		}
		);
	}

	private function load_classes() // Classes :: Hook = init
	{
		add_action(
			'init', function () {
			require_once get_stylesheet_directory(). '/vendor/autoload.php';
			foreach ( glob( get_stylesheet_directory() . "/classes/*.php" ) as $class ) {
				require $class;
			}

		}
		);
	}

	private function load_cpt() // Classes :: Hook = init
	{
		add_action(
			'wp_loaded', function () {
			foreach ( glob( get_stylesheet_directory() . "/cpt/*.php" ) as $cpt ) {
				require $cpt;
			}
		}
		);
	}

	// PHP Functions autoload php files in the tasks directory || this is to clean up and organize theme functions by allowing them to easily be different files
	private function load_tasks() // Tasks :: Hook = wp_loaded
	{
		add_action(
			'wp_loaded', function () {
			foreach ( glob( get_stylesheet_directory() . "/tasks/*.php" ) as $task ) {
				require $task;
			}
		}
		);
	}

	private function load_shortcodes() // Shortcodes :: Hook = wp_head
	{
		add_action(
			'wp_head', function () {
			foreach ( glob( get_stylesheet_directory() . "/shortcodes/*.php" ) as $shortcode ) {
				require $shortcode;
			}
		}
		);
	}

	private function load_options() // Option Pages :: Hook = init
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'init', function () {
				foreach ( glob( get_stylesheet_directory() . "/options/*.php" ) as $option ) {
					require $option;
				}
			}
			);
		}
	}
	private function load_models() // Option Pages :: Hook = wp_loaded
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_loaded', function () {
				foreach ( glob( get_stylesheet_directory() . "/models/*.php" ) as $model ) {
					require $model;
				}
			}
			);
		}
	}
	private function load_components() // Option Pages :: Hook = wp_loaded
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_loaded', function () {
				foreach ( glob( get_stylesheet_directory() . "/components/*.php" ) as $component ) {
					require $component;
				}
			}
			);
		}
	}
	private function load_modules() //  :: Hook = wp_loaded
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_loaded', function () {
				foreach ( glob( get_stylesheet_directory() . "/modules/*.php" ) as $module ) {
					require $module;
				}
			}
			);
		}
	}
	private function load_elements() //  :: Hook = wp_head
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_head', function () {
				foreach ( glob( get_stylesheet_directory() . "/elements/*.php" ) as $el ) {
					require $el;
				}
			}
			);
		}
	}
	private function load_layouts() //  :: Hook = wp_head
	{
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			add_action(
				'wp_head', function () {
				foreach ( glob( get_stylesheet_directory() . "/layouts/*.php" ) as $layout ) {
					require $layout;
				}
			}
			);
		}
	}

	private function load_extras() {
		add_action(
			'wp_head', function () {
			require_once get_stylesheet_directory() . '/sidebars.php'; // Sidebars
			require_once get_stylesheet_directory() . '/widgets.php'; // Widgets
		}
		);
	}

	// Javascript and CSS file autoloader (replace stylesheet_directory with template_directory if this not a child theme) :: Hook = wp_loaded

	public $conditionalCSS = array();
	public $conditionalJS = array();

	private function enqueue_theme_assets() {
		add_action(
			'wp_enqueue_scripts', function () {
			$dirJS  = new \DirectoryIterator( get_stylesheet_directory() . '/js' );
			$dirCSS = new \DirectoryIterator( get_stylesheet_directory() . '/css' );

			foreach ( $dirJS as $file ) {

				if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'js' && ! in_array( basename( $file ), array_keys( $this->conditionalJS ) ) ) {
					$name         = basename( $file, '.js' );
					$name_and_ext = basename( $file );
					wp_enqueue_script( $name, get_stylesheet_directory_uri() . '/js/' . $name_and_ext );

				}
			}
			array_walk(
				$this->conditionalJS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_script( $key, get_stylesheet_directory_uri() . '/js/' . $key );
				}
			}
			);

			foreach ( $dirCSS as $style ) {

				if ( pathinfo( $style, PATHINFO_EXTENSION ) === 'css' && ! in_array( basename( $style ), array_keys( $this->conditionalCSS ) ) ) {
					$s_name         = basename( $style, '.css' );
					$s_name_and_ext = basename( $style );


					wp_enqueue_style( $s_name, get_stylesheet_directory_uri() . '/css/' . $s_name_and_ext );

				}

			}

			array_walk(
				$this->conditionalCSS, function ( &$el, &$key ) {
				if ( $el ) {
					wp_enqueue_style( $key, get_stylesheet_directory_uri() . '/css/' . $key );
				}
			}
			);
		}
		);
	}

}
