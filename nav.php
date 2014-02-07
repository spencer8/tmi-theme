<div id="nav" class="nav">
<div id="logo"><a href="<?php bloginfo('url'); ?>" title="Home">TMI</a></div>
<a class="bannerlink" href="<?php bloginfo('url'); ?>/inclusion-for-innovation" >Inclusion for Innovation</a>
<?php $args = array(
	'theme_location'  => 'header', 
	'container'       => 'false', 
	'menu_class'      => 'menu', 
	'menu_id'         => 'menu-header',
); ?>

<?php wp_nav_menu( $args ); 

?>
</div>