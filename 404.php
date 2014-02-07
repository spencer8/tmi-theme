<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div id="z1" class="zone cols dialogue lt-blue">
	<div class="wrap textcol">
        <div class="textbox">
			<h3>404 - Not Found</h3>
            <p class="subtitle"><?php _e( 'Apologies, but the page you requested could not be found.' ); ?></p>
        	<div class="entry">
            	<?php _e( 'Try the navigation above.' ); ?>
            </div>
            <h4 class="ptopics"><?php _e( 'Not Found' ); ?></h4>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>