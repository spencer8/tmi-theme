<?php
get_header(); ?>
<div id="z1" class="zone cols dialogue lt-blue">
<?php if($post_meta){
	$pagemeta = $post_meta->the_meta();?>
	<div class="wrap textcol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="textbox">
			<h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php echo $pagemeta['subtitle']; ?></p>
        	<div class="entry">
            	<?php the_content(); ?>
            </div>
            <h4 class="ptopics"><?php the_time('F j, Y'); echo ' | '; the_terms( $post->ID, 'category', '', ', ', ' ' ); ?> | <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Comment</a></h4>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div id="tmicomm" class="zone dialogue lt-greenish-brown">
        <div class="wrap textcol">
            <?php comments_template( '', true ); ?>
        </div>

        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
<?php } ?>
</div>
<?php get_footer(); ?>