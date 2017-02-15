<?php
/**
 *	The header for our theme.
 *
 *	This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 *	@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php do_action( 'mtl_site_preloader' ); ?>
		<header id="header">
			<?php do_action( 'mtl_before_header' ); ?>
			<div class="center-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-3">
							<?php
							$img_logo = get_theme_mod( 'kira_lite_img_logo', get_template_directory_uri() . '/layout/images/header-logo.png' );
							$text_logo = get_theme_mod( 'kira_lite_text_logo', __( 'Kira Lite', 'kira-lite' ) );
							?>
							<?php if( $img_logo ): ?>
								<a class="header-logo" href="<?php echo esc_url( get_site_url() ); ?>" title="<?php echo esc_attr( $text_logo ); ?>"><img src="<?php echo esc_url( $img_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
							<?php elseif( $text_logo ): ?>
								<a class="header-logo" href="<?php echo esc_url( get_site_url() ); ?>" title="<?php echo esc_attr( $text_logo ); ?>"><?php echo esc_html( $text_logo ); ?></a>
							<?php endif; ?>
						</div><!--/.col-sm-3-->
						<div class="col-sm-9">
							<nav class="header-navigation <?php if( !has_nav_menu( 'primary' ) && !is_user_logged_in() ): echo 'custom-header-navigation'; endif; ?>">
								<ul class="clearfix">
									<?php
									wp_nav_menu( array(
										'theme_location'	=> 'primary',
										'menu'				=> '',
										'container'			=> '',
										'container_class'	=> '',
										'container_id'		=> '',
										'menu_class'		=> '',
										'menu_id'			=> '', 
										'items_wrap'		=> '%3$s',
										'walker'			=> new MTL_Extended_Menu_Walker(),
										'fallback_cb'		=> 'MTL_Extended_Menu_Walker::fallback'
									) );
									?>
								</ul><!--/.clearfix-->
							</nav><!--/.header-navigation-->
							<button class="open-responsive-menu"><i class="fa fa-bars"></i></button>
						</div><!--/.col-sm-9-->
					</div><!--/.row-->
				</div><!--/.container-->
			</div><!--/.center-header-->
			<nav class="responsive-menu">
				<ul>
					<?php
					wp_nav_menu( array(
						'theme_location'	=> 'primary',
						'menu'				=> '',
						'container'			=> '',
						'container_class'	=> '',
						'container_id'		=> '',
						'menu_class'		=> '',
						'menu_id'			=> '', 
						'items_wrap'		=> '%3$s',
						'walker'			=> new MTL_Extended_Menu_Walker(),
						'fallback_cb'		=> 'MTL_Extended_Menu_Walker::fallback'
					) );
					?>
				</ul>
			</nav><!--/.responsive-menu-->
			<?php
			if( is_front_page() && get_option( 'show_on_front' ) != 'page' ):
				get_template_part( 'sections/section', 'front-page-subheader' );
			else:
				get_template_part( 'sections/section', 'archive-and-singular-subheader' );
			endif;
			?>
		</header><!--/#header-->