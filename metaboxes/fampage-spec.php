<?php

$famp_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_famp_meta',
	'title' => 'Headlines',
	'template' => get_stylesheet_directory() . '/metaboxes/fampage-meta.php',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_famp_',
	'types' => array('page'),
	'exclude_template' => array('homepage.php')

));

/* eof */