<?php


namespace Kyser\SACF;
/*'tabs'			=> 'all',
			'toolbar'		=> 'full',
			'media_upload' 	=> 1,
			'default_value'	=> '',
			'delay'			=> 0*/

class Editor extends Field {
	public function __construct( $key, $label, $name, $parent, $tabs = 'all', $media_upload = 1, $default_value = '', $delay = 0) {
		parent::__construct( $key, $label, $name, 'wysiwyg', $parent );
		$this->option( 'tabs', $tabs );
		$this->option( 'media_upload', $media_upload );
		$this->option( 'default_value', $default_value );
		$this->option( 'delay', $delay );
		$this->make();
	}

	public static function add($key, $label, $name, $parent, $tabs = 'all', $media_upload = 1, $default_value = '', $delay = 0) {
		return new Editor($key, $label, $name, $parent,  $tabs , $media_upload , $default_value , $delay );
	}
	public static function build($key, $label, $name, $tabs = 'all', $media_upload = 1, $default_value = '', $delay = 0){
		$export = new Editor($key, $label, $name, '', $tabs , $media_upload , $default_value , $delay);
		return $export->export();
	}
}
