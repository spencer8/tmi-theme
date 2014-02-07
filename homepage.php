<?php
//Template Name: Homepage
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
<div id="z0" class="zone cols anim">
    <div class="wrap singlecol">
			<?php the_field('video_embed'); ?>
    </div>
</div>
<div id="z1" class="zone cols home">
    <div class="wrap singlecol">
        <div class="leftcol suppbox slider">
			<?php if(get_field('main_images')){
                while(has_sub_field('main_images')){ 
                    if(get_sub_field('image')) { ?>
                    <img src="<?php the_sub_field('image'); ?>" alt="" />
                <?php } 
                }
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
<?php
	$zbg = array( 'lt-greenish-brown','greenish-brown', 'dk-blue'); 
	if(get_field('case_studies')){
        $i=0;
        while(has_sub_field('case_studies')){ 
			$zbgsel = $i % 3; 
?>

<div class="zone cols <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
	
    <?php if ($i % 2 != 0){ ?>
        <div class="rightcol textbox">
            <h3><?php the_sub_field('headline'); ?></h3>
            <p class="subtitle"><?php the_sub_field('subheadline'); ?></p>
            <div class="entry">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
        <div class="leftcol suppbox">
            <?php if( get_sub_field('image') ) {
                $attachment_id = get_sub_field('image');
                $size = "medium"; // (thumbnail, medium, large, full or custom size)
                 
                $image = wp_get_attachment_image_src( $attachment_id, $size );

                echo '<div class="image"><img src="'. $image[0] .'" ></div>'; 
            } ?>
            <div class="quote"><?php the_sub_field('quote'); ?></div>                
        </div>

    <?php }else{ ?>
        <div class="leftcol textbox">
            <h3><?php the_sub_field('headline'); ?></h3>
            <p class="subtitle"><?php the_sub_field('subheadline'); ?></p>
            <div class="entry">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
        <div class="rightcol suppbox">
            <?php if( get_sub_field('image') ) {
                $attachment_id = get_sub_field('image');
                $size = "medium"; // (thumbnail, medium, large, full or custom size)
                 
                $image = wp_get_attachment_image_src( $attachment_id, $size );

                echo '<div class="image"><img src="'. $image[0] .'" ></div>'; 
            } ?>
            <div class="quote"><?php the_sub_field('quote'); ?></div>                
        </div>
    <?php } ?>

    </div>
</div>
<?php $i++; } } ?>
<?php get_footer(); ?>