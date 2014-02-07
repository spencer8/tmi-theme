<?php

$cont_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_cont_meta',
	'title' => 'Contact Stuff',
	'template' => get_stylesheet_directory() . '/metaboxes/contact-meta.php',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_cont_',
	'include_template' => array('contact-page.php'),

));

/* eof */