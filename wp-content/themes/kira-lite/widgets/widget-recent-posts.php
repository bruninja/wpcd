<?php
class Kira_Lite_Widget_Recent_Posts extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'kira_lite_recent_posts', __( '[MT] - Recent Posts', 'kira-lite' ), array( 'description' => __( 'Custom recent posts with post thumbnail.', 'kira-lite' ), ) );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $numberofposts = !empty( $instance['numberofposts'] ) ? sanitize_text_field( $instance['numberofposts'] ) : '';

        $post_query_args = array (
            'post_type'              => array( 'post' ),
            'pagination'             => false,
            'posts_per_page'         => $numberofposts,
            'ignore_sticky_posts'    => true,
            'cache_results'          => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => true,
        );

        $post_query = new WP_Query( $post_query_args );

        if( $post_query->have_posts() ) {
        	while( $post_query->have_posts() ) {
        		$post_query->the_post();

                global $post;
        		$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'kira-lite-widget-recent-posts' );

        		$output = '<div id="post-'. get_the_ID() .'" class="'. join( ' ', get_post_class( 'widget-recent-post clearfix' ) ) .'">';
        			if( $post_thumbnail ) {
        				$output .= '<div class="recent-post-image" style="background-image: url('. esc_url( $post_thumbnail[0] ) .');"></div>';
        			}
        			$output .= '<div class="recent-post-right">';
        				$output .= '<a class="post-right-title" href="'. esc_url( get_the_permalink() ) .'" title="'. esc_attr( get_the_title() ) .'">'. esc_html( get_the_title() ) .'</a>';
        				$output .= '<time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'">'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'm' ), get_the_date( 'Y' ) ) .'</time>';
        			$output .= '</div><!--/.recent-post-right-->';
        		$output .= '</div><!--/.widget-recent-post.clearfix-->';

        		echo $output;
        	}
        } else {
        	 echo __( 'No posts found.', 'kira-lite' );
        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : __( '[MT] - Recent Posts', 'kira-lite' );
        $numberofposts = !empty( $instance['numberofposts'] ) ? sanitize_text_field( $instance['numberofposts'] ) : __( '5', 'kira-lite' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'numberofposts' ); ?>"><?php _e( 'Number of posts:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'numberofposts' ); ?>" name="<?php echo $this->get_field_name( 'numberofposts' ); ?>" type="text" value="<?php echo esc_attr( $numberofposts ); ?>">
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['numberofposts'] = ( !empty( $new_instance['numberofposts'] ) ? sanitize_text_field( $new_instance['numberofposts'] ) : '' );

        return $instance;
    }

}

function kira_lite_register_widget_recent_posts () {
    register_widget( 'Kira_Lite_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'kira_lite_register_widget_recent_posts' );
?>