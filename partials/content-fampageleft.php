<div class="rightcol suppbox">
    <?php the_post_thumbnail( 'medium' ); ?>
    <div class="quote<?php if( get_field('invert')) echo ' flip'; ?>">
        <h3><?php the_title(); ?></h3>
        <h4><?php the_field('role'); ?></h4>
    </div>  
</div>              
<div class="leftcol textbox">
    <h3><?php the_title(); ?></h3>
    <p class="subtitle"><?php the_field('subheadline'); ?></p>
    <div class="entry">
        <?php the_content(); ?>
    </div>
</div>