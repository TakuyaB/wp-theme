<?php

     function register_hooks() {
        foreach ( $this->get_post_types() as $post_type ) {
            add_filter( 'views_edit-' . $post_type, array( $this, 'add_filter_link' ) );
        }

        add_filter( 'posts_where', array( $this, 'filter_posts' ) );
    }

     function add_filter_link( array $views ) {

        $cornerstone_url = $this->get_cornerstone_url();

        $views['yoast_cornerstone'] = sprintf(
            '<a href="%1$s" class="%2$s">%3$s</a> (%4$s)',
            esc_url( $cornerstone_url ),
            ( $this->is_cornerstone_filter_active() ) ? 'current' : '',
            __( 'Cornerstone articles', 'wordpress-seo' ),
            $this->get_cornerstone_total()
        );

        return $views;
    }

     function filter_posts( $where ) {
        if ( $this->is_cornerstone_filter_active() ) {
            global $wpdb;

            $where .= sprintf(
                ' AND ' . $wpdb->posts . '.ID IN( SELECT post_id FROM ' . $wpdb->postmeta . ' WHERE meta_key = "%s" AND meta_value = "1" ) ',
                WPSEO_Cornerstone::META_NAME
            );
        }

        return $where;
    }

     function get_cornerstone_url() {
        $cornerstone_url = remove_query_arg( array( 'post_status' ) );
        $cornerstone_url = add_query_arg( self::FILTER_QUERY_ARG, '1', $cornerstone_url );

        return $cornerstone_url;
    }

     function get_cornerstone_total() {
        global $wpdb;

        return (int) $wpdb->get_var(
            $wpdb->prepare( '
				SELECT COUNT( 1 )
				FROM ' . $wpdb->postmeta . '
				WHERE post_id IN( SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "%s" ) && 
				meta_value = "1" AND meta_key = "%s"
				',
                $this->get_current_post_type(),
                WPSEO_Cornerstone::META_NAME
            )
        );
    }

     function is_cornerstone_filter_active() {
        return ( filter_input( INPUT_GET, self::FILTER_QUERY_ARG ) === '1' );
    }


     function get_current_post_type() {
        return filter_input(
            INPUT_GET, 'post_type', FILTER_DEFAULT, array(
                'options' => array( 'default' => 'post' ),
            )
        );
    }

    protected function get_post_types() {
        return array( 'post', 'page' );
    }
?>
