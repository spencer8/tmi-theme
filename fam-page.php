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

			<h3><?php the_field('headline'); ?></h3>
            <p class="famsubtitle"><?php the_field('subheadline'); ?></p>

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
    <?php 
        $zbg = array( 'lt-greenish-brown','greenish-brown', 'dk-blue'); 
    	$zbgsel = $i % 3; 
    ?>
<div class="zone cols family <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
	<?php if ($i % 2 == 0){ 
        get_template_part('partials/content', 'fampageright');
    }else{ 
        get_template_part('partials/content', 'fampageleft');
    } ?>
    </div>
</div>
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