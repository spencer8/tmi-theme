<?php
//Template Name: Contact
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="z1" class="zone contac cf">
	<div class="wrap widepiccol">
        
        <div class="leftcol mapbox">
            <?php the_field('map'); ?></p>
        </div>
        <div class="rightcol textbox">

			<h3><?php the_field('heading'); ?></h3>
            <p class="subtitle"><?php the_field('subheading'); ?></p>

        	<div class="entry">
            	<?php the_content(); ?>
				<?php the_field('contact_details'); ?>
            </div>
        </div>
    </div>
</div>
<div class="zone subnav dialogue lt-greenish-brown press">
    <a name="press"><h2>PRESS &amp; Testimonials</h2></a>
</div>
<div id="events" class="zone greenish-brown cf">
		<?php if(get_field('press')) $rows = get_field('press'); foreach($rows as $row) { ?>
	<div class="wrap thincol">
		<div class="leftcol textbox">
            <h3><?php if($row['p_title']) echo $row['p_title']; ?></h3>
            <p class="subtitle"></p>
        	<div class="entry">
                <?php if($row['entry']) echo $row['entry']; ?>
            </div>
            <h4 class="ptopics"></h4>
		</div>
		<div class="rightcol suppbox">
			 <div class="quote">
				 <?php if($row['date']) echo '<h3>'.$row['date'].'</h3>';	?>
				 <?php if($row['source']) echo '<h3>'.$row['source'].'</h3>'; ?>
				 <?php if($row['link']) echo '<h4><a href="'.$row['link'].'">full article</a></h4>'; ?>
			 </div>
		</div>
	</div>
		<?php }  ?>
</div>
<?php endwhile; else: ?>
 <div id="z1" class="zone contact">
    <div class="wrap widepiccol">
       <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>