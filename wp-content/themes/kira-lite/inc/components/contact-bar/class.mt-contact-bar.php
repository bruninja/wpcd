<?php
/**
 * Class MTL_Contact_Bar_Output
 *
 * This file does the handling of the contact bar displayed above the header
 *
 * @author		Cristian Raiber
 * @copyright	(c) Copyright by Macho Themes
 * @link		http://www.machothemes.com
 * @package 	Muscle Core Lite (prefix: MTL)
 * @since		Version 1.0.1
 */


if( !function_exists('MTL_CallContactBarClass' ) ) {
    /**
     *
     */
    function MTL_CallContactBarClass()
    {
        // instantiate the class & load everything else
        MTL_Contact_Bar_Output::getInstance();
    }
    add_action( 'wp_loaded', 'MTL_CallContactBarClass' );
}



if( !class_exists( 'MTL_Contact_Bar_Output' ) ) {

    class MTL_Contact_Bar_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct()
        {

            // quickly fetch some vars
            $this->facebook_url = get_theme_mod( 'kira_lite_contact_bar_facebook_url', esc_url( '#' ) );
            $this->twitter_url = get_theme_mod( 'kira_lite_contact_bar_twitter_url', esc_url( '#' ) );
            $this->youtube_url = get_theme_mod( 'kira_lite_contact_bar_youtube_url', esc_url( '#' ) );
            $this->pinterest_url = get_theme_mod( 'kira_lite_contact_bar_pinterest_url', esc_url( '#' ) );
            $this->linkedin_url = get_theme_mod( 'kira_lite_contact_bar_linkedin_url', esc_url( '#' ) );
            $this->instagram_url = get_theme_mod( 'kira_lite_contact_bar_instagram_url', esc_url( '#' ) );
            $this->email_addr = get_theme_mod( 'kira_lite_email', 'contact@site.com' );
            $this->phone_number = get_theme_mod( 'kira_lite_phone', '(555)555-5555' );

            // add the action hook to generate the HTML output
            add_action( 'mtl_before_header', array( $this, 'top_header_output' ), 1 );
            add_action( 'mtl_social_footer', array( $this, 'social_links_list_output' ), 1 );
            add_action( 'wp_footer', array( $this, 'search_form_output') );
        }

        /**
         * Returns the *Singleton* instance of this class.
         *
         * @return Singleton The *Singleton* instance.
         */
        public static function getInstance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        public function social_links_list_output() {
            $output = '<ul class="social-links-list">';
                if( $this->facebook_url ) {
                    $output .= '<li><a href="'. esc_url( $this->facebook_url ) .'" title="'. __( 'Facebook', 'kira-lite' ) .'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                }

                if( $this->twitter_url ) {
                    $output .= '<li><a href="'. esc_url( $this->twitter_url ) .'" title="'. __( 'Twitter', 'kira-lite' ) .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                }

                if( $this->youtube_url ) {
                    $output .= '<li><a href="'. esc_url( $this->youtube_url ) .'" title="'. __( 'YouTube', 'kira-lite' ) .'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
                }

                if( $this->pinterest_url ) {
                    $output .= '<li><a href="'. esc_url( $this->pinterest_url ) .'" title="'. __( 'Pinterest', 'kira-lite' ) .'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
                }

                if( $this->linkedin_url ) {
                    $output .= '<li><a href="'. esc_url( $this->linkedin_url ) .'" title="'. __( 'LinkedIn', 'kira-lite' ) .'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                }

                if( $this->instagram_url ) {
                    $output .= '<li><a href="'. esc_url( $this->instagram_url ) .'" title="'. __( 'Instagram', 'kira-lite' ) .'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
                }
            $output .= '</ul><!--/.social-links-list-->';

            echo $output;
        }

        public function top_header_output() {
            $output = '<div class="top-header">';
                $output .= '<div class="container-fluid">';
                    $output .= '<div class="row">';
                        $output .= '<div class="col-sm-12">';
                            $output .= '<ul class="social-links-list">';
                                if( $this->twitter_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->twitter_url ) .'" title="'. __( 'Twitter', 'kira-lite' ) .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                                }

                                if( $this->facebook_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->facebook_url ) .'" title="'. __( 'Facebook', 'kira-lite' ) .'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                                }

                                if( $this->youtube_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->youtube_url ) .'" title="'. __( 'YouTube', 'kira-lite' ) .'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
                                }

                                if( $this->pinterest_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->pinterest_url ) .'" title="'. __( 'Pinterest', 'kira-lite' ) .'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
                                }

                                if( $this->linkedin_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->linkedin_url ) .'" title="'. __( 'LinkedIn', 'kira-lite' ) .'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                                }

                                if( $this->instagram_url ) {
                                    $output .= '<li><a href="'. esc_url( $this->instagram_url ) .'" title="'. __( 'Instagram', 'kira-lite' ) .'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
                                }
                            $output .= '</ul><!--/.social-links-list-->';
                            $output .= '<ul class="top-header-contact">';
                                $output .= '<li><a href="#" title="'. __( 'Search', 'kira-lite' ) .'"><i class="fa fa-search"></i></a></li>';

                                if( $this->phone_number ) {
                                    $output .= '<li data-customizer="top-header-contact-phone"><a href="tel:'. esc_attr( $this->phone_number ) .'" title="'. esc_attr( $this->phone_number ) .'">'. esc_html( $this->phone_number ) .'</a></li>';
                                }

                                if( $this->email_addr ) {
                                    $output .= '<li data-customizer="top-header-contact-email-address"><a href="mailto:'. esc_attr( $this->email_addr ) .'" title="'. esc_attr( $this->email_addr ) .'">'. esc_html( $this->email_addr ) .'</a></li>';
                                }
                            $output .= '</ul><!--/.top-header-contact-->';
                        $output .= '</div><!--/.col-sm-12-->';
                    $output .= '</div><!--/.row-->';
                $output .= '</div><!--/.container-fluid-->';
            $output .= '</div><!--/.top-header-->';

            echo $output;
        }

        public function search_form_output() {
            $output = '<div class="search-modal">';
                $output .= '<div class="modal-box">';
                    $output .= '<button class="close-modal"><i class="fa fa-times"></i></button>';
                    $output .= '<div class="modal-box-title">'. __( 'Search', 'kira-lite' ) .'</div>';
                    $output .= '<div class="modal-box-content">';
                        $output .= get_search_form( false );
                    $output .= '</div><!--/.modal-box-content-->';
                $output .= '</div><!--/.modal-box-->';
            $output .= '</div><!--/.search-modal-->';

            echo $output;
        }

        /**
         * Private clone method to prevent cloning of the instance of the
         * *Singleton* instance.
         *
         * @return void
         */
        private function __clone()
        {
        }

        /**
         * Private unserialize method to prevent unserializing of the *Singleton*
         * instance.
         *
         * @return void
         */
        private function __wakeup()
        {
        }

    }
}