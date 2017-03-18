<?php get_header(); ?>
<!--    <div class="news">-->
<!--        <h2>お知らせ</h2>-->
<!--        <p>2017.03.07:現在、サイトデザインリニューアル中です！</p>-->
<!--    </div>-->
<div id="contents">
    <div id="main">
        <?php if(have_posts()): while(have_posts()): the_post(); ?><!--記事がある場合-->
        <div <?php post_class( 'single-post' ); ?>>
            <h1 class="post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
            <div class="post-info">
                <time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
                    <i class="fa fa-clock-o"></i>
                    <?php echo get_the_date(); ?>
                </time>
                <!-- Update Date -->
                <?php if( get_the_date() != get_the_modified_date() ): ?>
                    <time datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
                        <i class="fa fa-repeat"></i>
                        <?php echo get_the_modified_date() ?>
                    </time>
                <?php endif; ?>
                <span class="post-category">
                    <i class="fa fa-folder-open"></i>
                    <?php the_category( ', ' ); ?>
                </span>
            </div>
            <?php the_content(); ?>
            <!-- 記事下に入れたいお知らせやオススメ記事のdivはここ-->
            <!-- single-pager -->
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
            <?php include( TEMPLATEPATH . '/related-entries.php' ); ?>
        </div><!-- 記事下関連記事ここまで -->
    </div><!-- mainここまで -->
    <?php get_sidebar(); ?>
</div><!-- contentsここまで -->
</div><!-- containerここまで -->
<?php get_footer(); ?>