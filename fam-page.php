<?php
//Template Name: Family
get_header(); ?>
<div id="z1" class="zone family">
	<div class="wrap widepiccol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="leftcol suppbox">
			<?php 
            if( get_field('video') ){
                the_field('video');
            }else{
                the_post_thumbnail( 'large' );
            } ?>

        </div>
        <div class="rightcol textbox">
<?php if($famp_meta){
	$pagemeta = $famp_meta->the_meta();
	$slides = $pagemeta['slides']; ?>
			<h3><?php echo $pagemeta['title']; ?></h3>
            <p class="famsubtitle"><?php echo $pagemeta['subtitle']; ?></p>
<?php } ?>
        	<div class="entry">
            	<?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
	<?php
	$zbg = array( 'lt-greenish-brown','greenish-brown', 'dk-blue'); 
    $args = array(
        'posts_per_page'     => -1,
        'orderby'         => 'menu_order',
        'order'           => 'ASC',
        'post_type'       => 'family',
        'post_status'     => 'publish',
        'suppress_filters' => true	
    );
	$query = new WP_Query( $args );
	$i = 0;
	while ( $query->have_posts() ) : $query->the_post(); ?>
<?php if($fam_meta){
	$zone = $fam_meta->the_meta();
	$zbgsel = $i % 3; ?>
<div class="zone cols family <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
	<?php if ($i % 2 == 0){ ?>
        <div class="rightcol textbox">
            <h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php echo $zone['subtitle']; ?></p>
        	<div class="entry">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="leftcol suppbox">
			<?php the_post_thumbnail( 'medium' ); ?>
            <div class="quote<?php if($zone['photo']) echo ' flip'; ?>"><h3><?php the_title(); ?></h3><h4><?php echo $zone['role']; ?></h4></div>                
        </div>
    <?php }else{ ?>
        <div class="rightcol suppbox">
			<?php the_post_thumbnail( 'medium' ); ?>
                <div class="quote<?php if($zone['photo']) echo ' flip'; ?>"><h3><?php the_title(); ?></h3><h4><?php echo $zone['role']; ?></h4></div>        	</div>
        <div class="leftcol textbox">
            <h3><?php the_title(); ?></h3>
            <p class="subtitle"><?php echo $zone['subtitle']; ?></p>
        	<div class="entry">
                <?php the_content(); ?>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
    </div>
</div>
<?php } ?>
<?php $i++;
	endwhile;  ?>
<?php if( $slides ){ 	
$zbgsel = $i % 3; 
$slides = str_replace('&nbsp;','',$slides); ?>
<div class="zone cols family <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
        <div id="famslider">
               <?php echo strip_tags($slides, '<img>'); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php } ?>

<?php get_footer(); ?>