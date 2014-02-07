<div class="my_meta_control add_divider">
         <div class="divide">
            <div class="title">
                <label>Headline</label><?php $metabox->the_field("title"); ?>
   				<p><span><?php _e('The Headline for this Post will be taken from the post title field at the very top of this screen.');?></span></p>
            </div>
	    </div>
        <div class="divide">
            <div class="title">
                <label>Sub Headline</label><?php $metabox->the_field("subtitle"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
	    </div>
     <div class="customEditor">
 		<label>Quote</label>
   <p><span><?php _e('Place a quote or secondary text here. If followed by a credit, apply the H4 element to the credit.');?></span></p>
	<p>
		<?php $mb->the_field('quote'); 
		$settings = array( 
			'textarea_rows' => '10',
			'media_buttons' => 'false',
			'tabindex' =>2
		);
		$val =  html_entity_decode( $mb->get_the_value(), ENT_QUOTES, 'UTF-8' ); 
		$id = $mb->get_the_name();
		wp_editor($val,  $id , $settings );
		?>
	</p>
    </div>
	<p><span><?php _e('To place an image with, or instead of a quote, use the featured image function on the right.');?></span></p>
<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
