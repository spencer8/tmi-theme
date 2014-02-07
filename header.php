<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=1040">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=2" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/ie.css" />
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="//use.typekit.net/nid8pzd.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.min.js');
?>
<?php wp_head(); ?>
<?php require_once('functions.php'); ?>
<meta name="google-site-verification" content="8i8jXZtnmaXxTk_qXaUV2Ja_yP41ExIxGgBJEX5rrxg" />
</head>

<body>
<div id="wrapper">
<?php if(!is_front_page()){ ?>
<?php } ?>
<header id="header">
    <div class="wrap">
        <?php include('nav.php'); ?>
    </div>
</header>