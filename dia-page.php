<?php
//Template Name: Dialogue
get_header(); ?>
<div id="z1" class="zone dialogue">
	<div class="wrap thincol">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="leftcol textbox">
			<h3><?php the_field('headline'); ?></h3>
            <p class="famsubtitle"><?php the_field('subheadline'); ?></p>
        	<div class="entry">
            	<?php the_content(); ?>
                <div class="dialogue_sb_wrap">
                <?php if ( dynamic_sidebar('dialouge_sb') ) : else : endif; ?>
                <div class="social">
                    <a class="facebook" title="TMI on Facebook" href="https://www.facebook.com/tmiconsulting">Facebook</a>
                    <a class="twitter" title="TMI on Twitter" href="https://twitter.com/tmi_consulting">Twitter</a>
                    <a class="linkedin" title="TMI on LinkedIn" href="http://www.linkedin.com/company/tmi-consulting-inc">LinkedIn</a>
                    <a class="rss" title="Subscribe to Posts Feed" href="http://feeds.feedburner.com/tmiconsultinginc/wYpV">RSS</a>
                </div>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <div class="rightcol suppbox">
			<?php the_post_thumbnail( 'medium' ); ?>
        </div>
    </div>
</div>
<div class="zone subnav dialogue lt-greenish-brown">
	<div class="wrap singlecol">
	<h3 class="label">Topics:</h3>
    <ul id="topics"><?php $args = array(
        'orderby'            => 'count',
        'order'              => 'DESC',
        'style'              => 'list',
        'show_count'         => 0,
        'hide_empty'         => 0,
        'use_desc_for_title' => 1,
        'child_of'           => 0,
        'exclude'            => '1',
        'hierarchical'       => 1,
        'title_li'           => '',
		'depth'				 => 1
    ); 
    wp_list_categories($args);	
        ?></ul> 
    </div>
</div>
	<?php
	$zbg = array( 'greenish-brown', 'dk-blue','lt-greenish-brown', 'lt-blue'); 
	$i = 0;
	global $more; $more = false;   // Declare global $more (before the loop).
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array('posts_per_page' => 5, 'paged' => $paged );
	query_posts($args); ?>
	<!-- the loop -->
<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
    <?php 
        $zbg = array( 'greenish-brown', 'dk-blue','lt-greenish-brown', 'lt-blue'); 
        $zbgsel = $i % 3; 
    ?>
    <div class="zone cols dialogue <?php echo $zbg[$zbgsel]; ?>">
        <div class="wrap singlecol">
            <?php 
            if ($i % 2 == 0){
                get_template_part('partials/content', 'diapageleft'); 
            }else{
                get_template_part('partials/content', 'diapageright'); 
            } 
            ?>
        </div>
    </div>
    <?php 
        $i++; 
        $zbgsel = $i % 3;   
    ?>
<?php endwhile; ?>
<!-- pagination -->
<div class="zone cols dialogue <?php echo $zbg[$zbgsel]; ?>">
    <div id="pagination" class="wrap textcol">
        <?php previous_posts_link(); ?>
        <?php next_posts_link(); ?>
        <div class="clear"></div>
    </div>
</div>
<?php else : ?>
<!-- No posts found -->
<?php endif; ?><?php get_footer(); ?>