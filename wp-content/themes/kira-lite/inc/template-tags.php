<?php
/**
 *  The Archive Title
 */
if ( ! function_exists( 'kira_lite_the_archive_title' ) ) {
    /**
     * Shim for 'kira_lite_the_archive_title()'.
     *
     * Display the archive title based on the queried object.
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after Optional. Content to append to the title. Default empty.
     */
    function kira_lite_the_archive_title($before = '', $after = '')
    {
        if (is_category()) {
            $title = sprintf(esc_html__('Category: %s', 'kira-lite'), single_cat_title('', false));
        } elseif (is_tag()) {
            $title = sprintf(esc_html__('Tag: %s', 'kira-lite'), single_tag_title('', false));
        } elseif (is_author()) {
            $title = sprintf(esc_html__('Author: %s', 'kira-lite'), '<span class="vcard">' . get_the_author() . '</span>');
        } elseif (is_year()) {
            $title = sprintf(esc_html__('Year: %s', 'kira-lite'), get_the_date(esc_html_x('Y', 'yearly archives date format', 'kira-lite')));
        } elseif (is_month()) {
            $title = sprintf(esc_html__('Month: %s', 'kira-lite'), get_the_date(esc_html_x('F Y', 'monthly archives date format', 'kira-lite')));
        } elseif (is_day()) {
            $title = sprintf(esc_html__('Day: %s', 'kira-lite'), get_the_date(esc_html_x('F j, Y', 'daily archives date format', 'kira-lite')));
        } elseif (is_tax('post_format')) {
            if (is_tax('post_format', 'post-format-aside')) {
                $title = esc_html_x('Asides', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-gallery')) {
                $title = esc_html_x('Galleries', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-image')) {
                $title = esc_html_x('Images', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-video')) {
                $title = esc_html_x('Videos', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-quote')) {
                $title = esc_html_x('Quotes', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-link')) {
                $title = esc_html_x('Links', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-status')) {
                $title = esc_html_x('Statuses', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-audio')) {
                $title = esc_html_x('Audio', 'post format archive title', 'kira-lite');
            } elseif (is_tax('post_format', 'post-format-chat')) {
                $title = esc_html_x('Chats', 'post format archive title', 'kira-lite');
            }
        } elseif (is_post_type_archive()) {
            $title = sprintf(esc_html__('Archives: %s', 'kira-lite'), post_type_archive_title('', false));
        } elseif (is_tax()) {
            $tax = get_taxonomy(get_queried_object()->taxonomy);
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf(esc_html__('%1$s: %2$s', 'kira-lite'), $tax->labels->singular_name, single_term_title('', false));
        } else {
            $title = esc_html__('Archives', 'kira-lite');
        }

        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters('get_the_archive_title', $title);

        if (!empty($title)) {
            echo $before . $title . $after;  // WPCS: XSS OK.
        }
    }
}

/**
 *  The Archive Description
 */
if ( ! function_exists( 'kira_lite_the_archive_description' ) ) {
    /**
     * Shim for 'kira_lite_the_archive_description()'.
     *
     * Display category, tag, or term description.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     * @param string $before Optional. Content to prepend to the description. Default empty.
     * @param string $after Optional. Content to append to the description. Default empty.
     */
    function kira_lite_the_archive_description($before = '', $after = '')
    {
        $description = apply_filters('get_the_archive_description', term_description());

        if ( !empty( $description ) ) {
            /**
             * Filter the archive description.
             *
             * @see term_description()
             *
             * @param string $description Archive description to be displayed.
             */
            echo $before . $description . $after;  // WPCS: XSS OK.
        }
    }
}