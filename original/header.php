<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
    <!-- CSS,JavaScriptファイルの指定はここ -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

    <!-- レスポンシブに必要な記述:Viewpoint -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <!--最小限のビューポート設定-->
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
    <!--アドセンス-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8190426600607976",
            enable_page_level_ads: true
        });
    </script>
</head>
<body <?php body_class(); ?>>
<div id="container">
    <div id="header">
        <div class="main-title">
            <h1 class="title-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="https://takuyab.com/wp-content/uploads/2017/08/A85srMjS.jpg">
                </a>
            </h1>
        </div><!-- main-title ここまで -->
        <div class="bgc">
            <p id="nav-open"><a class="btn-open" href="#">MENU</a></p>
            <?php wp_nav_menu(
                array(
                    'container' => false,
                    'items_wrap' => '<nav class="nav"><ul id="menu">%3$s</ul></nav>'
                )
            ); ?>
        </div><!-- bgc(nav-menu)ここまで -->
    </div><!-- headerここまで-->
