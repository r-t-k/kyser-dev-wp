<?php


namespace Kyser\SACF;


class TextArea extends Field {
	public function __construct( $key, $label, $name, $parent) {
		parent::__construct( $key, $label, $name, 'textarea', $parent );
		$this->make();
	}

	public static function add($key, $label, $name, $parent) {
		return new TextArea($key, $label, $name, $parent );
	}
	public static function build($key, $label, $name){
		$export = new TextArea($key, $label, $name, '');
		return $export->export();
	}
}
