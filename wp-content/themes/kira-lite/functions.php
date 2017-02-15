<?php
/**
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    WordPress
 * @subpackage kira-lite
 */
?>
<?php
if ( ! function_exists( 'kira_lite_setup' ) ) {
	/**
	 *    Sets up theme defaults and registers support for various WordPress features.
	 *
	 *    Note that this function is hooked into the after_setup_theme hook, which
	 *    runs before the init hook. The init hook is too late for some features, such
	 *    as indicating support for post thumbnails.
	 */
	add_action( 'after_setup_theme', 'kira_lite_setup' );
	function kira_lite_setup() {
		// Components
		require_once( 'inc/components/nav-walker/class.mt-nav-walker.php' );
		require_once( 'inc/components/contact-bar/class.mt-contact-bar.php' );
		require_once( 'inc/components/pagination/class.mt-pagination.php' );
		require_once( 'inc/components/breadcrumbs/class.mt-breadcrumbs.php' );
		require_once( 'inc/components/preloader/class.mt-preloader-output.php' );
		require_once( 'inc/components/entry-meta/class.mt-entry-meta.php' );
		require_once( 'inc/components/author-box/class.mt-author-box.php' );

		// Widgets
		require_once( 'widgets/widget-recent-posts.php' );
		require_once( 'widgets/widget-service.php' );
		require_once( 'widgets/widget-work.php' );
		require_once( 'widgets/widget-member.php' );

		// Customizer
		require_once( 'inc/customizer/customizer.php' );

		// Extras
		require_once( 'inc/extras.php' );

		// Jetpack
		require_once( 'inc/jetpack.php' );

		// Template Tags
		require_once( 'inc/template-tags.php' );

		// TGHMPA
		require_once( 'inc/tgmpa/tgm-plugin-activation.php' );

		/**
		 *    Make theme available for translation.
		 *    Translations can be filed in the /languages/ directory.
		 *    If you're building a theme based on kira-lite, use a find and replace
		 *    to change 'kira-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kira-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 *    Let WordPress manage the document title.
		 *    By adding theme support, we declare that this theme does not use a
		 *    hard-coded <title> tag in the document head, and expect WordPress to
		 *    provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 *    Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 *    Enable support for Custom Header on front page
		 *
		 * @link https://codex.wordpress.org/Custom_Headers
		 */
		add_theme_support( 'custom-header', array(
			'default-image'  => get_template_directory_uri() . '/layout/images/index/carousel-image1.jpg',
			'width'          => 1920,
			'height'         => 700,
			'flex-height'    => true,
			'random-default' => false,
			'header-text'    => false,
		) );

		/*
		 *	Switch default core markup for search form, comment form, and comments
		 *	to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/**
		 *    WooCommerce
		 */
		add_theme_support( 'woocommerce' );

		/**
		 *    This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'kira-lite' ),
		) );

		/**
		 *    Add image sizes
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_image_size
		 */
		add_image_size( 'kira-lite-blog-list', 805, 400, true );
		add_image_size( 'kira-lite-widget-recent-posts', 62, 62, true );
		add_image_size( 'kira-lite-singular', 3840, 900, true );
		add_image_size( 'kira-lite-front-page-blog', 175, 175, true );
		add_image_size( 'kira-lite-front-page-works', 410, 300, true );
		add_image_size( 'kira-lite-front-page-services', 240, 72, true );
		add_image_size( 'kira-lite-front-page-member', 90, 90, true );
	}
}

