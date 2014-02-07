<?php

$fam_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_fam_meta',
	'title' => 'Additional Content',
	'types' => array('family'), // added only for pages and to custom post type "family"
	'template' => get_stylesheet_directory() . '/metaboxes/fam-meta.php',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_fam_',
	//'hide_editor' => TRUE,

));

/* eof */