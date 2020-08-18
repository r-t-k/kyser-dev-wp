<?php


namespace Kyser\SACF;


class Map extends Field {
	public function __construct( $key, $label, $name, $parent, $height = '400', $center_lat = '-37.81411', $center_lng = '144.96328', $zoom = '14') {
		parent::__construct( $key, $label, $name, 'google_map', $parent );
		$this->option( 'height', $height );
		$this->option( 'center_lat', $center_lat );
		$this->option( 'center_lng', $center_lng );
		$this->option( 'zoom', $zoom );

		$this->make();
	}

	public static function add($key, $label, $name, $parent, $height = '400', $center_lat = '-37.81411', $center_lng = '144.96328', $zoom = '14') {
		return new Map($key, $label, $name, $parent, $height , $center_lat , $center_lng , $zoom  );
	}
	public static function build($key, $label, $name,  $height = '400', $center_lat = '-37.81411', $center_lng = '144.96328', $zoom = '14'){
		$export = new Map($key, $label, $name, '',  $height , $center_lat , $center_lng , $zoom );
		return $export->export();
	}
}
