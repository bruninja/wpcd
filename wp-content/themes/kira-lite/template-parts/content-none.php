<?php
/**
 *	Template part for displaying a message that posts cannot be found.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<div class="post clearfix">
	<div class="post-content">
		<h2 class="content-title"><?php _e( 'Nothing Found', 'kira-lite' ); ?></h2>
		<div class="content-entry">
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kira-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		</div><!--/.content-entry-->
	</div><!--/.post-content-->
</div><!--/.post.clearfix-->