<?php
//Template Name: Homepage
get_header(); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if($home_meta){
				$pagemeta = $home_meta->the_meta(); } ?>
				
<div id="z0" class="zone cols anim">
    <div class="wrap singlecol">
			<?php echo $pagemeta['anim']; ?>
    </div>
</div>
<div id="z1" class="zone cols home">
    <div class="wrap singlecol">
        <div class="leftcol suppbox slider">
			<?php if($pagemeta['slides']){
				echo $pagemeta['slides'];
			} ?>
        </div>
        <div class="rightcol textbox">
        <h3 class="headline">DIVERSITY <span class="serif">is the what.</span>
        <br />INCLUSION <span class="serif">is the how.</span>
        <br />INNOVATION <span class="serif">is the why.</span></h3>
        	<div class="entry">
            	<?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
<?php if($home_meta){
	//print_r($pagemeta);
	$zbg = array( 'lt-greenish-brown','greenish-brown', 'dk-blue'); 
	if($pagemeta['zone']){ $i=0;
		foreach($pagemeta['zone'] as $zone){
			$zbgsel = $i % 3; ?>
<div class="zone cols <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
	<?php if ($i % 2 != 0){ ?>
        <div class="rightcol textbox">
            <h3><?php echo $zone['title']; ?></h3>
            <p class="subtitle"><?php echo $zone['subtitle']; ?></p>
        	<div class="entry">
                <?php echo apply_filters('the_content', $zone['textarea']); ?>
            </div>
        </div>
        <div class="leftcol suppbox">
                <?php if($zone['image'] !='')  echo '<div class="image">'.$zone['image'].'</div>'; ?>
                <div class="quote"><?php echo apply_filters('the_content', $zone['quote']); ?></div>                
        </div>
    <?php }else{ ?>
        <div class="rightcol suppbox">
                <?php if($zone['image'] !='')  echo '<div class="image">'.$zone['image'].'</div>'; ?>
                <div class="quote"><?php echo apply_filters('the_content', $zone['quote']); ?></div>                
        </div>
        <div class="leftcol textbox">
            <h3><?php echo $zone['title']; ?></h3>
            <p class="subtitle"><?php echo $zone['subtitle']; ?></p>
        	<div class="entry">
                <?php echo apply_filters('the_content', $zone['textarea']); ?>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<?php $i++; } } } ?>
<?php get_footer(); ?>