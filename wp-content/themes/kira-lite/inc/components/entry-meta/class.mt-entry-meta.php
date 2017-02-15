<?php


/**
 *
 *
 * @since   1.0.0
 *
 */
if(!function_exists('MTL_CallEntryMetaClass')) {
    /**
     *
     */
    function MTL_CallEntryMetaClass()
    {

        // instantiate the class & load everything else
        MTL_Entry_Meta_Output::getInstance();

    }
    add_action('wp_loaded', 'MTL_CallEntryMetaClass');
}



if( !class_exists( 'MTL_Entry_Meta_Output' ) ) {

    class MTL_Entry_Meta_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct() {
            add_action( 'mtl_single_entry_meta', array( $this, 'single_entry_meta_output' ), 1 );
            add_action( 'mtl_archive_meta_content', array( $this, 'archive_entry_meta_output' ), 1 );
            add_action( 'mtl_single_content_tags', array( $this, 'single_content_tags' ), 1 );
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
         *  Prints HTML with meta information for the current post-date/time and author on single post.
         */
        public function single_entry_meta_output() {
            global $post;

            $categories_list = get_the_category_list( esc_html__( ', ', 'kira-lite' ) );
            $number_comments = get_comments_number();

            $display_post_posted_on_meta = get_theme_mod( 'kira_lite_enable_post_posted_on_blog_posts', 1 );
            $display_category_post_meta = get_theme_mod( 'kira_lite_enable_post_category_blog_posts', 1 );
            $display_number_comments = get_theme_mod( 'kira_lite_enable_post_comments_blog_posts', 1 );

            if( $display_post_posted_on_meta == 1 ) {
                $output = '';

                $output .= '<div class="content-meta">';
                    $output .= '<time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'"><span>'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ) .'</span></time>';
                    $output .= '<a class="meta-author" href="'. esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) .'" title="'. esc_attr( get_the_author() ) .'">'. esc_html( get_the_author() ) .'</a>';
                    $output .= ( $display_category_post_meta == 1 ) ? '<div class="meta-categories">'. $categories_list .'</div>' : '';
                    $output .= ( $display_number_comments == 1 ) ? ( comments_open() ) ? ( $number_comments == 0 ) ? sprintf( '<span class="meta-comments">'. __( 'No comments', 'kira-lite' ) .'</span>' ) : ( $number_comments > 1 ) ? sprintf( '<a class="meta-comments" href="%s" title="%s '. __( 'comments', 'kira-lite' ) .'">%s '. __( 'comments', 'kira-lite' ) .'</a>', get_comments_link(), $number_comments, $number_comments ) : sprintf( '<a class="meta-comments" href="%s" title="'. __( '1 comment', 'kira-lite' ) .'">'. __( '1 comment', 'kira-lite' ) .'</a>', get_comments_link() ) : sprintf( '' /* '<span class="meta-comments">'. __( 'Comments are off for this post', 'kira-lite' ) .'</span>' */ ) : '';
                $output .= '</div><!--/.content-meta-->';

                echo $output;
            }
        }

        /**
         *  Prints HTML with meta information for the current post-date/time and author on archive.
         */
        public function archive_entry_meta_output() {
            global $post;

            $post_standard_enable_author = get_theme_mod( 'kira_lite_post_standard_enable_author', 1 );

            $output = '';

            $output .= '<div class="meta-left">';
                $output .= ( $post_standard_enable_author == 1 ) ? get_avatar( get_the_author_meta( 'ID' ), 60 ) : '';
                $output .= '<div class="meta-left-details">';
                    $output .= ( $post_standard_enable_author == 1 ) ? '<a href="'. esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) .'" title="'. esc_attr( get_the_author() ) .'">'. esc_html( get_the_author() ) .'</a>' : '';
                    $output .= '<time datetime="'. sprintf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ) .'"><span>'. sprintf( '%s %s, %s', get_the_date( 'F' ), get_the_date( 'd' ), get_the_date( 'Y' ) ) .'</span></time>';
                $output .= '</div><!--/.meta-left-details-->';
            $output .= '</div><!--/.meta-left-->';

            echo $output;
        }

        /**
         *  Prints HTML with tags on single post.
         */
        public function single_content_tags() {
            $display_tags_post_meta  = get_theme_mod( 'kira_lite_enable_post_tags_blog_posts', 1 );

            $output = '';

            if( $display_tags_post_meta == 1 ) {
                if( get_the_tag_list() ) {
                    $output .= '<ul class="meta-left-tags clearfix">';
                        $output .= '<li>'. __( 'Tags:', 'kira-lite' ) .'</li>';
                        $output .= get_the_tag_list( '<li>','</li><li>','</li>' );
                    $output .= '</ul><!--/.leta-left-tags.clearfix-->';
                }
            }

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