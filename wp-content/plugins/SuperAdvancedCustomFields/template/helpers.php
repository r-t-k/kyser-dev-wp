<?php
//Static Fields, calling any function that begins with "register_" will return an active field

function register_accordion($key, $label, $name, $parent, $open = 0, $multi = 0, $end = 0){
	return new \Kyser\SACF\Accordion($key, $label, $name, $parent, $open , $multi, $end );
}
function register_color($key, $label, $name, $parent, $default = '') {
	return new \Kyser\SACF\Color($key, $label, $name, $parent, $default);
}
function register_date($key, $label, $name, $parent, $display_format = 'm/d/Y', $return_format = 'm/d/Y', $week_start = 1){
	return new \Kyser\SACF\Date($key, $label, $name, $parent, $display_format , $return_format , $week_start );
}
function register_date_time($key, $label, $name, $parent, $display_format = 'm/d/Y g:i a', $return_format = 'm/d/Y g:i a', $week_start = 1){
	return new \Kyser\SACF\DateTime($key, $label, $name, $parent, $display_format , $return_format , $week_start );
}
function register_file($key, $label, $name, $parent, $return_format = 'array', $library = 'all', $min_size = 0, $max_size = 0, $mime_types = ''){
	return new Kyser\SACF\File($key, $label, $name, $parent, $return_format , $library , $min_size , $max_size , $mime_types  );
}
function register_gallery($key, $label, $name, $parent, $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = ''){
	return new Kyser\SACF\Gallery($key, $label, $name, $parent, $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
}
function register_map($key, $label, $name, $parent, $height = '400', $center_lat = '-37.81411', $center_lng = '144.96328', $zoom = '14'){
	return new Kyser\SACF\Map($key, $label, $name, $parent, $height , $center_lat , $center_lng , $zoom);
}
function register_image($key, $label, $name, $parent, $preview = 'thumbnail', $library = 'all', $min = 0, $max = 0, $max_width = 0, $min_width = 0, $max_height = 0, $min_height = 0, $mime_types = ''){
	return new Kyser\SACF\Image($key, $label, $name, $parent, $preview, $library , $min , $max , $max_width , $min_width , $max_height, $min_height , $mime_types );
}
function register_link($key, $label, $name, $parent, $return_format = 'array' ){
	return new Kyser\SACF\Link($key, $label, $name, $parent, $return_format);
}
function register_text($key, $label, $name, $parent ){
	return new Kyser\SACF\Text($key, $label, $name, $parent);
}
function register_textarea($key, $label, $name, $parent ){
	return new Kyser\SACF\TextArea($key, $label, $name, $parent);
}
function register_editor($key, $label, $name, $parent, $tabs = 'all', $media_upload = 1, $default_value = '', $delay = 0 ){
	return new Kyser\SACF\Editor($key, $label, $name, $parent,  $tabs , $media_upload , $default_value , $delay);
}





// Dynamic Fields, calling any of the fields that begin with "frame_", will return an instance of the field class.
// These functions are an alias to help you frame these fields without using the namespace directly.
// Each dynamic field will have follow up functions that must be ran, before the field will be active.

function frame_checkbox($key, $label, $name, $parent, $layout = 'vertical'){
	return new \Kyser\SACF\Checkbox($key, $label, $name, $parent, $layout);
}




// Utilities

function hide_acf_admin(){
	return add_filter('acf/settings/show_admin', '__return_false');
}
function google_map_api_key($key){
	acf_update_setting('google_api_key', $key);
}

// Admin

function admin_page($page_title, $menu_title, $slug, $admin_level = 'edit_posts'){
	return new \Kyser\SACF\Admin( $page_title, $menu_title, $slug, $admin_level );
}

function admin_sub_page($page_title, $menu_title, $parent){
	return new \Kyser\SACF\Admin\SubPage($page_title, $menu_title, $parent);
}

function admin_field ($key){
	return the_field($key, 'option');
}
function get_admin_field ($key){
	return get_field($key, 'option');
}

// Group


function admin_sub_group($key, $title, $option_page){
	return new \Kyser\SACF\Group($key, $title, $order = 0, false,'acf-options-'.$option_page);
}
function new_admin_group($key, $title, $option_page){
	return new \Kyser\SACF\Group($key, $title,  $order = 0,false,  $option_page);
}
function new_group($key, $title, $param, $operator, $value, $order=0, $hide = false){
	$group = new \Kyser\SACF\Group($key, $title, $order,false, false);
	$group->location($param, $operator, $value);
	$group->build();
}
//Flexible content
//new \Kyser\SACF\FlexibleContent('static', 'flex', 'SACF Flexible Content');
function new_flex($parent, $key, $label){
	return new \Kyser\SACF\FlexibleContent($parent, $key, $label);
}
//Repeater
//new \Kyser\SACF\Repeater('static', 'flex', 'SACF Flexible Content');
function new_repeater($parent, $key, $label){
	return new \Kyser\SACF\Repeater($parent, $key, $label);
}
