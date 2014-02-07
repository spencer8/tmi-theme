<?php
//Template Name: Events
get_header(); ?>
<div id="z1" class="zone family">
	<div class="wrap widepiccol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="leftcol suppbox">
			<?php the_post_thumbnail( 'large' ); ?>
        </div>
        <div class="rightcol textbox cf">
				<h3><?php the_field('headline'); ?></h3>
            <p class="famsubtitle"><?php the_field('subheadline'); ?></p>
        	<div class="entry">
            	<?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</div>
<div id="events" class="zone lt-greenish-brown">
	<div class="wrap thincol">
            <?php
		$today = date('Y-m-d');
		$args = array(
			'posts_per_page'     => 25,
			'orderby'         => 'meta_value',
			'meta_key' => 'event_date',
			'order'           => 'ASC',
			'post_type'       => 'event',
			'meta_query'=> array(
			array(
					'key' => '_event_date',
					'compare' => '>=',
					'value' => $today,
				)
			)
		);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php if( get_field('sticky') ){ //loop through once to show stickies	?>
		<div class="leftcol textbox<?php if( get_field('attend') )echo ' attend'; ?>">
            <h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php the_field('subheadline'); ?></p>
        	<div class="entry">
                <?php the_content(); ?>
            </div>
            <h4 class="ptopics"><?php the_terms( $post->ID, 'event_type', '', ', ', ' ' ); ?></h4>
		</div>
		<div class="rightcol suppbox">
			<?php $e_date = get_field('event_date'); 
				$link = '';
				if( get_field('link') ) $link = '<a href="'. get_field('link') .'">more info</a>';
			 if($e_date && $e_date!='') echo '<div class="quote"><h3>'.date('M j, Y', strtotime($e_date)).'<br>'.$pagemeta['location'].'</h3><h4>'. $link .'</h4></div>'; ?>
		</div>
		<?php } ?>
	<?php endwhile; // End the loop. Whew. 
	while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php if( ! get_field('sticky') ){ //loop through once to show non-stickies	?>
		<div class="leftcol textbox<?php if( get_field('attend') )echo ' attend'; ?>">
            <h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php the_field('subheadline'); ?></p>
        	<div class="entry">
                <?php the_content(); ?>
            </div>
            <h4 class="ptopics"><?php the_terms( $post->ID, 'event_type', '', ', ', ' ' ); ?></h4>
		</div>
		<div class="rightcol suppbox">
			<?php $e_date = get_field('date'); 
				$link = '';
				if( get_field('link') ) $link = '<a href="'. get_field('link') .'">more info</a>';
			 if($e_date && $e_date!='') echo '<div class="quote"><h3>'.date('M j, Y', strtotime($e_date)).'<br>'.$pagemeta['location'].'</h3><h4>'. $link .'</h4></div>'; ?>
		</div>

		<?php } ?>
	<?php endwhile; // End the loop. Whew. 
		wp_paginate(); ?>
    </div>
</div>

<?php get_footer(); ?>