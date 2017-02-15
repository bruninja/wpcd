<?php
/**
 *	Custom functions that act independently of the theme templates.
 *
 *	Eventually, some of the functionality here could be replaced by core features.
 *
 *	@package WordPress
 *	@subpackage kira-lite
 */

/**
 *	Adds custom classes to the array of body classes.
 *
 *	@param array $classes Classes for the body element.
 *	@return array
 */
function kira_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'kira_lite_body_classes' );

/**
 *  Render the breadcrumbs with help of class-breadcrumbs.php
 */
add_action( 'mtl_breadcrumbs', 'kira_lite_breadcrumbs' );
function kira_lite_breadcrumbs() {
    $breadcrumbs = new Kira_Lite_Breadcrumbs();
    $breadcrumbs->get_breadcrumbs();
}

/**
 *  Display navigation to next/previous pages when applicable
 */
add_action( 'mtl_single_after_content', 'kira_lite_content_navigation' );
function kira_lite_content_navigation()
{
    global $wp_query, $post;

    // Don't print empty markup on single pages if there's nowhere to navigate.
    if (is_single()) {
        $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous)
            return;
    }

    // Don't print empty markup in archives if there's only one page.
    if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search()))
        return;

    $nav_class = (is_single()) ? 'single-pagination clearfix hidden-xs' : 'paging-navigation clear';
    ?>
    <nav role="navigation" id="post-navigation" class="<?php echo $nav_class; ?>">
        <?php if (is_single()) : // navigation links for single posts ?>

            <?php previous_post_link('%link', '<span class="nc-icon-glyph arrows-1_bold-left"></span> %title'); ?>
            <?php next_post_link('%link', '%title <span class="nc-icon-glyph arrows-1_bold-right"></span>'); ?>

        <?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages ?>

            <?php if (get_next_posts_link()) : ?>
                <?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'kira-lite')); ?>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'kira-lite')); ?>
            <?php endif; ?>

        <?php endif; ?>
    </nav><!-- #post-navigation -->
    <?php
}

/**
 *  Comment
 */
function kira_lite_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'kira-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'kira-lite' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="row">
                <div class="col-sm-1 clearfix">
                    <div class="comment-gravatar">
                        <?php echo get_avatar( $comment, 67 ); ?>
                    </div><!--/.comment-gravatar-->
                </div><!--/.col-sm-1-->
                <div class="col-sm-11">
                    <?php printf( __( '%s', 'kira-lite' ), sprintf( '%s', get_comment_author_link() ) ); ?>
                    <time class="comment-time" datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php printf( __( '%1$s at %2$s', 'kira-lite' ), get_comment_date(), get_comment_time() ); ?></time>
                    <div class="comment-entry markup-format">
                        <?php comment_text(); ?>
                        <?php
                        if(  $comment->comment_approved == '0' ):
                            _e( 'Your comment is awaiting moderation.', 'kira-lite' );
                        endif;
                        ?>
                    </div><!--/.comment-entry.markup-format-->
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!--/.col-sm-11-->
            </div><!--/.row-->
        </div><!--/#comment-<?php comment_ID(); ?>.row-->
    <?php
            break;
    endswitch;
}

/**
 *  Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'kira_lite_move_comment_field_to_bottom' );
function kira_lite_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

/**
 *  Upsell Notice 
 */
add_action('customize_controls_enqueue_scripts', 'kira_lite_upsell_notice');
function kira_lite_upsell_notice() {
    // Enqueue the script
    wp_enqueue_script( 'kira-lite-customizer-upsell', get_template_directory_uri() . '/inc/customizer/assets/js/upsell/upsell.js', array(), '1.0.1', true );

    // Localize the script
    wp_localize_script(
        'kira-lite-customizer-upsell',
        'prefixL10n',
        array(
            # Upsell URL
            /*
            'prefixUpsellURL' => esc_url(' http://www.machothemes.com/themes/pixova/' ),
            'prefixUpsellLabel' => __( 'View PRO version', 'kira-lite'),
            */

            # Documentation URLs
            //'prefixDocURL' => esc_url( 'http://docs.machothemes.com/category/109-kira-lite' ),
            //'prefixDocLabel' => __( 'Theme Documentation', 'kira-lite' ),
        )
    );
}

/**
 *  Get image ID from Image URL
 */
function kira_lite_get_image_id_from_image_url( $image_url ) {
    global $wpdb;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

    if( $attachment ) {
        return $attachment[0];
    }
}