<?php
/**
 *	The template for dispalying the WooCommerce Content.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>
	<div class="single-content">
		<div class="content-entry woocommerce" style="margin-top: 0;">
			<?php woocommerce_content(); ?>
		</div><!--/.content-entry.woocommerce-->
	</div><!--/.single-content-->
</article><!--/.post-single-->