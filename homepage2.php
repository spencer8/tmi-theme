<?php
//Template Name: Homepage 2
get_header(); ?>
<div id="z1" class="zone cols home">
	<div class="wrap singlecol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            	<?php the_content(); ?>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>