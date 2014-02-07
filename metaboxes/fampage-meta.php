<div class="my_meta_control add_divider">
         <div class="divide">
            <div class="title">
                <label>Headline</label><?php $metabox->the_field("title"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
	    </div>
        <div class="divide">
            <div class="title">
                <label>Sub Headline</label><?php $metabox->the_field("subtitle"); ?>
                <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>"/>
            </div>
	    </div>
        <div class="customEditor">
            <p> <label>Image(s) Slider</label> <span><?php _e('Insert your image(s) here to display at the bottom of the page. Multiple images will display in a slider. Be sure each image is on a separate line, but with no empty lines between them. To add an image, use the Add Media button below. In the Media dialogue, upload your image or select it from the library. With your image selected, look to the pane on the right. Under ATTACHMENT DISPLAY SETTINGS set your Link to None and Size to Large. Then click the Insert Into Page button.');?></span></p>
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
        </div>
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>
