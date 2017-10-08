<h1 class="post-title">
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h1>
<div class="post-info">
    <!-- Creation Date -->
    <time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
        <i class="fa fa-clock-o"></i>
        <?php echo get_the_date(); ?>
    </time>
    <!-- Update Date -->
    <?php if( get_the_date('Ymd') < get_the_modified_date('Ymd') ): ?>
    <time>
        <i class="fa fa-repeat"></i>
        <?php echo get_the_modified_date() ?>
    </time>
    <?php endif; ?><!-- Update Dateここまで -->
    <span class="post-category">
                            <i class="fa fa-folder-open"></i>
        <?php the_category( ', ' ); ?>
                        </span>
</div><!-- post-infoここまで -->