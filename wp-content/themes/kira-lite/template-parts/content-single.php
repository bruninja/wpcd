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
		<div class="out-left post-single-title">
		</div><!--/.out-left.post-single-title-->
		<h2 class="medium"><?php the_title(); ?></h2>
	</div><!--/.single-title-->
	<div class="single-content">
		<?php do_action( 'mtl_single_entry_meta' ); ?>
		<div class="content-entry markup-format">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before'	=> '<div class="link-pages">' . __( 'Pages:', 'kira-lite' ),
				'after'		=> '</div><!--/.link-pages-->'
			) );
			?>
		</div><!--/.content-entry.markup-format-->
	</div><!--/.single-content-->
	<?php do_action( 'mtl_single_after_content' ); ?>
	<div class="single-meta clearfix hidden-xs">
		<div class="meta-left">
			<?php do_action( 'mtl_single_content_tags' ); ?>
		</div><!--/.meta-left-->
	</div><!--/.single-meta.clearfix.idden-xs-->
	<?php do_action( 'mtl_single_author' ); ?>
	<?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article><!--/.post-single-->