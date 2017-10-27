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
            <h4 class="related-entry-title">
                <span><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); //記事のタイトル ?>
                </a>
            </h4>
    </div><!-- related-entryここまで -->
    <?php endwhile; ?>
<?php else: ?>
    <p>関連記事は見つかりませんでした</p>
<?php endif; wp_reset_postdata(); ?>
<div class="clearfix">
</div>
