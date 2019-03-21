<?php
//
//
//
add_action('pre_get_posts', 'query_add_filter' );
function query_add_filter( $wp_query ) {
    if( is_admin()) {
        add_filter('views_edit-post', 'Add_My_filter');
    }
}

function Add_My_filter($views) {
    global $wp_query, $wpdb;
    global $post;
    unset($views['mine']);
    $this_year = date('Y');
    $this_month = date('m')-3;
    if($this_month<=0){
        $this_year = $this_year - 1;
        $this_month = 12 + $this_month;
    }
    $this_month = sprintf("%02d", $this_month);

    //
    //
//    $test = mysql2date('Ym', $post->post_date);
//    $modified = mysql2date('Ym', $post->post_modified);
//    $rewrite = 11;
//    var_dump($test-$rewrite);
//    $test = $test-$rewrite;
    //
    //

    $query = array(
        'post_type'   => 'post',
        'post_status' => 'publish',
        'm'         => $this_year.$this_month
    );
    $result = new WP_Query($query);

    $class = ($wp_query->query_vars['m'] != null) ? 'class="current"' : '';
    $views['publish_f'] = sprintf(__('<a href="%s"'.$class.'>3ヶ月前の投稿<span class="count">(%d)</span></a>', '3ヶ月前の投稿'),
        admin_url('edit.php?post_status=publish&post_type=post&m='.$this_year.$this_month),
        $result->found_posts);

    //ゴミ箱を一番うしろに表示する
    if ( isset($views['trash']) ) {
        $trash = $views['trash'];
        unset($views['trash']);
        $views['trash'] = $trash;
    }
    return $views;
}
?>