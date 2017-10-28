<?php get_header(); ?>
    <script type="text/javascript">
        window._pt_lt = new Date().getTime();
        window._pt_sp_2 = [];
        _pt_sp_2.push('setAccount,1fe37a15');
        var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        (function() {
            var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
            atag.src = _protocol + 'js.ptengine.jp/pta.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(atag, s);
        })();
    </script>

    <div id="contents" class="wrap">
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