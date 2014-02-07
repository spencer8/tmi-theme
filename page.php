<?php

get_header();
$contentcol = 'textbox';
 ?>
<div id="z1" class="zone <?php if(!get_field('1column')) echo " cols" ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			if ( has_post_thumbnail() ) { 
			$contentcol = 'rightcol'; ?>
	<div class="wrap singlecol">
        <div class="leftcol suppbox">
			<?php the_post_thumbnail( 'medium' ); ?>
        </div>
        <?php }else{ ?>
    <div class="wrap textcol">
        <?php } ?>
        <div class="<?php echo $contentcol; ?> textbox">
<?php if($famp_meta){
	$pagemeta = $famp_meta->the_meta();?>
			<h3><?php if($pagemeta['title'] && $pagemeta['title'] != '' ) { echo $pagemeta['title']; } else { the_title(); } ?></h3>
            <p class="famsubtitle"><?php echo $pagemeta['subtitle']; ?></p>
<?php } ?>
        	<div class="entry">
            	<?php the_content(); ?>
                <?php if ( is_page(5) ) { ?><script src="http://singlebrook.com/bcorps/widget.js"></script><?php } ?>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php if(get_field('1column'))
{
	
} ?>
<?php get_footer(); ?>