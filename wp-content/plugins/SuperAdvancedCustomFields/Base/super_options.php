<?php

namespace Kyser;

class super_options {
	private $config = array(
		'groups'    => array(),
		'pages'     => array(),
		'sub_pages' => array()
	);

	public function _addPage( $name, $slug ) {
		$this->config['pages'][$name] = array(
			'name' => $name,
			'slug' => $slug
		);
		$this->create_pages();
	}

	public function _addSubPage( $name, $parent_name ) {
		$this->config['sub_pages'][$name] = array(
			'name'   => $name,
			'parent' => $parent_name
		);
		$this->create_pages();
	}

	private function create_pages() {

		foreach ( $this->config['pages'] as $page ) {
			acf_add_options_page(
				array(
					'page_title' => $page['name'],
					'menu_title' => $page['name'],
					'menu_slug'  => 'kyserwp-' . $page['slug'],
					'capability' => 'edit_posts',
					'redirect'   => false
				)
			);
		}

		foreach ( $this->config['sub_pages'] as $sub_page ) {
			acf_add_options_sub_page(
				array(
					'page_title'  => $sub_page['name'],
					'menu_title'  => $sub_page['name'],
					'parent_slug' => 'kyserwp-' . $this->config['pages'][$sub_page['parent']]['slug'],
				)
			);
		}

	}


	public function _newGroup( $key, $title, $page_slug ) {
		$this->config['groups'][$key] = array(
			'title' => $title,
			'key'   => $key,
			'page'  => $page_slug
		);
		$this->_createGroups();


	}

	private function _createGroups() {
		foreach ( $this->config['groups'] as $group ) {

			acf_add_local_field_group(
				array(
					'key'      => $group['key'],
					'title'    => $group['title'],
					'location' => array(
						array(
							array(
								'param'    => 'options_page',
								'operator' => '==',
								'value'    => 'SACF-' . $group['page'],
							),
						),
					),
				)
			);
		}
	}

	public function _addField( $group_key, $key, $label, $type, $optional_key = '', $optional_val = '' ) {

		acf_add_local_field(
			array(
				'key'         => $key,
				'label'       => $label,
				'name'        => $key,
				'type'        => $type,
				'parent'      => $group_key,
				$optional_key => $optional_val,
			)
		);


	}

	public function _addFlex( $group_key, $key, $label, $layouts = array() ) {
		$field = array(
			'key'     => $key,
			'label'   => $label,
			'name'    => $key,
			'type'    => 'flexible_content',
			'parent'  => $group_key,
			'layouts' => $layouts,
		);

		acf_add_local_field( $field );
	}


}
