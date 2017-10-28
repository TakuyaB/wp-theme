<?php get_header(); ?>
<div id="contents" class="wrap">
    <div id="main">
        <?php get_template_part('breadcrumb'); ?>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div <?php post_class( 'single-post' ); ?>>
            <h1 class="post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
            <div class="post-info">
                <time datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
                    <i class="fa fa-repeat"></i>
                    <?php echo get_the_modified_date() ?>
                </time>
            </div>
            <?php the_content(); ?>
        </div><!-- pageここまで -->
        <?php endwhile; endif; ?>
    </div><!-- mainここまで -->
    <?php get_sidebar(); ?>
</div><!-- contentsここまで -->
</div><!-- containerここまで -->
<?php get_footer(); ?>
