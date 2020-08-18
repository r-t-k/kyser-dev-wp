<?php


namespace Kyser\SACF;


class File extends Field {
	public function __construct( $key, $label, $name, $parent, $return_format = 'array', $library = 'all', $min_size = 0, $max_size = 0, $mime_types = '') {
		parent::__construct( $key, $label, $name, 'file', $parent );
		$this->option( 'return_format', $return_format );
		$this->option( 'library', $library );
		$this->option( 'min_size', $min_size );
		$this->option( 'max_size', $max_size );
		$this->option( 'mime_types', $mime_types );
		$this->make();
	}

	public static function add($key, $label, $name, $parent, $return_format = 'array', $library = 'all', $min_size = 0, $max_size = 0, $mime_types = '') {
		return new File($key, $label, $name, $parent, $return_format , $library , $min_size , $max_size , $mime_types  );
	}
	public static function build($key, $label, $name,  $return_format = 'array', $library = 'all', $min_size = 0, $max_size = 0, $mime_types = ''){
		$export = new File($key, $label, $name, '', $return_format , $library , $min_size , $max_size , $mime_types);
		return $export->export();
	}
}
