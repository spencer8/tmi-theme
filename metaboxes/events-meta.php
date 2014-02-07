<div class="my_meta_control">
    <p>Place the description of your event in the main text box above. The Headline on the front end uses the title in the title field at the top of this page. Choose the Event Topic(s) for this event in the Event Topics box on the right.</p>
    <div class="divider">
        <label>Subheader</label>
        <p>Place the subheader to show below the title of this event.</p>
        <p>
            <?php $mb->the_field('subhead'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </p>
	</div>
    <div class="datebox">
        <label>Date of Event</label>
        <p>Events in the Past will not show on the site.</p>
        <p>
            <?php $mb->the_field('date'); ?>
            <input type="text" id="event-date" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </p>
	</div>
    <div class="divider">
        <label>Event Location</label>
        <p>Paste &lt;br&gt; to create linebreaks.</p>
        <p>
            <?php $mb->the_field('location'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </p>
	</div>
     <div class="divider">
   <?php $metabox->the_field('attend'); ?>
    <p><label>Is TMI attending?</label>
    <input type="checkbox" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
    Check this box the show the "See Us There" Sticker</p>
   <?php $metabox->the_field('sticky'); ?>
    <p><label>Sticky?</label>
    <input type="checkbox" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>
    Check this box to keep this event at the top of the list.</p>
	</div>
    <div class="divider">
        <label>More Info Link</label>
        <p>Place a link to more details about this event if its an external site (i.e. Facebook, or the Event organizer's site). Leave blank to remove the more info link for this site.</p>
        <p>
            <?php $mb->the_field('link'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
            <span>either blank or a url, don't forget the http://</span>
        </p>
	</div>
</div>