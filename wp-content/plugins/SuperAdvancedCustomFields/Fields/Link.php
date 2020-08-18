<?php


namespace Kyser\SACF;


class Link extends Field {
	public function __construct( $key, $label, $name, $parent, $return_format = 'array') {
		parent::__construct( $key, $label, $name, 'link', $parent );
		$this->option( 'return_format', $return_format );
		$this->make();
	}

	public static function add($key, $label, $name, $parent, $return_format = 'array') {
		return new Link($key, $label, $name, $parent, $return_format );
	}
	public static function build($key, $label, $name,  $return_format = 'array'){
		$export = new Link($key, $label, $name, '', $return_format);
		return $export->export();
	}
}
