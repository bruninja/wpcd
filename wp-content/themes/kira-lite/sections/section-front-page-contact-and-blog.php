<?php
/**
 *	The template for displaying the contact & blog in front page.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */
?>
<?php
$general_left_title = get_theme_mod( 'kira_lite_contact_blog_general_left_title', esc_html__( 'Contact', 'kira-lite' ) );
$general_left_button_text = get_theme_mod( 'kira_lite_contact_blog_general_left_button_text', esc_html__( 'Send us a message', 'kira-lite' ) );
$general_left_button_url = get_theme_mod( 'kira_lite_contact_blog_general_left_button_url', esc_url( '#' ) );
$general_right_title = get_theme_mod( 'kira_lite_contact_blog_general_right_title', esc_html__( 'Blog', 'kira-lite' ) );
$general_right_button_text = get_theme_mod( 'kira_lite_contact_blog_general_right_button_text', esc_html__( 'View Blog', 'kira-lite' ) );
$general_right_button_url = get_theme_mod( 'kira_lite_contact_blog_general_right_button_url', esc_url( '#' ) );

$img_logo = get_theme_mod( 'kira_lite_img_logo' );
$phone = get_theme_mod( 'kira_lite_phone', esc_html__( '(555) 555-5555', 'kira-lite' ) );
$email = get_theme_mod( 'kira_lite_email', esc_html__( 'contact@site.com', 'kira-lite' ) );
$address1 = get_theme_mod( 'kira_lite_address1', esc_html__( 'Sherman Dr Street', 'kira-lite' ) );
$address2 = get_theme_mod( 'kira_lite_address2', esc_html__( '1081 JJ New York USA', 'kira-lite' ) );

