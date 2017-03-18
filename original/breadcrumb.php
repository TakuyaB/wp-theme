<?php if(!is_home()): ?>
    <div id="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>/">HOME</a></li>
            <li>&gt;</li>
            <?php if(is_search()): /* 検索結果表示 */ ?>
                <li>「<?php the_search_query(); ?>」で検索した結果</li>

            <?php elseif(is_404()): /* 404 Not Found */?>
                <li>404 Not found</li>

            <?php elseif(is_date()): /* 日付アーカイブ */?>
                <?php if(is_day()): /* 日別アーカイブ */?>
                    <li><a href="<?php echo get_year_link(get_query_var('year')); ?>"><?php echo get_query_var('year'); ?>年</a></li>
                    <li>&gt;</li>
                    <li><a href="<?php echo get_month_link(get_query_var('year'), get_query_var('monthnum')); ?>"><?php echo get_query_var('monthnum'); ?>月</a></li>
                    <li>&gt;</li>
                    <li><?php echo get_query_var('day'); ?>日</li>
                <?php elseif(is_month()): /* 月別アーカイブ */?>
                    <li><a href="<?php echo get_year_link(get_query_var('year')); ?>"><?php echo get_query_var('year'); ?>年</a></li>
                    <li>&gt;</li>
                    <li><?php echo get_query_var('monthnum'); ?>月</li>
                <?php elseif(is_year()): /* 年別アーカイブ */ ?>
                    <li><?php echo get_query_var('year'); ?>年</li>
                <?php endif; ?>
            <?php elseif(is_category()): /* カテゴリーアーカイブ */?>

            <?php elseif(is_author()): /* 投稿者アーカイブ */?>

            <?php elseif(is_page()): /* 固定ページ */?>

            <?php elseif(is_attachment()): /* 添付ファイルページ */?>

            <?php elseif(is_single()): /* ブログ記事 */?>

            <?php else: /* 上記以外 */?>

            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>