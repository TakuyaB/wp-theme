<?php if ( have_posts() ) : while ( have_posts() ) : the_post();$loop_count++; ?>
    <?php get_template_part('post'); ?>
    <?php if ( $loop_count == 5 || $loop_count == 10 ) : ?>
        <div class="toppage-adsense">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- text -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-8190426600607976"
                 data-ad-slot="4245766048"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    <?php endif; ?>
<?php endwhile; else: ?><!-- 記事が見つからなかった場合-->
    <div class="post">
        <h1 class="post-title">記事はありません</h1>
        <p>申し訳ございません。お探しの記事は見つかりませんでした。</p>
    </div>
<?php endif; ?>
<!--ページャー-->
<div class="top-pager">
    <?php global $wp_rewrite; $paginate_base = get_pagenum_link(1); if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
        $paginate_format = '';
        $paginate_base = add_query_arg('paged','%#%');
    }
    else{
        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/','paged');;
        $paginate_base .= '%_%';
    }
    echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'current' => ($paged ? $paged : 1),
        'prev_text' => '«',
        'next_text' => '»',
    )); ?></div><!-- ページャーここまで -->