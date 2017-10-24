<div <?php post_class( 'post' ); ?>>
    <div class="post-thumbnail">
        <?php if( has_post_thumbnail() ): ?>
            <p><?php the_post_thumbnail( array( 250, 250 ) ); ?></p>
        <?php endif; ?>
    </div><!-- post-thumbnailここまで -->
    <div class="post-context">
        <?php get_template_part('postinfo'); ?>
    </div><!-- post-contextここまで -->
    <div class="post-float-clear">
        <!-- 中身は空っぽ -->
    </div><!-- post-float-clearここまで -->
</div><!-- postここまで -->