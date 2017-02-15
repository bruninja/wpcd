/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	// Front page - About Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-services-sidebar' ).panel( 'kira_lite_services' );
	wp.customize.section( 'sidebar-widgets-front-page-services-sidebar' ).priority( '2' );

	// Front page - Works Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-works-sidebar' ).panel( 'kira_lite_works' );
	wp.customize.section( 'sidebar-widgets-front-page-works-sidebar' ).priority( '2' );

	// Front page - Team Sidebar
	wp.customize.section( 'sidebar-widgets-front-page-team-sidebar' ).panel( 'kira_lite_team' );
	wp.customize.section( 'sidebar-widgets-front-page-team-sidebar' ).priority( '2' );
});