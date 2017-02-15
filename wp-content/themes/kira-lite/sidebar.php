<?php
/**
 *	The sidebar containing the main widget area.
 *
 *	@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php if( is_active_sidebar( 'blog-sidebar' ) ): ?>
	<div class="col-sm-4">
		<aside class="sidebar">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside><!--/.sidebar-->
	</div><!--/.col-sm-4-->
<?php endif; ?>