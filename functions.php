<?php 
//add_image_size( 'about-thumb', 675, 800 ); 

include_once 'custom-p-types.php'; // Custom Post Types and Taxonomies
add_theme_support( 'post-thumbnails'   );

function my_excerpt_length($length) {
        return 80;
}
add_filter('excerpt_length', 'my_excerpt_length');

function custom_excerpt($text)
{
	global $post;
	return str_replace('[...]', ' <a href="'. get_permalink($post->ID) . '" class="rdmre">&hellip;Read More</a>', $text);
}
add_filter('the_excerpt', 'custom_excerpt');

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

function has_children($post_id) {
    $children = get_pages("child_of=$post_id");
    if( count( $children ) != 0 ) { return true; } // Has Children
    else { return false; } // No children
}

if (!class_exists('WPAlchemy_MetaBox')) include_once WP_CONTENT_DIR . '/wpalchemy/MetaBox.php';

//include_once 'metaboxes/setup.php';
include_once 'metaboxes/fam-spec.php';
include_once 'metaboxes/fampage-spec.php';
include_once 'metaboxes/home-spec.php';
include_once 'metaboxes/contact-spec.php';
include_once 'metaboxes/events-spec.php';
include_once 'metaboxes/post-spec.php';


function kia_metabox_init(){
	// I prefer to enqueue the styles only on pages that are using the metaboxes
	wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');
	wp_enqueue_style( 'jquery.ui.theme', get_stylesheet_directory_uri() . '/metaboxes/smoothness/jquery-ui-1.9.1.custom.css');

	//make sure we enqueue some scripts just in case ( only needed for repeating metaboxes )
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-mouse');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-datepicker');	
	// special script for dealing with repeating textareas
	wp_register_script('kia-metabox',get_stylesheet_directory_uri() . '/metaboxes/kia-metabox.js',array('jquery','editor'), '1.0');
	// needs to run AFTER all the tinyMCE init scripts have printed since we're going to steal their settings
	add_action('after_wp_tiny_mce','kia_metabox_scripts',999);
}

function kia_metabox_scripts(){
	wp_print_scripts('kia-metabox');
}

/* 
 * Recreate the default filters on the_content
 * this will make it much easier to output the meta content with proper/expected formatting
*/
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );

//use my override wpautop
if(function_exists('override_wpautop')){
add_filter( 'meta_content', 'override_wpautop'            );
} else {
add_filter( 'meta_content', 'wpautop'            );
}
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );



//*******************************************
// WP Nav Menus
//*******************************************

 // This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'header' => 'Header Navigation',
	'footer' => 'Footer Navigation'
) );
//AJAX Pagination
function wp_infinitepaginate(){
    $loopFile        = $_POST['loop_file'];
    $lcat        = $_POST['loadcat'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = get_option('posts_per_page');
    # Load the posts
	if($lcat == 'blog'){
		$posts_per_page = 4;
		$cat = 5;
	}else{
		$posts_per_page = 3;
		$cat = 4;
	}
    query_posts(array('paged' => $paged, 'posts_per_page' => $posts_per_page, 'cat' => $cat ));
    get_template_part( 'loop', $loopFile );
    exit;
}
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

// Custom Dashboard Widget
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget('custom_help_widget', 'Content Management Guide', 'custom_dashboard_help');
	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	
	// Backup and delete our new dashbaord widget from the end of the array

	$example_widget_backup = array('custom_help_widget' => $normal_dashboard['custom_help_widget']);
	unset($normal_dashboard['custom_help_widget']);

	// Merge the two arrays together so our widget is at the beginning

	$sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);

	// Save the sorted array back into the original metaboxes 

	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function custom_dashboard_help() {
	$current_user = wp_get_current_user();
echo '<p style="font-size: 2em; line-height: 1.5; color:#77a39a; line-height:1.2;"><strong>'.$current_user->display_name.'</strong>, welcome to '.get_bloginfo('name').'\'s content management system. To get you started, or to refresh your memory later, we\'ve prepared a guide. Visit it <a href="'.get_bloginfo('url').'/guide" target="_blank" style="color:#c72b4e;">here</a>.</p>';
}

function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
//	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
//	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
//	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
//	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


// replace the default posts feed with feedburner
function teameight_custom_rss_feed( $output, $feed ) {
    if ( strpos( $output, 'comments' ) )
        return $output;

    return esc_url( 'http://feeds.feedburner.com/tmiconsultinginc/wYpV' );
}
add_action( 'feed_link', 'teameight_custom_rss_feed', 10, 2 );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function teameight_widgets_init() {

	register_sidebar( array(
		'name' => 'Dialogue sidebar',
		'id' => 'dialouge_sb',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'teameight_widgets_init' );

//eof
