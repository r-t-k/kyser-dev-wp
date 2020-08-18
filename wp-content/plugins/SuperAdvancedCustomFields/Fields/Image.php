<?php


namespace Kyser\SACF;

/*'return_format'	=> 'array',
			'preview_size'	=> 'thumbnail',
			'library'		=> 'all',
			'min_width'		=> 0,
			'min_height'	=> 0,
			'min_size'		=> 0,
			'max_width'		=> 0,
			'max_height'	=> 0,
			'max_size'		=> 0,
			'mime_types'	=> ''*/

class Image extends Field {
	public function __construct( $key, $label, $name, $parent, $preview = 'thumbnail', $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = '') {
		parent::__construct( $key, $label, $name, 'image', $parent );
		$this->option( 'preview_size', $preview );
		$this->option( 'library', $library );
		$this->option( 'min', $min );
		$this->option( 'min_height', $min_height );
		$this->option( 'min_width', $min_width );
		$this->option( 'max', $max );
		$this->option( 'max_width', $max_width );
		$this->option( 'max_height', $max_height );
		$this->option( 'mime_types', $mime_types );
		$this->make();
	}

	public static function add($key, $label, $name, $parent, $preview = 'thumbnail', $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = '') {
		return new Image($key, $label, $name, $parent, $preview, $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
	}
	public static function build($key, $label, $name, $preview = 'thumbnail', $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = ''){
		$export = new Image($key, $label, $name, '', $preview, $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
		return $export->export();
	}
}