/**
 *    Set the content width in pixels, based on the theme's design and stylesheet.
 *
 *    Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action( 'after_setup_theme', 'kira_lite_content_width' );
function kira_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kira_lite_content_width', 725 );
}

/**
 *    Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'kira_lite_widgets' );
function kira_lite_widgets() {
	// Primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'kira-lite' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in blog page.', 'kira-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3 class="medium">',
		'after_title'   => '</h3></div>',
	) );

	// Front page - Services Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Front page - Services Sidebar', 'kira-lite' ),
		'id'            => 'front-page-services-sidebar',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in first section from front page. Use these widgets in this sidebar: [MT] - Member, [MT] - Service, [MT] - Work.', 'kira-lite' ),
		'before_widget' => '<div class="col-md-4 col-sm-6">',
		'after_widget'  => '</div><!--/.col-md-4 col-sm-6-->',
		'before_title'  => '',
		'after_title'   => '',
	) );

	// Front page - Works Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Front page - Works Sidebar', 'kira-lite' ),
		'id'            => 'front-page-works-sidebar',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in second section from front page. Use these widgets in this sidebar: [MT] - Member, [MT] - Service, [MT] - Work.', 'kira-lite' ),
		'before_widget' => '<div class="col-md-4 col-sm-6">',
		'after_widget'  => '</div><!--/.col-md-4 col-sm-6-->',
		'before_title'  => '',
		'after_title'   => '',
	) );

	// Front page - Team Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Front page - Team Sidebar', 'kira-lite' ),
		'id'            => 'front-page-team-sidebar',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in third section from front page. Use these widgets in this sidebar: [MT] - Member, [MT] - Service, [MT] - Work.', 'kira-lite' ),
		'before_widget' => '<div class="col-md-4 col-xs-6">',
		'after_widget'  => '</div><!--/.col-md-4 col-xs-6-->',
		'before_title'  => '',
		'after_title'   => '',
	) );

	// Footer - Sidebar 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Sidebar 1', 'kira-lite' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in footer.', 'kira-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3 class="medium">',
		'after_title'   => '</h3></div>',
	) );

	// Footer - Sidebar 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Sidebar 2', 'kira-lite' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in footer.', 'kira-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3 class="medium">',
		'after_title'   => '</h3></div>',
	) );

	// Footer - Sidebar 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - Sidebar 3', 'kira-lite' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'The widgets added in this sidebar will appear in footer.', 'kira-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3 class="medium">',
		'after_title'   => '</h3></div>',
	) );

	// WooCommerce Sidebar
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => __( 'WooCommerce Sidebar', 'kira-lite' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in WooCommerce pages.', 'kira-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3 class="medium">',
			'after_title'   => '</h3></div>',
		) );
	}
}

/**
 *    WP Enqueue Styles
 */
add_action( 'wp_enqueue_scripts', 'kira_lite_enqueue_styles' );
function kira_lite_enqueue_styles() {
	global $wp_customize;

	// Get Theme Mod
	$enable_site_preloader = get_theme_mod( 'kira_lite_enable_site_preloader', 1 );

	// Google Fonts
	$google_fonts_args = array(
		'family' => 'Work+Sans:400,600,500%7cJosefin+Sans:700',
	);

	// WP Register Style
	wp_register_style( 'kira-lite-google-fonts', add_query_arg( $google_fonts_args, '//fonts.googleapis.com/css' ), array(), null );

	// WP Enqueue Style
	wp_enqueue_style( 'kira-lite-google-fonts' );

	if ( $enable_site_preloader == 1 ) {
		wp_enqueue_style( 'kira-lite-pace', get_template_directory_uri() . '/layout/css/pace.min.css', array(), '', 'all' );
	}

	wp_enqueue_style( 'kira-lite-bootstrap', get_template_directory_uri() . '/layout/css/bootstrap.min.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'kira-lite-style', get_stylesheet_uri(), array(), '1.0.15', 'all' );
	wp_enqueue_style( 'kira-lite-responsive', get_template_directory_uri() . '/layout/css/responsive.min.css', array(), '1.0.15', 'all' );
	wp_enqueue_style( 'kira-lite-font-awesome', get_template_directory_uri() . '/layout/css/font-awesome.min.css', array(), '4.4.0', 'all' );
}

/**
 *    WP Enqueue Scripts
 */
add_action( 'wp_enqueue_scripts', 'kira_lite_enqueue_scripts' );
function kira_lite_enqueue_scripts() {
	global $wp_customize;

	// Get Theme Mod
	$enable_site_preloader = get_theme_mod( 'kira_lite_enable_site_preloader', 1 );

	// WP Enqueue Script
	if ( $enable_site_preloader == 1 ) {
		wp_enqueue_script( 'kira-lite-pace', get_template_directory_uri() . '/layout/js/plugins/pace/pace.min.js', array( 'jquery' ), '', false );
	}

	wp_enqueue_script( 'kira-lite-bootstrap', get_template_directory_uri() . '/layout/js/plugins/bootstrap/bootstrap.min.js', array( 'jquery' ), '3.3.5', true );
	wp_enqueue_script( 'kira-lite-caroufredsel', get_template_directory_uri() . '/layout/js/plugins/caroufredsel/caroufredsel.min.js', array( 'jquery' ), '6.2.1', true );
	wp_enqueue_script( 'kira-lite-parallax', get_template_directory_uri() . '/layout/js/plugins/parallax/parallax.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'kira-lite-plugins', get_template_directory_uri() . '/layout/js/plugins.min.js', array( 'jquery' ), '1.0.15', true );
	wp_enqueue_script( 'kira-lite-custom', get_template_directory_uri() . '/layout/js/custom.min.js', array( 'jquery' ), '1.0.15', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}