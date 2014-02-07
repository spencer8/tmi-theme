<?php
//Template Name: Contact
get_header(); ?>
<div id="z1" class="zone contact">
	<div class="wrap widepiccol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if($cont_meta){
	$pagemeta = $cont_meta->the_meta();?>
        <div class="leftcol mapbox">
            <?php echo $pagemeta['gmap']; $deets = $pagemeta['cdeets'] ?></p>
        </div>
<?php } ?>
        <div class="rightcol textbox">
<?php if($famp_meta){
	$pagemeta = $famp_meta->the_meta();?>
			<h3><?php echo $pagemeta['title']; ?></h3>
            <p class="subtitle"><?php echo $pagemeta['subtitle']; ?></p>
<?php } ?>
        	<div class="entry">
            	<?php the_content(); ?>
				<?php if($deets){
                 echo apply_filters('the_content', $deets); ?>                
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
	<div class="zone subnav dialogue lt-greenish-brown press"><a name="press"><h2>PRESS &amp; Testimonials</h2></a></div>
<div id="events" class="zone greenish-brown">
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
        <div class="clear"></div>
	</div>
		<?php }  ?>
</div>
		<?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    <div class="clear"></div>
<?php get_footer(); ?>