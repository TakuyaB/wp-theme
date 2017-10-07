<?php get_header(); ?>
<div id="contents">
    <div id="main">
        <?php get_template_part('breadcrumb'); ?>
        <?php if( is_category() ): ?>
            <h1 class="archive-title">
                <i class="fa fa-folder-open"></i>「<?php single_cat_title(); ?>」に関する記事
            </h1>
        <?php else: ?>
        <h1 class="archive-title">新着記事</h1>
        <?php endif; ?><!-- is_category()ここまで -->
        <?php get_template_part('loop'); ?>
    </div><!-- mainここまで -->
    <?php get_sidebar(); ?>
</div><!-- contentsここまで -->
</div><!-- containerここまで -->
<?php get_footer(); ?>