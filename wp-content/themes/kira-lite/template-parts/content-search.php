<?php
/**
 *	Template part for displaying results in search pages.
 *
 *	@link https://codex.wordpress.org/Template_Hierarchy
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'post clearfix' ); ?>>
	<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'kira-lite-blog-list' ); ?>
	<?php if( $post_thumbnail ): ?>
		<div class="post-image" style="background-image: url('<?php echo esc_url( $post_thumbnail[0] ); ?>');"></div>
	<?php endif; ?>
	<div class="post-content">
		<div class="content-meta clearfix">
			<?php do_action( 'mtl_archive_meta_content' ); ?>
		</div><!--/.content-meta.clearfix-->
		<h2 class="content-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
		<div class="content-entry">
			<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		</div><!--/.content-entry-->
	</div><!--/.post-content-->
	<a class="button-four" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php _e( 'Read more', 'kira-lite' ); ?>"><span><?php _e( 'Read more', 'kira-lite' ); ?></span></a>
</div><!--/.post-<?php the_ID(); ?>.<?php post_class( 'post clearfix' ); ?>-->