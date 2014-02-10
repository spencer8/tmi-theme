<?php
//Template Name: Inspire
get_header(); ?>
<div id="z1" class="zone family">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		if ( has_post_thumbnail() ) { ?>
	<div class="wrap widepiccol">
        <div class="leftcol suppbox">
			<?php the_post_thumbnail( 'large' ); ?>
        </div>
        <div class="rightcol textbox">
            <h3><?php if( get_field('headline') ) { the_field('headline'); } else { the_title(); } ?></h3>
            <?php if( get_field('subheadline') ) { ?>
            <p class="famsubtitle"><?php the_field('subheadline'); ?></p>
            <?php } ?>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php   
	   } else { // no post thumbnail ?>
	<div class="wrap thincol">
        <div class="leftcol suppbox">
            <h3><?php if( get_field('headline') ) { the_field('headline'); } else { the_title(); } ?></h3>
            <?php if( get_field('subheadline') ) { ?>
            <p class="famsubtitle"><?php the_field('subheadline'); ?></p>
            <?php } ?>
        </div>                
        <div class="rightcol textbox">
        	<div class="entry">
                 <?php the_content(); ?>
            </div>	   
    <div class="clear"></div>
</div>	   	   
<?php        }// end no post thumbnail
       endwhile; else: ?>
	<div class="wrap widepiccol">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
	<?php
	if(get_field('speakers')) $rows = get_field('speakers');
	$i = 0;
	$zbg = array( 'lt-greenish-brown','greenish-brown', 'dk-blue'); 
	foreach($rows as $row) {
	?>
	<?php
	$zbgsel = $i % 3; ?>
<div class="zone cols family <?php echo $zbg[$zbgsel]; ?>">
	<div class="wrap singlecol">
	<?php if ($i % 2 == 0){ ?>
        <div class="rightcol textbox">
            <h3><?php if($row['name']) echo $row['name']; ?></h3>
            <p class="subtitle"><?php if($row['subheader']) echo $row['subheader']; ?></p>
        	<div class="entry">
                <?php if($row['entry']) echo $row['entry']; ?>
            </div>
        </div>
        <div class="leftcol suppbox">
			<?php
				if($row['image']) {
				$img = $row['image'];
				$att = wp_get_attachment_image_src($img, 'medium');
				echo '<img src="'.$att[0].'" width="'.$att[1].'" height="'.$att[2].'" />';
				}
			?>
        </div>
    <?php }else{ ?>
        <div class="rightcol suppbox">
			<?php
				if($row['image']) {
				$img = $row['image'];
				$att = wp_get_attachment_image_src($img, 'medium');
				echo '<img src="'.$att[0].'" width="'.$att[1].'" height="'.$att[2].'" />';
				}
			?>
		</div>
        <div class="leftcol textbox">
            <h3><?php if($row['name']) echo $row['name']; ?></h3>
            <p class="subtitle"><?php if($row['subheader']) echo $row['subheader']; ?></p>
        	<div class="entry">
                <?php if($row['entry']) echo $row['entry']; ?>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
    </div>
</div>
<?php
	$i++;
     } ?>
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