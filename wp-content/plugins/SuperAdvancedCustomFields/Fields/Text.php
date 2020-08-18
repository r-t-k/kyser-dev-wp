<?php


namespace Kyser\SACF;


class Text extends Field {
	public function __construct( $key, $label, $name, $parent) {
		parent::__construct( $key, $label, $name, 'text', $parent );
		$this->make();
	}

	public static function add($key, $label, $name, $parent) {
		return new Text($key, $label, $name, $parent );
	}
	public static function build($key, $label, $name){
		$export = new Text($key, $label, $name, '');
		return $export->export();
	}
}
