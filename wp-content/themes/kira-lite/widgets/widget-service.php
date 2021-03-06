<?php
class Kira_Lite_Widget_Service extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct( 'kira_lite_service', __( '[MT] - Service', 'kira-lite' ), array( 'description' => __( 'Add this widget in services section from front page.', 'kira-lite' ), ) );

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

        $url = !empty( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
        $image = !empty( $instance['image'] ) ?  esc_url( $instance['image'] ) : '';
        $title = !empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $entry = !empty( $instance['entry'] ) ? sanitize_text_field( $instance['entry']  ) : '';

        $image_id = kira_lite_get_image_id_from_image_url( $image );
        $get_attachment_image_src = wp_get_attachment_image_src( $image_id, 'kira-lite-front-page-services' );

        $output = '';

        $output .= '<a class="service" href="'. $url .'" title="'. $title .'">';
            $output .= '<div class="service-icon" style="background-image: url('. ( $image_id ? esc_url( $get_attachment_image_src[0] ) : esc_url( get_template_directory_uri() . $image ) ) .');"></div>';
            $output .= '<h3 class="medium service-title">'. $title .'</h3>';
            $output .= '<p class="service-paragraph">'. $entry .'</p>';
        $output .= '</a><!--/.service-->';

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
        $url = !empty( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
        $image = !empty( $instance['image'] ) ?  esc_url( $instance['image'] ) : '';
        $title = !empty( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : '';
        $entry = !empty( $instance['entry'] ) ? sanitize_text_field( $instance['entry'] ) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('image'); ?>"><?php _e( 'Image:', 'kira-lite' ); ?></label>
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php if( !empty($instance['image']) ): echo esc_url( $instance['image'] ); endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button_service" name="<?php echo $this->get_field_name('image'); ?>" value="<?php _e( 'Upload Image','kira-lite' ); ?>" style="margin-top: 5px;">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kira-lite' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'entry' ); ?>"><?php _e( 'Entry:', 'kira-lite' ); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'entry' ); ?>" id="<?php echo $this->get_field_id( 'entry' ); ?>"><?php echo htmlspecialchars_decode( $entry ); ?></textarea>
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
        $instance['url'] = !empty( $new_instance['url'] ) ? esc_url( $new_instance['url'] ) : '';
        $instance['image'] = !empty( $new_instance['image'] ) ? esc_url( $new_instance['image'] ) : '';
        $instance['title'] = !empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['entry'] = !empty( $new_instance['entry'] ) ? sanitize_text_field( $new_instance['entry'] ) : '';

        return $instance;
    }
}

function kira_lite_register_widget_service () {
    register_widget( 'Kira_Lite_Widget_Service' );
}
add_action( 'widgets_init', 'kira_lite_register_widget_service' );
?>