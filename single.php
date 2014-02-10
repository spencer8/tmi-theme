<?php
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php 
    	$cpt = get_post_type();
    	$cptsing = ( $cpt == "family" ) ? "famsingle" : "single";
    	get_template_part('partials/content', $cptsing); 
    	//echo $cpt;
    ?>
<?php endwhile; else: ?>
<div id="z1" class="zone cols dialogue lt-blue">
    <div class="wrap textcol">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>