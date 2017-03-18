<?php
//カテゴリ情報から関連記事を10個ランダムに呼び出す
    $categories = get_the_category($post->ID);
    $category_ID = array();

    foreach($categories as $category):
    array_push( $category_ID, $category -> cat_ID);
    endforeach ;

    $args = array(
        'post__not_in' => array($post -> ID),
        'posts_per_page'=> 3,
        'category__in' => $category_ID,
        'orderby' => 'rand',
    );
    $query = new WP_Query($args); ?>
<?php if( $query->have_posts() ): ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="related-entry">
        <div class="related-entry-thumb">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                <?php if( has_post_thumbnail() ): //サムネイルを持っているとき ?>
                    <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); //サムネイルを呼び出す ?>
                <?php else: //サムネイルを持っていないとき ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="NO IMAGE" title="NO IMAGE" width="200px" />
                <?php endif; ?>
            </a>
        </div><!-- related-entry-thumbここまで -->
        <div class="related-entry-content">
            <h4 class="related-entry-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); //記事のタイトル ?>
                </a>
            </h4>
        </div><!-- related-entry-contentここまで -->
    </div><!-- related-entryここまで -->
    <?php endwhile; ?>
<?php else: ?>
    <p>関連記事は見つかりませんでした</p>
<?php endif; wp_reset_postdata(); ?>
<div class="clearfix">
</div>
