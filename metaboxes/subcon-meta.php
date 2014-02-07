<div class="my_meta_control add_divider">
	<p class="warning"><?php _e('These textareas will NOT work without javascript enabled.');?></p>  
	<?php while($mb->have_fields_and_multi('zone')): ?>
	<?php $mb->the_group_open(); ?>
	<h3 class="handle">A Zone</h3>
	<a href="#" class="dodelete button"><?php _e('Remove Section');?></a>
	  
	<div class="inside">
		<p class="warning update-warning"><?php _e('Sort order has been changed. Remember to save the post to save these changes.');?></p>
        <div class="title">
        <label>Title</label><?php $metabox->the_field("title"); ?>
        <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
        </div>
        <div class="clear"></div>
        <div class="feed">
		<label>Background Image</label>
 		<?php $mb->the_field('bg-color'); ?>
		<select name="<?php $mb->the_name(); ?>"<?php if($mb->get_the_value()!="") echo' class="chosen"'; ?>>
				<option value="">Select Background Image</option>
        <?php 
			$bgs = array(
				"feathers",
				"lace",
				"glitter",
				"fishnets"
			);
			foreach ($bgs as $name) { ?>
				<option value="<?php echo $name ?>"<?php $mb->the_select_state($name); ?>><?php echo $name ?></option>
		<?php } ?>
		</select>
        <p>Choose the preferred background for this zone, but remember zone backgrounds will alternate between these images and grey.</p>
        </div>
		<div class="customEditor">
        <p>Place your text for this section here.</p>
			<?php $mb->the_field('textarea'); ?>
			
			<div class="wp-editor-tools">
				<div class="custom_upload_buttons hide-if-no-js wp-media-buttons"><?php do_action( 'media_buttons' ); ?></div>
			</div>
			<textarea id="<?php $mb->the_name(); ?>" cols="50" name="<?php $mb->the_name(); ?>" rows="3"><?php echo str_replace('&gt;&lt;br /&gt;', '&gt;', esc_html( wp_richedit_pre($mb->get_the_value()) )); ?></textarea>
		</div>
		<div class="customEditor">
        <p>Place your images for this section here. Multiple images will be shown in a slider.</p>
			<?php $mb->the_field('images'); ?>
			
			<div class="wp-editor-tools">
				<div class="custom_upload_buttons hide-if-no-js wp-media-buttons"><?php do_action( 'media_buttons' ); ?></div>
			</div>
			<textarea id="<?php $mb->the_name(); ?>" cols="50" name="<?php $mb->the_name(); ?>" rows="3"><?php echo str_replace('&gt;&lt;br /&gt;', '&gt;', esc_html( wp_richedit_pre($mb->get_the_value()) )); ?></textarea>
		</div>
	</div>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-zone button"><?php _e('Add a Zone');?></a></p>		
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
