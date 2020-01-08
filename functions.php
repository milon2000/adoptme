<?php
/**
 * Adopt Me! functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adopt_Me!
 */

if ( ! function_exists( 'adoptme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adoptme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Adopt Me!, use a find and replace
		 * to change 'adoptme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adoptme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'adoptme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'adoptme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		//Projects post type
		register_post_type('project',
		array(
			'rewrite' => array('slug' => 'projects'),
			'labels' => array(
				'name' => 'Projects',
				'singular_name' => 'Project',
				'add_new_item' => 'Add New Project'
			),
			'menu-icon' => 'dashicos-clipboard',
			'public' => true,
			'has_archive' => true,
			'supports' => array(
				'title', 'thumbnail', 'editor', 'comments', 'custom-fields', 'excerpt'
			)
		
		)
			);

		add_image_size( 'companies_thumb', 1200, 800, true);

		//Social Media 

		add_action( 'customize_register', 'adoptme_social_media' );
		
		function adoptme_social_media( $wp_customize ) {
			// Create custom panel.
			$wp_customize->add_panel( 'social_media_block', array(
				'priority'       => 500,
				'theme_supports' => '',
				'title'          => __( 'Social Media', 'adoptme' ),
				'description'    => __( 'Changing social media in the footer.', 'adoptme' ),
			) );
			
			// Add section.
			$wp_customize->add_section( 'facebook_link' , array(
				'title'    => __('Facebook','adoptme'),
				'panel'    => 'social_media_block',
				'priority' => 10
			) );
		
			// Add setting
			$wp_customize->add_setting( 'facebook_block', array(
				 'default'           => __( '', 'adoptme' ),
				 'sanitize_callback' => 'sanitize_social'
			) );
			// Add control
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'facebook_url',
					array(
						'label'    => __( 'Facebook url', 'adoptme' ),
						'section'  => 'facebook_link',
						'settings' => 'facebook_block',
						'type'     => 'text'
					)
				)
			);

				// Add section.
				$wp_customize->add_section( 'instagram_link' , array(
					'title'    => __('Instagram','adoptme'),
					'panel'    => 'social_media_block',
					'priority' => 10
				) );
			
				// Add setting
				$wp_customize->add_setting( 'instagram_block', array(
					 'default'           => __( '', 'adoptme' ),
					 'sanitize_callback' => 'sanitize_social'
				) );
				// Add control
				$wp_customize->add_control( new WP_Customize_Control(
					$wp_customize,
					'instagram_url',
						array(
							'label'    => __( 'Instagram url', 'adoptme' ),
							'section'  => 'instagram_link',
							'settings' => 'instagram_block',
							'type'     => 'text'
						)
					)
				);

								// Add section.
								$wp_customize->add_section( 'twitter_link' , array(
									'title'    => __('Twitter','adoptme'),
									'panel'    => 'social_media_block',
									'priority' => 10
								) );
							
								// Add setting
								$wp_customize->add_setting( 'twitter_block', array(
									 'default'           => __( '', 'adoptme' ),
									 'sanitize_callback' => 'sanitize_social'
								) );
								// Add control
								$wp_customize->add_control( new WP_Customize_Control(
									$wp_customize,
									'twitter_url',
										array(
											'label'    => __( 'Twitter url', 'adoptme' ),
											'section'  => 'twitter_link',
											'settings' => 'twitter_block',
											'type'     => 'text'
										)
									)
								);
			
			 // Sanitize text
			function sanitize_social( $text ) {
				return sanitize_text_field( $text );
			}
		}

		//Header text 

		add_action( 'customize_register', 'adoptme_header_text' );
		/*
		 * Register Our Customizer Stuff Here
		 */
		function adoptme_header_text( $wp_customize ) {
			// Create custom panel.
			$wp_customize->add_panel( 'text_blocks_header', array(
				'priority'       => 500,
				'theme_supports' => '',
				'title'          => __( 'Header Text', 'adoptme' ),
				'description'    => __( 'Changing header text.', 'adoptme' ),
			) );

			$wp_customize->add_section( 'header_quotation_text' , array(
				'title'    => __('Change Quotation','adoptme'),
				'panel'    => 'text_blocks_header',
				'priority' => 10
			) );

				// Add setting
				$wp_customize->add_setting( 'header_quot_block', array(
					'default'           => __( 'default text', 'adoptme' ),
					'sanitize_callback' => 'sanitize_text'
			   ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'header_quotation_text',
					array(
						'label'    => __( 'Quotation Text', 'adoptme' ),
						'section'  => 'header_quotation_text',
						'settings' => 'header_quot_block',
						'type'     => 'text'
					)
				)
			);

			$wp_customize->add_section( 'header_author_text' , array(
				'title'    => __('Change Author Name','adoptme'),
				'panel'    => 'text_blocks_header',
				'priority' => 10
			) );

				// Add setting
				$wp_customize->add_setting( 'header_author_block', array(
					'default'           => __( 'default text', 'adoptme' ),
					'sanitize_callback' => 'sanitize_text'
			   ) );

			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'header_author_text',
					array(
						'label'    => __( 'Author Name', 'adoptme' ),
						'section'  => 'header_author_text',
						'settings' => 'header_author_block',
						'type'     => 'text'
					)
				)
			);
			
			 // Sanitize text
			function sanitize_text( $text ) {
				return sanitize_text_field( $text );
			}
		}

	

		//About text
		add_action( 'customize_register', 'adoptme_about_text' );
		/*
		 * Register Our Customizer Stuff Here
		 */
		function adoptme_about_text( $wp_customize ) {
			// Create custom panel.
			$wp_customize->add_panel( 'text_blocks_about', array(
				'priority'       => 500,
				'theme_supports' => '',
				'title'          => __( 'About text', 'adoptme' ),
				'description'    => __( 'Changing about text at main site.', 'adoptme' ),
			) );
			
			// Add section.
			$wp_customize->add_section( 'custom_about_text' , array(
				'title'    => __('Change About Text','adoptme'),
				'panel'    => 'text_blocks_about',
				'priority' => 10
			) );
		
			// Add setting
			$wp_customize->add_setting( 'about_block', array(
				 'default'           => __( 'default text', 'adoptme' ),
				 'sanitize_callback' => 'sanitize_about'
			) );
			// Add control
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'custom_about_text',
					array(
						'label'    => __( 'About text', 'adoptme' ),
						'section'  => 'custom_about_text',
						'settings' => 'about_block',
						'type'     => 'text'
					)
				)
			);
			
			 // Sanitize text
			function sanitize_about( $text ) {
				return sanitize_text_field( $text );
			}
		}

		//How it works
		
		add_action( 'customize_register', 'adoptme_how_it_works_section' );
		/*
		 * Register Our Customizer Stuff Here
		 */
		function adoptme_how_it_works_section( $wp_customize ) {
			// Create custom panel.
			$wp_customize->add_panel( 'how_it_works_panel', array(
				'priority'       => 500,
				'theme_supports' => '',
				'title'          => __( 'How it works section', 'adoptme' ),
				'description'    => __( 'Changing how it works section on the home page.', 'adoptme' ),
			) );
			
			// Add section (the first one)
			$wp_customize->add_section( 'custom_how_it_works' , array(
				'title'    => __('Change First Section','adoptme'),
				'panel'    => 'how_it_works_panel',
				'priority' => 10
			) );
		
			// Add setting
			$wp_customize->add_setting( 'how_it_works_first_block_title', array(
				 'default'           => __( 'default text', 'adoptme' ),
				 'sanitize_callback' => 'sanitize_how_it_works'
			) );
				// Add setting
				$wp_customize->add_setting( 'how_it_works_first_block_txt', array(
					'default'           => __( 'default text', 'adoptme' ),
					'sanitize_callback' => 'sanitize_how_it_works'
			   ) );
			// Add control
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'how_it_works_first_block_title',
					array(
						'label'    => __( 'First section - title', 'adoptme' ),
						'section'  => 'custom_how_it_works',
						'settings' => 'how_it_works_first_block_title',
						'type'     => 'text'
					)
				)
			);
					// Add control
					$wp_customize->add_control( new WP_Customize_Control(
						$wp_customize,
						'how_it_works_first_block_txt',
							array(
								'label'    => __( 'First section - text', 'adoptme' ),
								'section'  => 'custom_how_it_works',
								'settings' => 'how_it_works_first_block_txt',
								'type'     => 'text'
							)
						)
					);

					// Add section (the second one)
			$wp_customize->add_section( 'custom_how_it_works2' , array(
				'title'    => __('Change Second Section','adoptme'),
				'panel'    => 'how_it_works_panel',
				'priority' => 10
			) );
		
			// Add setting
			$wp_customize->add_setting( 'how_it_works_second_block_title', array(
				 'default'           => __( 'default text', 'adoptme' ),
				 'sanitize_callback' => 'sanitize_how_it_works'
			) );
				// Add setting
				$wp_customize->add_setting( 'how_it_works_second_block_txt', array(
					'default'           => __( 'default text', 'adoptme' ),
					'sanitize_callback' => 'sanitize_how_it_works'
			   ) );
			// Add control
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'how_it_works_second_block_title',
					array(
						'label'    => __( 'Second section - title', 'adoptme' ),
						'section'  => 'custom_how_it_works2',
						'settings' => 'how_it_works_second_block_title',
						'type'     => 'text'
					)
				)
			);
					// Add control
					$wp_customize->add_control( new WP_Customize_Control(
						$wp_customize,
						'how_it_works_second_block_txt',
							array(
								'label'    => __( 'Second section - text', 'adoptme' ),
								'section'  => 'custom_how_it_works2',
								'settings' => 'how_it_works_second_block_txt',
								'type'     => 'text'
							)
						)
					);

					// Add section (the third one)
			$wp_customize->add_section( 'custom_how_it_works3' , array(
				'title'    => __('Change Third Section','adoptme'),
				'panel'    => 'how_it_works_panel',
				'priority' => 10
			) );
		
			// Add setting
			$wp_customize->add_setting( 'how_it_works_third_block_title', array(
				 'default'           => __( 'default text', 'adoptme' ),
				 'sanitize_callback' => 'sanitize_how_it_works'
			) );
				// Add setting
				$wp_customize->add_setting( 'how_it_works_third_block_txt', array(
					'default'           => __( 'default text', 'adoptme' ),
					'sanitize_callback' => 'sanitize_how_it_works'
			   ) );
			// Add control
			$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'how_it_works_third_block_title',
					array(
						'label'    => __( 'Third section - title', 'adoptme' ),
						'section'  => 'custom_how_it_works3',
						'settings' => 'how_it_works_third_block_title',
						'type'     => 'text'
					)
				)
			);
					// Add control
					$wp_customize->add_control( new WP_Customize_Control(
						$wp_customize,
						'how_it_works_third_block_txt',
							array(
								'label'    => __( 'Third section - text', 'adoptme' ),
								'section'  => 'custom_how_it_works3',
								'settings' => 'how_it_works_third_block_txt',
								'type'     => 'text'
							)
						)
					);
			
			 // Sanitize text
			function sanitize_how_it_works( $text ) {
				return sanitize_text_field( $text );
			}
		}		
		
				//How it works
	}
endif;
add_action( 'after_setup_theme', 'adoptme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adoptme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'adoptme_content_width', 640 );
}
add_action( 'after_setup_theme', 'adoptme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adoptme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adoptme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adoptme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adoptme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adoptme_scripts() {
	wp_enqueue_style( 'adoptme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'adoptme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'adoptme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adoptme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

