<?php
//記事内アドセンス[adsense]
function showads() {
    return '
    <div class="ad_center">
    <p style="margin-bottom: 0;">スポンサーリンク</p>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- 記事中央 -->
    <ins class="adsbygoogle"
    style="display:inline-block;width:336px;height:280px"
    data-ad-client="ca-pub-8190426600607976"
    data-ad-slot="5443992443"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script></div>';
}
add_shortcode('adsense', 'showads');

//関連記事[kanren url="~],[mylink id="~]
function kanren($atts) {
    extract(shortcode_atts(array("url" => 'https://', 'title' => '関連記事', 'pagename' => 'default'), $atts));
    if($pagename == 'default'){
        $pagename = getPageTitle($url);
    }
    return '<div class="kanren-header">'.$title.'</div><div class="kanren"><a href="'.$url.'" target="_blank"><i class="fa fa-hand-o-right" aria-hidden="true"></i>'.$pagename.'</a></div>';
}
function getPageTitle( $url ) {
    $html = file_get_contents($url); //(1)
    $html = mb_convert_encoding($html, mb_internal_encoding(), "auto" ); //(2)
    if ( preg_match( "/<title>(.*?)<\/title>/i", $html, $matches) ) { //(3)
        return $matches[1];
    } else {
        $title = getPageTitle2($url);
        return $title;
    }
}
function getPageTitle2($url){
    static $regex = '@<title>([^<]++)</title>@i';
    static $order = 'ASCII,JIS,UTF-8,CP51932,SJIS-win';
    static $ch;
    if(!$ch){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    $html = mb_convert_encoding(curl_exec($ch), 'UTF-8', $order);
    return preg_match($regex, $html, $m) ? $m[1] : $url;
}
function shortcodeFunc ( $arg ) {
    extract ( shortcode_atts ( array (
        'id'         => 0,
        'title'      => '関連記事',
        'slug'       => '',
        'postpage'   => 'post',
        'anchorlink' => '',
        'anchortext' => '',
    ), $arg ) );

    $html = "";
    $post_object = "";

    if ( $slug ) {
        $post_object = get_page_by_path ( $slug, OBJECT, $postpage );
    } elseif ( $id != 0 ) {
        $post_object = get_post ( $id );
    }

    if ( $post_object ) {
        if ( $anchorlink ) {
            $anchorlink = "#" . $anchorlink;
        }
        if ( $anchortext ) {
            $anchortext = "／" . $anchortext;
        }
//        $html = '<a href=' . get_permalink ( $post_object -> ID ) . $anchorlink . ' target="_blank">' . $post_object -> post_title . $anchortext . "</a>";
        $html = '<div class="kanren-header">'.$title.'</div><div class="kanren"><a href="'.get_permalink ( $post_object -> ID ) . $anchorlink.'" target="_blank"><i class="fa fa-hand-o-right" aria-hidden="true"></i>'.$post_object -> post_title . $anchortext.'</a></div>';
    }

    return $html;
}
add_shortcode('mylink', 'shortcodeFunc');
add_shortcode('kanren', 'kanren');
?>