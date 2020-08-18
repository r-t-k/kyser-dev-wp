<?php


namespace Kyser\SACF;


class Color extends Field {
	public function __construct( $key, $label, $name, $parent, $default = '' ) {
		parent::__construct( $key, $label, $name, 'color_picker', $parent );
		$this->option('default_value', $default);
		$this->make();
	}
	public static function add($key, $label, $name, $parent, $default = ''){
		return new Color($key, $label, $name, $parent, $default);
	}
	public static function build($key, $label, $name,  $default = ''){
		$export = new Color($key, $label, $name, '', $default);
		return $export->export();
	}

}
