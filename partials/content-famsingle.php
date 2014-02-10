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
        </div>
    </div>
</div>