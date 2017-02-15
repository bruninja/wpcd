<?php
/**
 *	The template for displaying the subheader in archive and singular.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php if( is_singular() && !is_page_template( 'page-templates/blog.php' ) ): ?>
	<?php
	$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'kira-lite-singular' );
	$default_image = get_theme_mod( 'kira_lite_blog_global_section_default_image', esc_url( get_template_directory_uri() . '/layout/images/index/carousel-image1.jpg' ) );
	?>
	<section class="subheader image" style="background-image: url('<?php if( $post_thumbnail ): echo esc_url( $post_thumbnail[0] ); else: echo esc_url( $default_image ); endif; ?>');">
		<div class="container-fluid">
			<?php if( $post_thumbnail == null && $default_image == null ): ?>
				<h1 class="no-image"><?php _e( 'No image', 'kira-lite' ); ?></h1>
			<?php endif; ?>
			<?php do_action( 'mtl_breadcrumbs' ); ?>
		</div><!--/.container-->
	</section><!--/.subheader.image-->
<?php elseif( is_archive() ): ?>
	<section class="subheader text">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<?php kira_lite_the_archive_title( '<h2 class="medium">', '</h2>' ); ?>
					<?php kira_lite_the_archive_description( '<p>', '</p>' ); ?>
				</div><!--/.col-sm-12-->
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/.subheader.text-->
<?php elseif( is_search() ): ?>
	<section class="subheader text">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="medium"><?php printf( esc_html__( 'Search Results for: %s', 'kira-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</div><!--/.col-sm-12-->
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/.subheader.text-->
<?php else: ?>
	<section class="subheader text">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<?php if( get_bloginfo( 'name' ) ): ?>
						<h2 class="medium"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
					<?php endif; ?>
					<?php if( get_bloginfo( 'description' ) ): ?>
						<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
					<?php endif; ?>
				</div><!--/.col-sm-12-->
			</div><!--/.row-->
		</div><!--/.container-->
	</section><!--/.subheader.text-->
<?php endif; ?>