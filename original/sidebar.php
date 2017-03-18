<div id="sidebar">
    <ul>
        <?php dynamic_sidebar(); ?>
    </ul>
</div><!-- sidebarここまで -->


<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div <?php post_class( 'side-posts' ); ?>>
    <div class="side-post-thumbnail">
        <p><?php the_post_thumbnail( array(75,75) ); ?></p>
    </div>
    <div class="side-post-content">
        <h1 class="side-post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
    </div>
</div>
<?php endif; ?>