$enable_social_icons = get_theme_mod( 'kira_lite_footer_enable_social_icons', 1 );
$facebook_url = get_theme_mod( 'kira_lite_contact_bar_facebook_url', esc_url( '#' ) );
$twitter_url = get_theme_mod( 'kira_lite_contact_bar_twitter_url', esc_url( '#' ) );
$youtube_url = get_theme_mod( 'kira_lite_contact_bar_youtube_url', esc_url( '#' ) );
$pinterest_url = get_theme_mod( 'kira_lite_contact_bar_pinterest_url', esc_url( '#' ) );
$linkedin_url = get_theme_mod( 'kira_lite_contact_bar_linkedin_url', esc_url( '#' ) );
$instagram_url = get_theme_mod( 'kira_lite_contact_bar_instagram_url', esc_url( '#' ) );
?>
<section id="index-head-details" class="index-head details">
	<div class="container-fluid">
		<div class="row dark-gray">
			<div class="col-sm-6">
				<div class="section-head dark-white-background">
					<?php if( $general_left_title ): ?>
						<h3 class="medium"><?php echo esc_html( $general_left_title ); ?></h3>
					<?php endif; ?>
					<?php if( $general_left_button_text && $general_left_button_url ): ?>
						<i class="fa fa-envelope-o"></i>
						<a class="button-two" href="<?php echo esc_url( $general_left_button_url ); ?>" title="<?php echo esc_attr( $general_left_button_text ); ?>"><?php echo esc_html( $general_left_button_text ); ?></a>
					<?php endif; ?>
				</div><!--/.section-head.dark-white-background-->
			</div><!--/.col-sm-6-->
			<div class="col-sm-6">
				<div class="section-head dark-gray-background">
					<?php if( $general_right_title ): ?>
						<h3 class="medium"><?php echo esc_html( $general_right_title ); ?></h3>
					<?php endif; ?>
					<?php if( $general_right_button_text && $general_right_button_url ): ?>
						<a class="button-one" href="<?php echo esc_url( $general_right_button_url ); ?>" title="<?php echo esc_attr( $general_right_button_text ); ?>"><?php echo esc_html( $general_right_button_text ); ?></a>
						<div class="out-right dark-gray">
						</div><!--/.out-right.dark-gray-->
					<?php endif; ?>
				</div><!--/.section-head.dark-gray-background-->
			</div><!--/.col-sm-6-->
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#index-head-details.index-head.details-->
<section class="index-details">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="details-contact clearfix">
					<?php if( $img_logo ): ?>
						<img class="contact-logo" src="<?php echo esc_url( $img_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					<?php endif; ?>

					<?php if( $phone || $email || $address1 || $address2 ): ?>
						<ul class="contact-list">
							<?php if( $phone ): ?>
								<li data-customizer="contact-list-phone"><i class="fa fa-phone"></i><?php echo esc_html( $phone ); ?></li>
							<?php endif; ?>
							<?php if( $email ): ?>
								<li data-customizer="contact-list-email-address"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( $email ); ?>" title="<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
							<?php endif; ?>
							<?php if( $address1 ): ?>
								<li data-customizer="contact-list-address1"><i class="fa fa-map-marker"></i><?php echo esc_html( $address1 ); ?></li>
							<?php endif; ?>
							<?php if( $address2 ): ?>
								<li data-customizer="contact-list-address2"><?php echo esc_html( $address2 ); ?></li>
							<?php endif; ?>
						</ul><!--/.contact-list-->
					<?php endif; ?>

					<?php if( $enable_social_icons == 1 ): ?>
						<?php if( $facebook_url || $twitter_url || $youtube_url || $pinterest_url || $linkedin_url || $instagram_url ): ?>
							<ul class="social-links-list" data-customizer="details-contact-social-links-list">
								<?php if( $facebook_url ): ?>
									<li><a href="<?php echo esc_url( $facebook_url ); ?>" title="<?php _e( 'Facebook', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>
								<?php if( $twitter_url ): ?>
									<li><a href="<?php echo esc_url( $twitter_url ); ?>" title="<?php _e( 'Twitter', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>
								<?php if( $youtube_url ): ?>
									<li><a href="<?php echo esc_url( $youtube_url ); ?>" title="<?php _e( 'YouTube', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<?php endif; ?>
								<?php if( $pinterest_url ): ?>
									<li><a href="<?php echo esc_url( $pinterest_url ); ?>" title="<?php _e( 'Pinterest', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<?php endif; ?>
								<?php if( $linkedin_url ): ?>
									<li><a href="<?php echo esc_url( $linkedin_url ); ?>" title="<?php _e( 'LinkedIn', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<?php endif; ?>
								<?php if( $instagram_url ): ?>
									<li><a href="<?php echo esc_url( $instagram_url ); ?>" title="<?php _e( 'Instagram', 'kira-lite' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<?php endif; ?>
							</ul><!--/.social-links-list-->
						<?php endif; ?>
					<?php endif; ?>
				</div><!--/.details-contact.clearfix-->
			</div><!--/.col-sm-6-->
			<div class="col-sm-6">
				<div class="section-head mobile dark-gray-background">
					<?php if( $general_right_title ): ?>
						<h3 class="medium"><?php echo esc_html( $general_right_title ); ?></h3>
					<?php endif; ?>
					<?php if( $general_right_button_text && $general_right_button_url ): ?>
						<a class="button-one" href="<?php echo esc_url( $general_right_button_url ); ?>" title="<?php echo esc_attr( $general_right_button_text ); ?>"><?php echo esc_html( $general_right_button_text ); ?></a>
						<div class="out-right dark-gray">
						</div><!--/.out-right.dark-gray-->
					<?php endif; ?>
				</div><!--/.section-head.dark-gray-background-->
				<?php
				$post_query_args = array (
					'post_type'					=> array( 'post' ),
					'nopaging'					=> false,
					'posts_per_page'			=> 3,
					'ignore_sticky_posts'		=> true,
					'cache_results'				=> true,
					'update_post_meta_cache'	=> true,
					'update_post_term_cache'	=> true
				);
				?>
				<?php $post_query = new WP_Query( $post_query_args ); ?>
				<?php if( $post_query->have_posts() ): ?>
					<div class="details-blog clearfix">
						<?php while( $post_query->have_posts() ): ?>
							<?php $post_query->the_post(); ?>
							<div class="blog-post">
								<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'kira-lite-front-page-blog' ); ?>
								<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="post-image" title="<?php echo esc_attr( get_the_title() ); ?>" style="background-image: url('<?php if( $post_thumbnail ): echo esc_url( $post_thumbnail[0] ); endif; ?>');"></a>
								<div class="post-content">
									<?php printf( '<time datetime="%s-%s-%s">%s %s, %s</time>', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ), get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ); ?>
									<a class="post-title" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
								</div><!--/.post-content-->
							</div><!--/.blog-post-->
						<?php endwhile; ?>
						<div class="out-right dark-dark-gray">
						</div><!--/.out-right.dark-dark-gray-->
					</div><!--/.details-blog.clearfix-->
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div><!--/.col-sm-6-->
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/.index-details-->