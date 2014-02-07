<?php

$home_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_home_meta',
	'title' => 'Additional Content and Case Studies',
	'template' => get_stylesheet_directory() . '/metaboxes/home-meta.php',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_home_',
	//'hide_editor' => TRUE,
	'include_template' => array('homepage.php')

));

/* eof */