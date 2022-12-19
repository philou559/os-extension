<?php

class OSEX_HelloWorld extends ET_Builder_Module
{

	public $slug       = 'osex_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init()
	{
		$this->name = esc_html__('Hello World', 'osex-os-extension');
	}

	public function get_fields()
	{
		return array(
			'heading'     => array(
				'label'           => esc_html__('Heading', 'simp-simple-extension'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('Input your desired heading here.', 'osex-os-extension'),
				'dynamic_content'    => 'text',
				'toggle_slug'     => 'main_content',
			),			
			'content'     => array(
				'label'           => esc_html__('Content', 'osex-os-extension'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__('Content entered here will appear below the heading text.', 'simp-simple-extension'),
				'toggle_slug'     => 'main_content',
			),
			'image'                       => array(
				'label'              => et_builder_i18n('Image'),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => et_builder_i18n('Upload an image'),
				'choose_text'        => esc_attr__('Choose an Image', 'osex-os-extension'),
				'update_text'        => esc_attr__('Set As Image', 'osex-os-extension'),
				'depends_show_if'    => 'off',
				'description'        => esc_html__('Upload an image to display at the top of your blurb.', 'osex-os-extension'),
				'toggle_slug'        => 'image',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'use_icon'                    => array(
				'label'            => esc_html__('Use Icon', 'osex-os-extension'),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => et_builder_i18n('No'),
					'on'  => et_builder_i18n('Yes'),
				),
				'toggle_slug'      => 'image',
				'affects'          => array(
					'font_icon',
					'icon_color',
					'image',
					'alt',
				),
				'description'      => esc_html__('Here you can choose whether icon set below should be used.', 'osex-os-extension'),
				'default_on_front' => 'off',
			),
			'font_icon'                   => array(
				'label'           => esc_html__('Icon', 'osex-os-extension'),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array('et-pb-font-icon'),
				'toggle_slug'     => 'image',
				'description'     => esc_html__('Choose an icon to display with your blurb.', 'osex-os-extension'),
				'depends_show_if' => 'on',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			),
			'icon_color'                  => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__('Icon Color', 'osex-os-extension'),
				'type'            => 'color-alpha',
				'description'     => esc_html__('Here you can define a custom color for your icon.', 'osex-os-extension'),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'sticky'          => true,
			),
			'image_icon_background_color' => array(
				'label'          => esc_html__('Image/Icon Background Color', 'osex-os-extension'),
				'type'           => 'color-alpha',
				'description'    => esc_html__('Here you can define a custom background color.', 'osex-os-extension'),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
				'sticky'         => true,
			),
		);
	}

	public function render($attrs, $content = null, $render_slug)
	{
		$heading =   $this->props['heading'];		
		$content =   $this->props['content'];
		$image =     $this->props['image'];
		
		

		$html = '<h1>' .  $heading . '</h1>';		
		$html .= '<p>' .  $content . '</p>';		
		$html .= '<p><img src="' .  $image . '"</p">';
		return $html;
	}
}

new OSEX_HelloWorld;
