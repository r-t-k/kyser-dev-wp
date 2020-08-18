<?php
function build_accordion($key, $label, $name, $open = 0, $multi = 0, $end = 0){
	$export = new \Kyser\SACF\Accordion($key, $label, $name, '', $open , $multi, $end );
	return $export->export();
}
function build_color($key, $label, $name, $default = '') {
	$export = new \Kyser\SACF\Color($key, $label, $name, '', $default);
	return $export->export();
}
function build_date($key, $label, $name, $display_format = 'm/d/Y', $return_format = 'm/d/Y', $week_start = 1){
	$export = new \Kyser\SACF\Date($key, $label, $name, '', $display_format , $return_format , $week_start );
	return $export->export();
}
function build_date_time($key, $label, $name, $display_format = 'm/d/Y g:i a', $return_format = 'm/d/Y g:i a', $week_start = 1){
	$export = new \Kyser\SACF\DateTime($key, $label, $name, '', $display_format , $return_format , $week_start );
	return $export->export();
}
function build_file($key, $label, $name, $return_format = 'array', $library = 'all', $min_size = 0, $max_size = 0, $mime_types = ''){
	$export = new Kyser\SACF\File($key, $label, $name, '', $return_format , $library , $min_size , $max_size , $mime_types  );
	return $export->export();
}
function build_gallery($key, $label, $name, $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = ''){
	$export = new Kyser\SACF\Gallery($key, $label, $name, '', $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
	return $export->export();
}
function build_map($key, $label, $name, $height = '400', $center_lat = '-37.81411', $center_lng = '144.96328', $zoom = '14'){
	$export = new Kyser\SACF\Map($key, $label, $name, '', $height , $center_lat , $center_lng , $zoom);
	return $export->export();
}
function build_image($key, $label, $name, $preview = 'thumbnail', $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = ''){
	$export = new Kyser\SACF\Image($key, $label, $name, '', $preview, $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
	return $export->export();
}
function build_link($key, $label, $name , $return_format = 'array' ){
	$export = new Kyser\SACF\Link($key, $label, $name, '', $return_format);
	return $export->export();
}
function build_text($key, $label, $name){
	$export = new Kyser\SACF\Text($key, $label, $name, '' );
	return $export->export();
}
function build_textarea($key, $label, $name ){
	$export = new Kyser\SACF\TextArea($key, $label, $name, '');
	return $export->export();
}
function build_editor($key, $label, $name, $tabs = 'all', $media_upload = 1, $default_value = '', $delay = 0 ){
	$export = new Kyser\SACF\Editor($key, $label, $name, '',  $tabs , $media_upload , $default_value , $delay);
	return $export->export();
}
