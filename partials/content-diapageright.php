<div class="rightcol suppbox">
    <?php if ( has_post_thumbnail() ) { 
        echo '<div class="image">'; the_post_thumbnail( 'medium' ); echo '</div>'; 
    } ?>
    <div class="quote"><?php the_field('quote'); ?></div>                
</div>

<div class="leftcol textbox">
    
    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
    
    <p class="subtitle"><?php the_field('subheadline'); ?></p>
    
    <div class="entry">
        <?php $more = 0;       // Set (inside the loop) to display content above the more tag.
        the_content('&hellip;Read More'); ?>
    </div>

    <h4 class="ptopics">
        <?php 
            the_time('F j, Y'); 
            echo ' | '; 
            the_terms( $post->ID, 'category', '', ', ', ' ' ); 
        ?>
         | 
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Comment</a>
    </h4>

</div>
