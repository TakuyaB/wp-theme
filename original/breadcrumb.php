<?php if(!is_home()): ?>
    <div id="breadcrumb">
        <ul>
            <li><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li>&gt;</li>
            <?php if(is_search()): ?>
                <li>「<?php the_search_query(); ?>」で検索した結果</li>
            <?php elseif(is_404()): ?>
                <li>404 Not found</li>
            <?php elseif(is_date()): //ここあとまわし ?>
                <?php if(is_day()): ?>
                    <li><a href="<?php echo get_year_link(get_query_var('year')); ?>"><?php echo get_query_var('year'); ?>年</a></li>
                    <li>&gt;</li>
                    <li><a href="<?php echo get_month_link(get_query_var('year'),get_query_var('monthnumb')); ?>"><?php echo get_query_var('monthnum'); ?>月</a></li>
                    <li>&gt;</li>
                    <li><?php echo get_query_var('day'); ?>日</li>
                <?php elseif(is_month()): ?>
                    <li><a href="<?php echo get_year_link(get_query_var('year')); ?>"><?php echo get_query_var('year'); ?>年</a></li>
                    <li>&gt;</li>
                    <li><?php echo get_query_var('monthnum'); ?>月</li>
                <?php elseif(is_year()): ?>
                    <li><?php echo get_query_var('year'); ?>年</li>
                <?php endif;?>
            <?php elseif(is_category()): ?>
                <?php $cat = get_queried_object(); ?>
                <?php if($cat -> parent != 0): ?>
                    <?php $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category')); ?>
                    <?php foreach($ancestors as $ancestor): ?>
                        <li><a href="<?php echo get_category_link($ancestor); ?>"><?php echo get_cat_name($ancestor); ?></a></li>
                        <li>&gt;</li>
                    <?php endforeach; ?>
                <?php endif; ?>
                    <li><?php echo $cat -> cat_name; ?></li>
            <?php elseif(is_page()): ?>
                <?php if($post -> post_parent != 0): ?>
                    <?php $ancestors = array_reverse( $post -> ancestors ); ?>
                    <?php foreach($ancestors as $ancestor): ?>
                        <li><a href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor); ?></a></li>
                        <li>&gt;</li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li><?php echo $post -> post_title; ?></li>
            <?php elseif(is_single()): ?>
                <?php $categories = get_the_category($post->ID); ?>
                <?php $cat = $categories[0]; ?>
                <?php if($cat -> parent != 0): ?>
                    <?php $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category')); ?>
                    <?php foreach($ancestors as $ancestor): ?>
                        <li><a href="<?php echo get_category_link($ancestor); ?>"><?php echo get_cat_name($ancestor); ?></a></li>
                        <li>&gt;</li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li><a href="<?php echo get_category_link($cat -> cat_ID); ?>"><?php echo $cat -> cat_name; ?></a></li>
                <li>&gt;</li>
                <li><?php echo $post -> post_title; ?></li>
            <?php else: ?>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
