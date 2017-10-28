<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
    <!-- CSS,JavaScriptファイルの指定はここ -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <!--highlight.jsの記述-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <!--MathJax（数式）の記述-->
    <!-- レスポンシブに必要な記述:Viewpoint -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <!--最小限のビューポート設定-->
    <meta name="viewport" content="width=device-width">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--    <script src="dropdown.js" type="text/javascript"></script>-->
    <!--アドセンス-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8190426600607976",
            enable_page_level_ads: true
        });
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="container">
        <header>
            <div id="header-inner" class="wrap">
                <div class="header-logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/images/logo.png">
                    </a>
                </div>
                <div class="header-nav">
                </div>
                <!--スマホメニューここ-->
                <div class="btn">
                    <span><i></i></span>
                </div>
            </div>
            <nav>
                <?php wp_nav_menu(
                    array(
                        'container' => false,
                        'items_wrap' => '<ul class="wrap">%3$s</ul>'
                    )
                ); ?>
                <div class="clearfix"></div>
            </nav>
        </header>
