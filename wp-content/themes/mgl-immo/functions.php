<?php 
function theme_setup(){
	load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hd', 1920, 1440 );
	register_nav_menus( array(
		'footmenu'   => __( 'Footer Menu', 'theme' ),
		'mainmenu'      => __( 'Main Menu', 'theme' ),
		'mainmenu2'      => __( 'Main Menu 2', 'theme' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	//this theme uses its own CASAWP css
	if (get_option('casawp_load_css')) {
		update_option('casawp_load_css', false);
		echo '<div class="error"><p>Removed casawp_load_css option because the activated theme takes care of that</p></div>';
	}

	//this theme was designded for CASAWP bootstrap3 theme
	if (get_option('casawp_viewgroup') != 'bootstrap3') {
		update_option('casawp_viewgroup', 'bootstrap3');
		echo '<div class="error"><p>Current theme was designed for Twitter Bootstrap 3 and the appropriate settings have been made</p></div>';
	}

	//this theme implements fancybox by default and does not require featherlight to be loaded
	if (get_option('casawp_load_featherlight')) {
		update_option('casawp_load_featherlight', false);
		echo '<div class="error"><p>Current theme implements fancybox by default and does not require featherlight to be loaded</p></div>';
	}

	//let WordPress manage the titles
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_setup' );

add_image_size('banner', 2000, 1000);

add_image_size('bannerHome', 4000, 1000);

add_action( 'after_setup_theme', 'theme_setup' );
if (function_exists('acf_add_options_page')) {
	acf_add_options_page('Optionen');
}


function theme_scripts() {
	//Scripts
	wp_enqueue_script( 'theme-assets', get_template_directory_uri() . '/js/assets.min.js', array( 'jquery' ), '20140314', true );
	wp_enqueue_script( 'theme-main', get_template_directory_uri() . '/js/main.min.js', array( 'theme-assets' ), '20140314', true );

	//Styles
	wp_enqueue_style( 'theme-main', get_bloginfo('stylesheet_url'), array(), 22 ); // update version before showing customer

	//Fonts
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300', false );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/* remove error message on failed login */
add_filter('login_errors',create_function('$a', "return null;"));

function custom_youtube_settings($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
		return $return;
	}
	return $code;
}
 
add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');

add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}

/* disable xmlrpc */
add_filter('xmlrpc_enabled', '__return_false');

/* allow editors to edit menus */
$role = get_role('editor'); 
$role->add_cap('edit_theme_options');

/* acf preperation for fields */
if(function_exists("register_field_group")) {
	require_once(get_template_directory() . '/src/inc/acf-fields.php');
}

/* template system made by jeremy */
foreach (glob(get_template_directory() . "/templates/*/functions.php") as $filepath) {
    if (is_file($filepath)) {
    	require_once($filepath);
    }
}


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57b2fea79e688',
	'title' => 'Banner',
	'fields' => array (
		array (
			'key' => 'field_57b2feac1df89',
			'label' => 'Banner',
			'name' => 'banner',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57b2fec9cee2b',
	'title' => 'Banner-Immo',
	'fields' => array (
		array (
			'key' => 'field_57b2fed33f73f',
			'label' => 'Banner-Immo',
			'name' => 'banner-immo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-optionen',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57b475338440d',
	'title' => 'Partner',
	'fields' => array (
		array (
			'key' => 'field_57b4753c8f60a',
			'label' => 'Partner',
			'name' => 'partner',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Eintrag hinzufügen',
			'sub_fields' => array (
				array (
					'key' => 'field_57b475438f60b',
					'label' => 'Logo',
					'name' => 'logo',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_57b4754d8f60c',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57b475558f60d',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-template-partner.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57b2fedd0fb41',
	'title' => 'Second-Banner',
	'fields' => array (
		array (
			'key' => 'field_57b2fef1662ea',
			'label' => 'Second-Banner',
			'name' => 'second-banner',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57b31244616c3',
	'title' => 'Zusatzinhalt',
	'fields' => array (
		array (
			'key' => 'field_57b3124a67ea4',
			'label' => 'Zusatzinhalt',
			'name' => 'zusatzinhalt',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Eintrag hinzufügen',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '57b31253a3985',
					'name' => 'inhalt-layout',
					'label' => 'Inhalt-Layout',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57b3125967ea5',
							'label' => 'Inhalt',
							'name' => 'inhalt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57b428dcaae08',
					'name' => 'second-banner-layout',
					'label' => 'Second-Banner-Layout',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57b428e8aae0a',
							'label' => 'Second-Banner',
							'name' => 'second-banner',
							'type' => 'image',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => '',
							'preview_size' => 'thumbnail',
							'library' => '',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'field_57b429abaae0b',
							'label' => 'Second-Banner-Text',
							'name' => 'second-banner-text',
							'type' => 'text',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57b429b4aae0c',
					'name' => 'second-slider-layout',
					'label' => 'Second-Slider-Layout',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57b429b4aae0d',
							'label' => 'Second-Slider',
							'name' => 'second-slider',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => '',
							'max' => '',
							'layout' => 'table',
							'button_label' => 'Eintrag hinzufügen',
							'sub_fields' => array (
								array (
									'key' => 'field_57b429d0aae0f',
									'label' => 'Slide',
									'name' => 'slide',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array (
									'key' => 'field_57b429d8aae10',
									'label' => 'Text',
									'name' => 'text',
									'type' => 'wysiwyg',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'tabs' => 'all',
									'toolbar' => 'full',
									'media_upload' => 1,
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57c3e8a127283',
					'name' => 'tab-layout',
					'label' => 'Tab-Layout',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57c3e8a927287',
							'label' => 'Tabs',
							'name' => 'tabs',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => '',
							'max' => '',
							'layout' => 'table',
							'button_label' => 'Eintrag hinzufügen',
							'sub_fields' => array (
								array (
									'key' => 'field_57c3e8c227288',
									'label' => 'Tab-Titel',
									'name' => 'tab-titel',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array (
									'key' => 'field_57c3e8ce27289',
									'label' => 'Tab-Text',
									'name' => 'tab-text',
									'type' => 'wysiwyg',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'tabs' => 'all',
									'toolbar' => 'full',
									'media_upload' => 1,
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57ea2e7261f94',
	'title' => 'Kacheln',
	'fields' => array (
		array (
			'key' => 'field_57ea2e8850296',
			'label' => 'Kacheln',
			'name' => 'kacheln',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Eintrag hinzufügen',
			'sub_fields' => array (
				array (
					'key' => 'field_57ea2e8f50297',
					'label' => 'Bild',
					'name' => 'bild',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_57ea51c650298',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'page_link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'allow_archives' => 1,
					'multiple' => 0,
				),
				array (
					'key' => 'field_57ea51cf50299',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-template-dl.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_57eb662925b8c',
	'title' => 'Kontaktperson',
	'fields' => array (
		array (
			'key' => 'field_57eb662fc1f2e',
			'label' => 'Kontaktperson',
			'name' => 'kontaktperson',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Eintrag hinzufügen',
			'sub_fields' => array (
				array (
					'key' => 'field_57eb663dc1f2f',
					'label' => 'Bild',
					'name' => 'bild',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_57eb6658c1f30',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57eb665ec1f31',
					'label' => 'Funktion',
					'name' => 'funktion',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57eb6662c1f32',
					'label' => 'E-Mail',
					'name' => 'e-mail',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57eb6667c1f33',
					'label' => 'Telefon',
					'name' => 'telefon',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;