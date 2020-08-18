<?php


namespace Kyser\SACF;

class Checkbox extends Field {
	private $choices = array();
	public function __construct( $key, $label, $name, $parent, $layout = 'vertical' ) {
		parent::__construct( $key, $label, $name, 'checkbox', $parent );
		$this->option( 'layout', $layout );
	}
	public function add_choice($string){
		$this->choices[] = $string;
	}
	public function default_value ($v){
		$this->option( 'default_value', $v );
	}
	public function allow_custom ($v){
		$this->option( 'allow_custom', $v );
	}
	public function save_custom ($v){
		$this->option( 'save_custom', $v );
	}
	public function toggle ($v){
		$this->option( 'toggle', $v );
	}

	public function register(){
		$this->option( 'choices', $this->choices );
		$this->make();
	}
	public function build(){
		$this->option( 'choices', $this->choices );
		$this->export();
	}
}
