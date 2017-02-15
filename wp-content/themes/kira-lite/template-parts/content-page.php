<?php
/**
 *	Template part for displaying page content in page.php.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
	<div class="single-title">
		<?php if( !is_page_template( 'page-templates/sidebar-left.php' ) ): ?>
		<div class="out-left post-single-title"></div>
		<?php endif; ?>
		<h2 class="medium"><?php the_title(); ?></h2>
	</div><!--/.single-title-->
	<div class="single-content">
		<div class="content-entry markup-format" style="margin-top: 0;">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before'	=> '<div class="link-pages">' . __( 'Pages:', 'kira-lite' ),
				'after'		=> '</div><!--/.link-pages-->'
			) );
			?>
		</div><!--/.content-entry.markup-format-->
	</div><!--/.single-content-->
</article><!--/.post-single-->