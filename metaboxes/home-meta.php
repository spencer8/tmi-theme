<div class="my_meta_control add_divider">
    <div class="customEditor">
    <p> <label>Optional Video</label> <span><?php _e('Place a vimeo embed here. Or leave blank to remove that section on your page.');?></span></p>
	<p>
		<?php $mb->the_field('anim'); 
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
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>
    </div>
    <div class="customEditor">
    <p> <label>Main Image(s)</label> <span><?php _e('Insert your image(s) here to display to the left of the page intro text. Multiple images will display in a slider. Be sure each image is on a separate line, but with no empty lines between them. To add an image, use the Add Media button below. In the Media dialogue, upload your image or select it from the library. With your image selected, look to the pane on the right. Under ATTACHMENT DISPLAY SETTINGS set your Link to None and Size to Medium. Then click the Insert Into Page button.');?></span></p>
	<p>
		<?php $mb->the_field('slides'); 
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
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>
    </div>
	<p class="warning"><?php _e('These textareas will NOT work without javascript enabled.');?></p>  
	<p>Each case Study is handled in a box below. You can delete a case study by clicking the 'Remove Section' button at the top right of each Case Study. You can reorder the existing case studies by draggin on a case study's header bar and dropping it above or below another case study. Keep in mind this can be tricky because they're so large. To add another case study, click on the 'Add Case Study' button below all the current case studies.
	<?php while($mb->have_fields_and_multi('zone')): ?>
	<?php $mb->the_group_open(); ?>
	<h3 class="handle">A Case Study</h3>
	<a href="#" class="dodelete button"><?php _e('Remove Section');?></a>
	  
	<div class="inside">
		<p class="warning update-warning"><?php _e('Sort order has been changed. Remember to save the post to save these changes.');?></p>
        <div class="divide">
            <div class="title">
                <label>Headline</label><?php $metabox->the_field("title"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
            <div class="title">
                <label>Sub Headline</label><?php $metabox->the_field("subtitle"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
            <div class="customEditor">
            <p>Place your text for this case study here.</p>
                <?php $mb->the_field('textarea'); ?>
                
                <div class="wp-editor-tools">
                    <div class="custom_upload_buttons hide-if-no-js wp-media-buttons"><?php do_action( 'media_buttons' ); ?></div>
                </div>
                <textarea id="<?php $mb->the_name(); ?>" cols="50" name="<?php $mb->the_name(); ?>" rows="3"><?php echo str_replace('&gt;&lt;br /&gt;', '&gt;', esc_html( wp_richedit_pre($mb->get_the_value()) )); ?></textarea>
            </div>
		</div>
		<div class="customEditor divide">
		<label>Image</label>
        <p>Leave this area blank for no image and just a quote, or place your image for this case study here. Use the Add Media button below. In the Media dialogue, upload your image or select it from the library. With your image selected, look to the pane on the right. Under ATTACHMENT DISPLAY SETTINGS set your Link to None and Size to Medium. Then click the Insert Into Page button.</p>
			<?php $mb->the_field('image'); ?>
			
			<div class="wp-editor-tools">
				<div class="custom_upload_buttons hide-if-no-js wp-media-buttons"><?php do_action( 'media_buttons' ); ?></div>
			</div>
			<textarea id="<?php $mb->the_name(); ?>" cols="50" name="<?php $mb->the_name(); ?>" rows="3"><?php echo str_replace('&gt;&lt;br /&gt;', '&gt;', esc_html( wp_richedit_pre($mb->get_the_value()) )); ?></textarea>
		</div>
		<div class="customEditor divide">
		<label>Quote</label>
    		<p><span><?php _e('Place a quote or secondary text here. If followed by a credit, apply the H4 element to the credit.');?></span></p>
			<?php $mb->the_field('quote'); ?>
			<div class="wp-editor-tools">
				<div class="custom_upload_buttons hide-if-no-js wp-media-buttons"><?php do_action( 'media_buttons' ); ?></div>
			</div>
			<textarea id="<?php $mb->the_name(); ?>" cols="50" name="<?php $mb->the_name(); ?>" rows="3"><?php echo str_replace('&gt;&lt;br /&gt;', '&gt;', esc_html( wp_richedit_pre($mb->get_the_value()) )); ?></textarea>
		</div>
	</div>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-zone button"><?php _e('Add a Case Study');?></a></p>		
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
