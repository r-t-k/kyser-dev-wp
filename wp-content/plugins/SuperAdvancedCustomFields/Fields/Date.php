<?php

namespace Kyser\SACF;


class Date extends Field {
	public function __construct( $key, $label, $name, $parent, $display_format = 'm/d/Y', $return_format = 'm/d/Y', $week_start = 1 ) {
		parent::__construct( $key, $label, $name, 'date_picker', $parent );
		$this->option('display_format', $display_format);
		$this->option('return_format', $return_format);
		$this->option('first_day', $week_start);
		$this->make();
	}
	public static function add($key, $label, $name, $parent, $display_format = 'm/d/Y', $return_format = 'm/d/Y', $week_start = 1){
		return new Date($key, $label, $name, $parent, $display_format , $return_format , $week_start );
	}
	public static function build($key, $label, $name, $display_format = 'm/d/Y', $return_format = 'm/d/Y', $week_start = 1){
		$export = new Date($key, $label, $name, '', $display_format , $return_format , $week_start );
		return $export->export();
	}
}
