<div class="my_meta_control add_divider">
        <div class="divide">
            <div class="title">
                <label>Sub Headline</label><?php $metabox->the_field("subtitle"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
	    </div>
         <div class="divide">
            <div class="title">
                <label>Role</label><?php $metabox->the_field("role"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            	<p>i.e. President or CEO</p>
            </div>
	    </div>
		<div class="divide">
            <label>Image</label>
            <p>Use the featured image box on the right to sett the image for this family member.</p>
		</div>
       <div class="divide">
		<label>Invert Photo title</label>
 		<?php $mb->the_field('photo'); ?>
    <input type="checkbox" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
    Check this box if the white text is lost over the person's photo. Will change to brown.</p>
        </div>
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
