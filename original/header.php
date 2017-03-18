<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
    <!-- CSS,JavaScriptファイルの指定はここ -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

    <!-- レスポンシブに必要な記述:Viewpoint -->
    <meta name="viewpoint" content="width=device-width">
    <link rel="alternate" type="application/json+oembed" href="http://localhost/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Flocalhost%2Fwordpress%2F20100806080939.html" />
    <link rel="alternate" type="text/xml+oembed" href="http://localhost/wordpress/wp-json/oembed/1.0/embed?url=http%3A%2F%2Flocalhost%2Fwordpress%2F20100806080939.html&#038;format=xml" />
    <?php wp_head(); ?>
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
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
            <p class="description">
                <?php bloginfo( 'description' ); ?>
            </p>
        </div><!-- main-title ここまで -->
        <div class="bgc">
            <?php wp_nav_menu(
                array(
                    'container' => false,
                    'items_wrap' => '<nav><ul id="menu">%3$s</ul></nav>'
                )
            ); ?>
        </div><!-- bgc(nav-menu)ここまで -->

    </div><!-- headerここまで-->
