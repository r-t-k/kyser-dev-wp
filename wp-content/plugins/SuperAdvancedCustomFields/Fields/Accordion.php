<?php


namespace Kyser\SACF;


class Accordion extends Field {
	public function __construct( $key, $label, $name, $parent, $open = 0, $multi = 0, $end = 0 ) {
		parent::__construct( $key, $label, $name, 'accordion', $parent );
		$this->option( 'open', $open );
		$this->option( 'multi', $multi );
		$this->option( 'end', $end );
		$this->make();
	}

	public static function add($key, $label, $name, $parent, $open = 0, $multi = 0, $end = 0 ) {
		return new Accordion($key, $label, $name, $parent, $open, $multi , $end  );
	}
	public static function build($key, $label, $name,  $open = 0, $multi = 0, $end = 0 ){
		$export = new Accordion($key, $label, $name, '', $open, $multi , $end);
		return $export->export();
	}
}
