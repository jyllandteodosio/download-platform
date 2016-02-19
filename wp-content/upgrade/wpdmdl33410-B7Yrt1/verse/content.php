<article <?php post_class('post'); ?>>
    <div class="post-thumb">
        <a href="<?php the_permalink(); ?>"><?php wpeden_post_thumb(array(900,400), true); ?></a>
    </div>
    <!-- /.post-thumb -->
    <div class="post-content">
        <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php the_excerpt(); ?>
    </div>
    <!-- /.post-content -->
    <div class="post-meta">
        <ul class="meta-list">
            <li>
                <span><?php _e('Posted on','thenext');?></span>
                <span class="black"><?php the_date(); ?></span>
            </li>
            <li>
                <span><?php _e('By','thenext');?></span>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
            </li>
            <li>
                <span><?php _e('In','thenext');?></span>
                <?php the_category('<span>,</span>'); ?>
            </li>
            <li>
                <span class="black"><?php comments_number( __('no comments','thenext'), __('one comment','thenext'), __('% comments','thenext') ); ?></span>
            </li>
        </ul>
    </div>
    <!-- /.post-meta -->
</article>