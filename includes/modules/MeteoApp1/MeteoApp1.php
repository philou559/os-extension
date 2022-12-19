<?php

class SIMP_MeteoApp1 extends ET_Builder_Module {

	public $slug       = 'meteo_app_1';
	public $vb_support = 'on';

	public function init() {
		$this->name = esc_html__( 'MeteoApp1', 'simp-simple-extension' );
	}

	public function get_fields() {
		return array(
			'heading'     => array(
				'label'           => esc_html__( 'Heading', 'simp-simple-extension' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired heading here.', 'simp-simple-extension' ),
				'toggle_slug'     => 'main_content',
			),
			'content'     => array(
				'label'           => esc_html__( 'Content', 'simp-simple-extension' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear below the heading text.', 'simp-simple-extension' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $unprocessed_props, $content, $render_slug ) {

	}
}

new SIMP_MeteoApp1;