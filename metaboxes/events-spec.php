<?php

$events_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_events_meta',
	'title' => 'Event Details',
	'types' => array('event'), // added only for pages and to custom post type "events"
	'template' => get_stylesheet_directory() . '/metaboxes/events-meta.php',
    'prefix' => '_event_',
	'init_action' => 'kia_metabox_init',
	'mode' => WPALCHEMY_MODE_EXTRACT,
));

/* eof */