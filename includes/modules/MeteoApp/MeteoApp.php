<?php

class OSEX_MeteoApp extends ET_Builder_Module
{

	public $slug       = 'osex_meteo_app';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init()
	{
		$this->name = esc_html__('Meteo App', 'osex-Meteo-App');
	}

	public function get_fields()
	{
		$image_icon_placement = array(
			'top' => et_builder_i18n( 'Top' ),
		);

		if ( ! is_rtl() ) {
			$image_icon_placement['left'] = et_builder_i18n( 'Left' );
		} else {
			$image_icon_placement['right'] = et_builder_i18n( 'Right' );
		}
		return array(
			'title'                       => array(
				'label'           => et_builder_i18n('Title'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('The title of your blurb will appear in bold below your blurb image.', 'et_builder'),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			),
			'heading'     => array(
				'label'           => esc_html__('Heading', 'simp-simple-extension'),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__('Input your desired heading here.', 'simp-simple-extension'),
				'dynamic_content' => 'text',
				'toggle_slug'     => 'main_content',
			),
			'content'     => array(
				'label'           => esc_html__('Content', 'osex-os-extension'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__('Content entered here will appear below the heading text.', 'osex_meteo_app'),
				'dynamic_content' => 'text',
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
				'description'        => esc_html__('Upload an image to display at the top of your blurb.', 'osex_meteo_app'),
				'toggle_slug'        => 'image',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'use_icon'                    => array(
				'label'            => esc_html__('Use Icon', 'osex_meteo_app'),
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
				'description'      => esc_html__('Here you can choose whether icon set below should be used.', 'osex_meteo_app'),
				'default_on_front' => 'off',
			),
			'icon_placement'              => array(
				'label'            => esc_html__('Image/Icon Placement', 'et_builder'),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => $image_icon_placement,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__('Here you can choose where to place the icon.', 'et_builder'),
				'default_on_front' => 'top',
				'mobile_options'   => true,
			),
			'font_icon'                   => array(
				'label'           => esc_html__('Icon', 'et_builder'),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'class'           => array('et-pb-font-icon'),
				'toggle_slug'     => 'image',
				'description'     => esc_html__('Choose an icon to display with your blurb.', 'et_builder'),
				'depends_show_if' => 'on',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			),
			'icon_color'                  => array(
				'default'         => $et_accent_color,
				'label'           => esc_html__('Icon Color', 'et_builder'),
				'type'            => 'color-alpha',
				'description'     => esc_html__('Here you can define a custom color for your icon.', 'et_builder'),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'hover'           => 'tabs',
				'mobile_options'  => true,
				'sticky'          => true,
			),
			'image_icon_background_color' => array(
				'label'          => esc_html__('Image/Icon Background Color', 'et_builder'),
				'type'           => 'color-alpha',
				'description'    => esc_html__('Here you can define a custom background color.', 'et_builder'),
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
		$title =   $this->props['title'];
		$heading =   $this->props['heading'];
		$image =   $this->props['image'];
		$content =   $this->props['content'];
		$use_icon =   $this->props['use_icon'];


		$html = '<link rel="stylesheet" href="style.css">';

		$html .= '<main>';
		$html .= '<h2>' .  $title . '</h2>';
		$html .= '<h3>' .  $heading . '</h3>';
		$html .= '<p><img src="' .  $image . '"</p">';
		$html .= '<p>' .  $use_icon . '</p">';


		$html .= '<h1 class="titre">Météo Local</h1>';
		$html .= '<h4 class="emplacement">Votre Emplacement Actuel:</h4>';
		$html .= '<div class="location">';
		$html .= '<i class="fas fa-map-marker-alt" aria-hidden="true"></i> <p> - </p>';
		$html .= '</div>';
		$html .= '<div class="notification"></div>';
		$html .= '<div class="weather-container">';
		$html .= '<div class="weather-icon">';
		$html .= '<img src="https://margaux-dev.github.io/weather-app/icons-weather/unknown.svg" alt="Rainbow">';
		$html .= '</div>';
		$html .= '<div class="temperature-value">';
		$html .= '<p> - °<span>C</span></p>';
		$html .= '</div>';
		$html .= '<div class="temperature-description">';
		$html .= '<p> - </p>';
		$html .= '</div>';
		$html .= '';
		$html .= '</div>';
		$html .= '<p>' .  $content . '</p>';
		$html .= '</main>';


		return $html;
	}
}

new OSEX_MeteoApp;
