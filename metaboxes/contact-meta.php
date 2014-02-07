<div class="my_meta_control add_divider">
         <div class="divide">
            <div class="title">
                <label>Google Map Embed</label><?php $metabox->the_field("gmap"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
	    </div>
        <div class="divide">
            <p><?php _e('Contact details here. Set text to H4 for serifs.');?></p>
            <p>
                <?php $mb->the_field('cdeets'); 
                $settings = array( 
                    'textarea_rows' => '10',
                    'media_buttons' => 'false',
                    'tabindex' =>2
                );
                $val =  html_entity_decode( $mb->get_the_value(), ENT_QUOTES, 'UTF-8' ); 
                $id = $mb->get_the_name();
                wp_editor($val,  $id , $settings );
                ?>
                
                 <span>Enter in some text</span>
            </p>
	
	    </div>
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
