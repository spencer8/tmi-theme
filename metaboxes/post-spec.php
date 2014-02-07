<?php

$post_meta = new WPAlchemy_MetaBox(array
(
	'id' => '_poststuff_meta',
	'title' => 'Additional Content',
	'template' => get_stylesheet_directory() . '/metaboxes/post-meta.php',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_poststuff_',
	'types' => array('post')

));

/* eof */