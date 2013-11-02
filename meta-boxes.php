<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */


// Create the Location Selector Array 
global $post;		
$args = array( 'post_type' => 'store-location', 'posts_per_page'   => 999, 'orderby' => 'title', 'order' => 'ASC', );
$myposts = get_posts( $args );
$array=array();
foreach ( $myposts as  $post ):
	$title=$post->post_title;
	$post_id=$post->ID;
	$array[$post_id] = $title;
endforeach;
wp_reset_postdata();
 
 
// Better has an underscore as last sign
$prefix = 'b_';

global $meta_boxes;

$meta_boxes = array();


// Event Location Selector Meta Box
$meta_boxes[] = array(
	'title' => __( 'Location Display', 'rwmb' ),
	'pages' => array( 'event','charities'),
	'context'  => 'side',
	'fields' => array(
		array(
			'name' => __( 'Select location(s) that will display.', 'rwmb' ),
			'id'   => "{$prefix}location_event_display",
			'type' => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => $array,
		)
	)

);
// Event Display Date Selector Meta Box
$meta_boxes[] = array(
	'title' => __( 'Display Dates', 'rwmb' ),
	'pages' => array( 'event','featured-item','charities'),
	'context'  => 'side',
	'fields' => array(
		array(
			'name' => __( 'Post Date', 'rwmb' ),
			'id'   => $prefix . 'postdate',
			'type' => 'datetime',
			'js_options' => array(
				'stepMinute'     => 15,
				'showTimepicker' => true,
			),
		),
		array(
			'name' => __( 'Remove Date', 'rwmb' ),
			'id'   => $prefix . 'removedate',
			'type' => 'datetime',
			'js_options' => array(
				'stepMinute'     => 15,
				'showTimepicker' => true,
			),
		),
	)

);

// Menu Select Meta Box
$meta_boxes[] = array (
	'title' => __( 'Downloadable Menus','rwmb' ),
	'pages' => array( 'store-location' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name' => __( 'Standard Menu', 'rwmb' ),
			'id'   => "{$prefix}standard_menu",
			'type' => 'file_advanced',
			'max_file_uploads' => 2,
			'mime_type' => 'application', // Leave blank for all file types
		),
		array(
			'name' => __( 'Gluten-Free Menu', 'rwmb' ),
			'id'   => "{$prefix}gf_menu",
			'type' => 'file_advanced',
			'max_file_uploads' => 2,
			'mime_type' => 'application', // Leave blank for all file types
		),
		array(
			'name' => __( 'Party Platter Menu', 'rwmb' ),
			'id'   => "{$prefix}pp_menu",
			'type' => 'file_advanced',
			'max_file_uploads' => 2,
			'mime_type' => 'application', // Leave blank for all file types
		),
	)
);

// Location Hours Meta Box
$meta_boxes[] = array(
	'title' => __( 'Hours of Operation', 'rwmb' ),
	'pages' => array( 'store-location' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name'  => __( 'Monday', 'rwmb' ),
			'id'    => "{$prefix}hours_1",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Tuesday', 'rwmb' ),
			'id'    => "{$prefix}hours_2",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Wednesday', 'rwmb' ),
			'id'    => "{$prefix}hours_3",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Thursday', 'rwmb' ),
			'id'    => "{$prefix}hours_4",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Friday', 'rwmb' ),
			'id'    => "{$prefix}hours_5",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Saturday', 'rwmb' ),
			'id'    => "{$prefix}hours_6",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Sunday', 'rwmb' ),
			'id'    => "{$prefix}hours_7",
			'type'  => 'text'
		)	
	)
);

// Meet Us Meta Box
$meta_boxes[] = array(
	'title' => __( 'Meet Us', 'rwmb' ),
	'pages' => array( 'store-location' ),
	'context' => 'normal',
	'fields' => array(
		array(
			'name' => __( 'Display', 'rwmb' ),
			'id'   => "{$prefix}meet-us-display",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),
		array(
			'name'  => __( 'Name', 'rwmb' ),
			'id'    => "{$prefix}meet-us-name",
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Title', 'rwmb' ),
			'id'    => "{$prefix}meet-us-title",
			'type'  => 'text'
		),
		array(
			'name' => __( 'Message', 'rwmb' ),
			'id'   => "{$prefix}meet-us-message",
			'type' => 'textarea',
			'cols' => 10,
			'rows' => 3,
		),
		array(
			'name'             => __( 'Photo', 'rwmb' ),
			'id'               => "{$prefix}meet-us-image",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
	
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function b_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'b_register_meta_boxes' );
