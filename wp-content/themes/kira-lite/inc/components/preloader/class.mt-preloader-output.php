<?php

/**
 * Class that handles the preloader style output
 *
 * @since   1.0.0
 *
 */


// @todo: add more preloader styles

if(!function_exists('MTL_CallPreloaderClass')) {
    /**
     *
     */
    function MTL_CallPreloaderClass()
    {

        // instantiate the class & load everything else
        MTL_Preloader_Output::getInstance();

    }
    add_action('wp_loaded', 'MTL_CallPreloaderClass');
}

if(!class_exists('MTL_Preloader_Output')) {
    /**
     * Class MTL_Preloader_Output
     */
    class MTL_Preloader_Output
    {


        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct()
        {
            //var setting
            $this->preloader_is_enabled = get_theme_mod('kira_lite_enable_site_preloader', 1);
            $this->preloader_text = get_theme_mod('kira_lite_preloader_text', __('Loading', 'kira-lite'));
            $this->preloader_bg_color = get_theme_mod('kira_lite_preloader_bg_color', '#FFF');
            $this->preloader_text_color = get_theme_mod('kira_lite_preloader_text_color', '#000');

            // Hooks
            add_action('mtl_site_preloader', array($this, 'preloader_markup_output'), 1);
            add_action('wp_enqueue_scripts', array($this, 'preloader_style_output'), 99);
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


        /**
         *  Output preloader HTML mark-up
         */
        function preloader_markup_output() {
            global $wp_customize;

            if( !isset($wp_customize) && $this->preloader_is_enabled == 1 ) {
                $output = '';

                $output .= '<div id="page-loader">';
                    $output .= '<div class="page-loader-inner">';
                        $output .= '<div class="loader">';
                            $output .= '<strong>'. esc_html( $this->preloader_text ) .'</strong>';
                        $output .= '</div><!--/.loader-->';
                    $output .= '</div><!--/.page-loader-inner-->';
                $output .= '</div><!--/#page-loader-->';

                echo $output;
            }
        }

        /**
         * Output preloader CSS
         *
         * Hooked to wp_head
         */
        function preloader_style_output()
        {

            if ($this->preloader_is_enabled == 1) {
                add_filter('body_class', array($this, 'preloader_body_class'));
                add_action('wp_head', array($this, 'preloader_style_minimal'));
            }

        } // preloader_style_output


        /**
         * Add custom body class to give some more weight to our styles.
         *
         * @since  1.0.0
         * @access public
         * @param  array $classes
         * @return array
         */
        function preloader_body_class($classes)
        {
            return array_merge($classes, array('mt-preloader'));

        } //preloader_body_class

        function preloader_style_minimal() {
            $output = '';

            $output .= '<style type="text/css">';
                $output .= ( $this->preloader_bg_color ) ? '#page-loader {background-color: '. esc_html( $this->preloader_bg_color ) .';}' : '';
                $output .= ( $this->preloader_text_color ) ? '#page-loader .loader {color: '. esc_html( $this->preloader_text_color ) .';}' : '';
            $output .= '</style>';

            echo $output;
        }
    } // actual class
} // class exists
