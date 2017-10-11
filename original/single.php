<?php get_header(); ?>

    <div id="contents">
        <div id="main">
            <?php get_template_part('breadcrumb'); ?>
            <?php if(have_posts()): while(have_posts()): the_post(); ?><!--記事がある場合-->
            <div <?php post_class( 'single-post' ); ?>>
                <?php get_template_part('postinfo'); ?>
                <?php get_template_part('sns-btn'); ?>
                <?php the_content(); ?>
                <!-- 記事下に入れたいお知らせやオススメ記事のdivはここ-->
                <div class="post-under-profile">
                    <div class="pup-header">
                        著者プロフィール
                    </div>
                    <div class="pup-main">
                        <div class="pup-left">
                            <img class="aligncenter size-full wp-image-148" src="https://takuyab.com/wp-content/uploads/2015/05/me-e1434187830461.jpg" alt="me" width="150" height="150" />
                        </div>
                        <div class="pup-right">
                            <div class="pup-title">
                                <a href="https://takuyab.com/%E8%91%97%E8%80%85%E3%83%97%E3%83%AD%E3%83%95%E3%82%A3%E3%83%BC%E3%83%AB-4" target="_blank">Takuya.B</a>
                            </div>
                            <div class="pup-content">
                                <p>
                                    Takuya.B。1992年生まれ、徳島県出身。理系大学院生（博士課程)。
                                    現在は大学で研究を行いながら、ブロガー、システムエンジニアとしても活動中。

                                </p>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php get_template_part('sns-btn'); ?>
                <div class="ad_under_post">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="autorelaxed"
                         data-ad-client="ca-pub-8190426600607976"
                         data-ad-slot="9766097742"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <!-- single-pager -->
                <div class="single-pager">
                    <div class="prev-link">
                        <a href="#">PREV</a>
                    </div>
                    <div class="next-link">
                        <a href="#">NEXT</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- single-pagerここまで -->
            </div><!-- postここまで -->
        <?php endwhile; else: ?><!-- 記事がない場合 -->
            <div class="post">
                <h1 class="post-title">記事はありません</h1>
                <p>お探しの記事は見つかりませんでした。</p>
            </div>
        <?php endif; ?>
            <!-- ここから記事下に挿入したいコンテンツ領域'mainまで'まで -->
            <div class="related-entries">
                <div class="related-entries-title-wrapper">
                    <h3 class="related-entries-title">こちらの記事もどうぞ！</h3>
                </div>
                <?php get_template_part('related-entries'); ?>
            </div><!-- 記事下関連記事ここまで -->
        </div><!-- mainここまで -->
        <?php get_sidebar(); ?>
    </div><!-- contentsここまで -->
    </div><!-- containerここまで -->
<?php get_footer(); ?>