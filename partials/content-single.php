<div id="z1" class="zone cols dialogue lt-blue">
    <div class="wrap textcol">

        <div class="textbox cf">
            <h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php the_field('subheadline'); ?></p>
            <div class="entry">
                <?php if ( has_post_thumbnail() ) { 
                    the_post_thumbnail( 'medium' ); 
                } ?>
                <?php the_content(); ?>
            </div>
            <h4 class="ptopics"><?php the_time('F j, Y'); echo ' | '; the_terms( $post->ID, 'category', '', ', ', ' ' ); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Comment</a></h4>
        </div>
    </div>
</div>
<div id="tmicomm" class="zone dialogue lt-greenish-brown">
    <div class="wrap textcol">
        <?php comments_template( '', true ); ?>
    </div>
</div>