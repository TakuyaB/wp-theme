<?php
include(dirname(__FILE__).'/editor-style.php');
//require_once ('editor-style.php');
require_once ('shortcode.php');
require_once ('rewrite-candidate.php');

//臨時カスタムここまで
//
//ウィジェット
register_sidebar();

function mymenu_cat( $src ) {
    $src = preg_replace( '/<\/a> \((\d+)\)/', ' ($1)</a>', $src );
    return $src;
}
add_filter( 'wp_list_categories', 'mymenu_cat' );

function mymenu_month( $src ) {
    $src = preg_replace( '/<\/a>&nbsp;\((\d+)\)/', ' ($1)</a>', $src );
    return $src;
}
add_filter( 'get_archives_link', 'mymenu_month' );

//カスタムメニュー
register_nav_menu( 'navigation', 'ナビゲーションメニュー' );

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );

//作りたい大きさのサムネイルをwordpress側に作ってもらう関数
add_image_size('thumb200',200,200,true);
add_image_size('thumb100',100,100,true);
add_image_size('archive_thumb',300,200,true);
add_image_size('post_medium1',640,480,true);

//--------------------------
// RSS:記事内の画像を取ってくる
//--------------------------
function get_the_content_image($postid = null) {
    global $post;
    $first_img = '';

    if(is_null($postid)){
        $p = get_post($postid);
    }else{
        $p = $post;
    }

    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $p->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img = "images/no-image.png";
    }
    return $first_img;
}
//----------------------
// RSSの先頭にimgを挿入
//----------------------
function rss_post_thumbnail($content) {
    global $post;

    $s_img = get_the_content_image();
    $content = "<p><img src='" .$s_img. "'/></p>" . $content;

    return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


//概要（抜粋）の省略文字
function my_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'my_excerpt_more');

//-----------------------------------------
//　記事内@TB_IQ：Twitterリンクを自動で貼る
//-----------------------------------------
function add_twitter_link($content) {
    $pattern= '/(?<=^|(?<=[^a-zA-Z0-9-_\.]))@([A-Za-z]+[A-Za-z0-9_]+)/i';
    $replace= '@<a href="http://www.twitter.com/$1">$1</a>';
    $content= preg_replace($pattern, $replace, $content);
    return $content;
}

add_filter( "the_content", "add_twitter_link" );

add_image_size( 'medium' , 640, 480);



//パブリサイズ共有:カスタムメッセージ強制編集
function set_title_publicize () {
    global $post;
    $publicize_custom_message = sprintf( '【投稿しました！】%s＞＞＞今すぐCheck！！＞＞＞｜ %s', get_the_title( $post->ID ), wp_get_shortlink( $post->ID ) );
    update_post_meta( $post->ID, '_wpas_mess', $publicize_custom_message );
}
add_action('the_post', 'set_title_publicize');
add_action('save_post', 'set_title_publicize');
add_action('draft_to_publish', 'set_title_publicize');
add_action('new_to_publish', 'set_title_publicize');
add_action('pending_to_publish', 'set_title_publicize');
add_action('future_to_publish', 'set_title_publicize');


function js() {
    wp_enqueue_script('myscript', get_template_directory_uri().'/dropdown.js', array('jquery'), false, false);
}
add_action('wp_enqueue_scripts', 'js');

//グローバルメニューにサブタイトルを付けるための記述
add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);
function description_in_nav_menu($item_output, $item){
    return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br /><span>{$item->attr_title}</span><", $item_output);
}
//アクセス数の取得
function get_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );

        return "0 ";
    }

    return $count . '';
}

//アクセス数の保存
function set_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}
function isBot() {
    $bot_list = array (
        'Googlebot',
        'Yahoo! Slurp',
        'Mediapartners-Google',
        'msnbot',
        'bingbot',
        'MJ12bot',
        'Ezooms',
        'pirst; MSIE 8.0;',
        'Google Web Preview',
        'ia_archiver',
        'Sogou web spider',
        'Googlebot-Mobile',
        'AhrefsBot',
        'YandexBot',
        'Purebot',
        'Baiduspider',
        'UnwindFetchor',
        'TweetmemeBot',
        'MetaURI',
        'PaperLiBot',
        'Showyoubot',
        'JS-Kit',
        'PostRank',
        'Crowsnest',
        'PycURL',
        'bitlybot',
        'Hatena',
        'facebookexternalhit',
        'NINJA bot',
        'YahooCacheSystem',
    );

    $is_bot = false;
    foreach ($bot_list as $bot) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
            $is_bot = true;
            break;
        }
    }
    return $is_bot;
}