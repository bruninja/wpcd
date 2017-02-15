<?php
class Kira_Lite_Widget_Member extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'kira_lite_member', __( '[MT] - Member', 'kira-lite' ), array( 'description' => __( 'Add this widget in team section from front page.', 'kira-lite' ), ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    /**
     *  Enqueue Scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'kira_lite_widget_upload_image', get_template_directory_uri() . '/layout/js/plugins/widget-upload-image/widget-upload-image.min.js', false, '1.0', true);
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

        $image = !empty( $instance['image'] ) ? esc_url( $instance['image'] ) : '';
        $name = !empty( $instance['name'] ) ? sanitize_text_field( $instance['name'] ) : '';
        $position = !empty( $instance['position'] ) ? sanitize_text_field( $instance['position'] ) : '';
        $twitter_url = !empty( $instance['twitter_url'] ) ? esc_url( $instance['twitter_url'] ) : '';
        $facebook_url = !empty( $instance['facebook_url'] ) ? esc_url( $instance['facebook_url'] ) : '';
        $github_url = !empty( $instance['github_url'] ) ? esc_url( $instance['github_url'] ) : '';
        $email = !empty( $instance['email'] ) ? sanitize_email( $instance['email'] ) : '';

        $image_id = kira_lite_get_image_id_from_image_url( $image );
        $get_attachment_image_src = wp_get_attachment_image_src( $image_id, 'kira-lite-front-page-member' );

        $output = '';

        $output .= '<div class="person">';
            $output .= '<div class="person-image" style="background-image: url('. ( $image_id ? esc_url( $get_attachment_image_src[0] ) : esc_url( get_template_directory_uri() . $image ) ) .');"></div>';
            $output .= '<h3 class="medium person-title">'. $name .'</h3>';
            $output .= '<p>'. $position .'</p>';
            $output .= '<ul class="social-links-list">';
                $output .= !empty( $twitter_url ) ? '<li><a href="'. $twitter_url .'" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>' : '';
                $output .= !empty( $facebook_url ) ? '<li><a href="'. $facebook_url .'" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>' : '';
                $output .= !empty( $github_url ) ? '<li><a href="'. $github_url .'" title="GitHub" target="_blank"><i class="fa fa-github"></i></a></li>' : '';
                $output .= !empty( $email ) ? '<li><a href="mailto:'. $email .'" title="Mail" target="_blank"><i class="fa fa-envelope"></i></a></li>' : '';
            $output .= '</ul><!--/.social-links-list-->';
        $output .= '</div><!--/.person-->';

        echo $output;

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
        $image = !empty( $instance['image'] ) ?  esc_url( $instance['image'] ) : '';
        $name = !empty( $instance['name'] ) ? sanitize_text_field( $instance['name'] ) : '';
        $position = !empty( $instance['position'] ) ? sanitize_text_field( $instance['position'] ) : '';
        $twitter_url = !empty( $instance['twitter_url'] ) ? esc_url( $instance['twitter_url'] ) : '';
        $facebook_url = !empty( $instance['facebook_url'] ) ? esc_url( $instance['facebook_url'] ) : '';
        $github_url = !empty( $instance['github_url'] ) ? esc_url( $instance['github_url']  ) : '';
        $email = !empty( $instance['email'] ) ? sanitize_email( $instance['email']  ) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('image'); ?>"><?php _e( 'Image:', 'kira-lite' ); ?></label>
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php if( !empty($instance['image']) ): echo esc_url( $instance['image'] ); endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" name="<?php echo $this->get_field_name('image'); ?>" value="<?php _e( 'Upload Image','kira-lite' ); ?>" style="margin-top: 5px;">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( 'Position:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'position' ); ?>" name="<?php echo $this->get_field_name( 'position' ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter URL:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook URL:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'github_url' ); ?>"><?php _e( 'GitHub URL:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'github_url' ); ?>" name="<?php echo $this->get_field_name( 'github_url' ); ?>" type="text" value="<?php echo esc_attr( $github_url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'E-mail:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
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
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['name'] = !empty( $new_instance['name'] ) ? sanitize_text_field( $new_instance['name'] ) : '';
        $instance['position'] = !empty( $new_instance['position'] ) ? sanitize_text_field( $new_instance['position'] ) : '';
        $instance['twitter_url'] = !empty( $new_instance['twitter_url'] ) ? esc_url( $new_instance['twitter_url'] ) : '';
        $instance['facebook_url'] = !empty( $new_instance['facebook_url'] ) ? esc_url( $new_instance['facebook_url'] ) : '';
        $instance['github_url'] = !empty( $new_instance['github_url'] ) ? esc_url( $new_instance['github_url'] ) : '';
        $instance['email'] = !empty( $new_instance['email'] ) ? sanitize_email( $new_instance['email'] ) : '';

        return $instance;
    }
}

function kira_lite_register_widget_member () {
    register_widget( 'Kira_Lite_Widget_Member' );
}
add_action( 'widgets_init', 'kira_lite_register_widget_member' );
?>