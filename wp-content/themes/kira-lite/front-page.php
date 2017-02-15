<?php
/**
 *	The template for displaying the front page.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php get_header(); ?>
<?php
if( get_option( 'show_on_front' ) == 'page' ):
	if( is_page_template( 'page-templates/blog.php' ) ):
		get_template_part( 'page-templates/blog' );
	elseif( is_page_template( 'page-templates/sidebar-left.php' ) ):
		get_template_part( 'page-templates/sidebar', 'left' );
	elseif( is_page_template( 'page-templates/sidebar-right.php' ) ):
		get_template_part( 'page-templates/sidebar', 'right' );
	else:
		get_template_part( 'page' );
	endif;
else:
	// Get Theme Mod
	$services_general_show = get_theme_mod( 'kira_lite_services_general_show', 1 );
	$testimonials_general_show = get_theme_mod( 'kira_lite_testimonials_general_show', 1 );
	$works_general_show = get_theme_mod( 'kira_lite_works_general_show', 1 );
	$team_general_show = get_theme_mod( 'kira_lite_team_general_show', 1 );

	// Services Section
	if( $services_general_show == 1 ):
		get_template_part( 'sections/section', 'front-page-services' );
	endif;

	// Works Section
	if( $works_general_show == 1 ):
		get_template_part( 'sections/section', 'front-page-works' );
	endif;

	// Team Section
	if( $team_general_show == 1 ):
		get_template_part( 'sections/section', 'front-page-team' );
	endif;

	// Contact & Blog Section
	get_template_part( 'sections/section', 'front-page-contact-and-blog' );
endif;
?>
<?php get_footer(); ?>