<?php
include 'meta-boxes.php';
register_nav_menu( 'primary', __( 'Navigation Menu', 'burger21' ) );
register_nav_menu( 'top', __( 'Top Navigation Menu', 'burger21' ) );
register_nav_menu( 'menu-page', __( 'Menu Navigation', 'burger21' ) );
register_nav_menu( 'press-room', __( 'Press Room Navigation', 'burger21' ) );

if (function_exists('register_sidebar')) {
		register_sidebar(array(
    		'name' => 'Home Left Block',
    		'id'   => 'home-left-block',
    		'description'   => 'This is the content for the homepage left block.',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		register_sidebar(array(
    		'name' => 'Home Center Block',
    		'id'   => 'home-center-block',
    		'description'   => 'This is the content for the homepage center block.',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		register_sidebar(array(
    		'name' => 'Home Right Block',
    		'id'   => 'home-right-block',
    		'description'   => 'This is the content for the homepage right block.',
    		'before_widget' => '',
    		'after_widget'  => '',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	
// Register Menu Item Post Type
function menu_item_post_type() {

	$labels = array(
		'name'                => _x( 'Menu Items', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Menu Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Menu Items', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Menu Item:', 'text_domain' ),
		'all_items'           => __( 'All Menu Items', 'text_domain' ),
		'view_item'           => __( 'View Menu Item', 'text_domain' ),
		'add_new_item'        => __( 'New Menu Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Menu Item', 'text_domain' ),
		'update_item'         => __( 'Update Menu Item', 'text_domain' ),
		'search_items'        => __( 'Search menu items', 'text_domain' ),
		'not_found'           => __( 'No menu items found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No menu items found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'menu',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'menu-item', 'text_domain' ),
		'description'         => __( 'Menu items', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes', ),
		'taxonomies'          => array( 'menu-category' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'menu-item', $args );

}

function menu_category_taxonomy() {
   register_taxonomy(
	'menu-category',
	'menu-item',
	array(
		'hierarchical' => true,
		'label' => 'Menu Categories',
		'query_var' => true,
		'rewrite' => array('slug' => 'menu')
	)
);
}

add_action( 'init', 'menu_category_taxonomy' );

// Hook into the 'init' action
add_action( 'init', 'menu_item_post_type', 0 );



// Register Custom Post Type
function location_post_type() {

	$labels = array(
		'name'                => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Locations', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Location:', 'text_domain' ),
		'all_items'           => __( 'All Locations', 'text_domain' ),
		'view_item'           => __( 'View Location', 'text_domain' ),
		'add_new_item'        => __( 'New Location', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Location', 'text_domain' ),
		'update_item'         => __( 'Update Location', 'text_domain' ),
		'search_items'        => __( 'Search locations', 'text_domain' ),
		'not_found'           => __( 'No locations found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No locations found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'locations',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'store-location', 'text_domain' ),
		'description'         => __( 'Location information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'location-states', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'store-location',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'store-location', $args );

}

// Hook into the 'init' action
add_action( 'init', 'location_post_type', 0 );

function location_states_taxonomy() {
   register_taxonomy(
	'location-states',
	'store-location',
	array(
		'hierarchical' => true,
		'label' => 'States',
		'query_var' => true,
		'rewrite' => array('slug' => 'state')
	)
);
}

add_action( 'init', 'location_states_taxonomy' );

// Register Custom Post Type
function event_post_type() {

	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Events', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Events:', 'text_domain' ),
		'all_items'           => __( 'All Events', 'text_domain' ),
		'view_item'           => __( 'View Event', 'text_domain' ),
		'add_new_item'        => __( 'New Event', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Event', 'text_domain' ),
		'update_item'         => __( 'Update Event', 'text_domain' ),
		'search_items'        => __( 'Search events', 'text_domain' ),
		'not_found'           => __( 'No events found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No events found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'event', 'text_domain' ),
		'description'         => __( 'Event information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'event_post_type', 0 );

// Register Featured Menu Item Post Type
function fearture_post_type() {

	$labels = array(
		'name'                => _x( 'Featured Menu Items', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Featured Menu Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Featured Menu Items', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Featured Menu Item:', 'text_domain' ),
		'all_items'           => __( 'All Featured Menu Items', 'text_domain' ),
		'view_item'           => __( 'View Featured Menu Item', 'text_domain' ),
		'add_new_item'        => __( 'New Featured Menu Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Featured Menu Item', 'text_domain' ),
		'update_item'         => __( 'Update Featured Menu Item', 'text_domain' ),
		'search_items'        => __( 'Search featured menu items', 'text_domain' ),
		'not_found'           => __( 'No featured menu items found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No featured menu items found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'featured',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'featured-item', 'text_domain' ),
		'description'         => __( 'Featured Menu Item information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'featured-item', $args );

}

// Hook into the 'init' action
add_action( 'init', 'fearture_post_type', 0 );


// Register Charities Post Type
function charities_post_type() {

	$labels = array(
		'name'                => _x( 'Charities', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Charity', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Charities', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Charity:', 'text_domain' ),
		'all_items'           => __( 'All Charities', 'text_domain' ),
		'view_item'           => __( 'View Charity', 'text_domain' ),
		'add_new_item'        => __( 'New Charity', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Charitiy', 'text_domain' ),
		'update_item'         => __( 'Update Charity', 'text_domain' ),
		'search_items'        => __( 'Search charities', 'text_domain' ),
		'not_found'           => __( 'No charities found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No charities found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'charities',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'charities', 'text_domain' ),
		'description'         => __( 'Charities information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'charities', $args );

}

// Hook into the 'init' action
add_action( 'init', 'charities_post_type', 0 );

// Add Featured Image Support to Post Types
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'store-location','featured-item','event' ) );
add_image_size( 'event-thumb', 90, 90, true );

function get_store_details($type) {
	global $wpdb;
	global $post;
	$title = $post->post_title;
	$post_id=$post->ID;
	$location_data = $wpdb->get_results( 'SELECT * FROM wp_store_locator WHERE sl_store="'.$title.'"' ); 
	
	foreach ($location_data as $loc):
		$loc_longitude = $loc->sl_longitude;
		$loc_latitude = $loc->sl_latitude;
		$loc_address=$loc->sl_address;
		$loc_city=$loc->sl_city;
		$loc_state=$loc->sl_state;
		$loc_zip=$loc->sl_zip;
		$loc_phone=$loc->sl_phone;
		$loc_hours=$loc->sl_hours;
	endforeach;
	
	$map_address = $loc_address ." ". $loc_city ." ". $loc_state ." ". $loc_zip;
	
	// Get this locations hours
	$mon = rwmb_meta( 'b_hours_1');
	$tues = rwmb_meta( 'b_hours_2');
	$wed = rwmb_meta( 'b_hours_3');
	$thur = rwmb_meta( 'b_hours_4');
	$fri = rwmb_meta( 'b_hours_5');
	$sat = rwmb_meta( 'b_hours_6');
	$sun = rwmb_meta( 'b_hours_7');
	
	// Format locations hours.
	if($mon):
		$hours ='';
		$meta_hours = '';
		if($mon == $tues && $tues == $wed && $wed == $thur):
			$hours .= '
				<span class="day mon-thurs">Mon-Thurs:</span>
				<span class="hour">'.$mon.'</span>';
			$meta_hours .= 'Mon-Thurs: '.$mon.' ';	
				
		elseif($mon == $tues && $tues == $wed && $wed != $thur): 
			$hours .= '
				<span class="day mon-wed">Mon-Wed:</span>
				<span class="hour">'.$mon.'</span>
				<span class="day thurs">Thurs:</span>
				<span class="hour">'.$thur.'</span>';
			$meta_hours .= 'Mon-Wed:'.$mon.'Thurs:'.$thur.' ';	
		else:
			$hours .= '
				<span class="day mon">Mon:</span>
				<span class="hour">'.$mon.'</span>
				<span class="day tues">Tues:</span>
				<span class="hour">'.$tues.'</span>
				<span class="day wed">Wed:</span>
				<span class="hour">'.$wed.'</span>
				<span class="day thurs">Thurs:</span>
				<span class="hour">'.$thur.'</span>';
			$meta_hours .= 'Mon: '.$mon.' Tues: '.$tues.' Wed: '.$wed.' Thurs: '.$thur.' ';	
		endif;
			
		if ($fri == $sat):
			$hours .= '
				<span class="day fri-sat">Fri &amp; Sat:</span>
				<span class="hour">'.$fri.'</span>
				<span class="day sun">Sun:</span> 
				<span class="hour">'.$sun.'</span>';
			$meta_hours .= 'Fri &amp; Sat: '.$fri.' Sun: '.$sun;	
		elseif ($fri != $sat):
			$hours .= '
				<span class="day fri">Fri:</span>
				<span class="hour">'.$fri.'</span>
				<span class="day sat">Sat:</span> 
				<span class="hour">'.$sat.'</span>
				<span class="day sun">Sun:</span>
				<span class="hour">'.$sun.'</span>';
			$meta_hours .= 'Fri: '.$fri.' Sat: '.$sat.' Sun: '.$sun;		
		endif;
	endif;
	wp_reset_query();
	
	if ($type == "hours"): return $hours;
	elseif ($type == "meta_hours"): return $meta_hours;
	elseif ($type == "address"): return $loc_address;
	elseif ($type == "city"): return $loc_city; 
	elseif ($type == "state"): return $loc_state;
	elseif ($type == "zip"): return $loc_zip; 
	elseif ($type == "phone"): return $loc_phone;
	elseif ($type == "map_address"): return $map_address;
	else: return false;
	endif;
	
}

function get_store_charity($type) {
	global $wpdb; 
	global $post;
	$post_id = $post->ID;
	$query = 'SELECT wposts.* 
			  FROM '.$wpdb->posts.' AS wposts
			  INNER JOIN '.$wpdb->postmeta.' AS wpostmeta
			  ON wpostmeta.post_id = wposts.ID
			  AND wposts.post_type    = "charities"
			  AND wpostmeta.meta_key = "b_location_event_display"
			  AND wpostmeta.meta_value = "'.$post_id.'"';
	$get_charities = $wpdb->get_results($query, OBJECT);
	$featured_charity = '';
	$featured_charity_month = '';
	$past_charities = '';
	if ($get_charities):
		foreach ($get_charities as $post): 
			setup_postdata($post); 
			
			// Get event post and remove dates.
			$charity_postdate = get_post_meta( $post->ID, 'b_postdate', true );
			$charity_postdate = strtotime($charity_postdate);
			$charity_removedate = get_post_meta( $post->ID, 'b_removedate', true );
			$charity_removedate = strtotime($charity_removedate);
			
			// Check if event is should be displayed.
			if (time() > $charity_postdate && time() < $charity_removedate):
				
				$featured_charity_month = date(F, $charity_removedate);
				$featured_charity .= '<h3>'.$post->post_title.'</h3>';
			
			elseif (!$charity_postdate || !$charity_removedate || time() > $charity_removedate):
				
				$past_charities .= '<span class="charity">'.$post->post_title.'</span>';
			
			endif;
			  
		endforeach;
	endif; 
	wp_reset_query();
	
	if($type == "featured"): 
		if($featured_charity): return $featured_charity;
		endif;
	elseif ($type == "past"):
		if($past_charities): return $past_charities;
		endif;
	elseif ($type == "month"):
		if($featured_charity_month): return $featured_charity_month;
		endif;
	endif;	
	
}

function get_store_events() {
	global $wpdb;
	global $post;
	$post_id = $post->ID;
	// Get locations events from database
	$query = 'SELECT wposts.* 
			  FROM '.$wpdb->posts.' AS wposts
			  INNER JOIN '.$wpdb->postmeta.' AS wpostmeta
			  ON wpostmeta.post_id = wposts.ID
			  AND wposts.post_type    = "event"
			  AND wpostmeta.meta_key = "b_location_event_display"
			  AND wpostmeta.meta_value = "'.$post_id.'"';
	$primary_events = $wpdb->get_results($query, OBJECT);
	
	if ($primary_events): 
	
		foreach ($primary_events as $post): 
			setup_postdata($post); 
			  
			// Get event post and remove dates.
			$postdate = get_post_meta( get_the_ID(), 'b_postdate', true );
			$postdate = strtotime($postdate);
			$removedate = get_post_meta( get_the_ID(), 'b_removedate', true );
			$removedate = strtotime($removedate);
			$i=0;
			
			// Check if event is should be displayed.
			if (time() > $postdate && time() < $removedate): ?>
				<div class="event-item">
                    <div class="event-item-image">
                    <?php if (has_post_thumbnail()):
                        the_post_thumbnail('event-thumb'); 
                    endif; ?>
                    </div>
                    <div class="event-item-content">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_content() ?></p>
                    </div> 
				</div> <?php
			 	$i++;
				
			elseif (!$postdate && !$removedate): ?>
			  	<div class="event-item">
					<div class="event-item-image">
						<?php if ( has_post_thumbnail() ):
							the_post_thumbnail('event-thumb'); 
						endif; ?>
					</div>
                    <div class="event-item-content">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_content() ?></p>
                    </div>
				</div> <?php
			  	$i++;
			endif;
		endforeach;
		if ($i == '0'): ?>
			<div class="event-item">
				<h3>No Events</h3>
				<p class="center">Sorry, there are currently no specials or events.</p>
			</div>
		<?php endif;
	else: ?>
		<div class="event-item">
			<h3>No Events</h3>
			<p class="center">Sorry, there are currently no specials or events.</p>
		</div>
    <?php     
	wp_reset_query(); 
	endif;
}

function get_store_featured_menu() {
	$args = array('post_type' => 'featured-item','order' => 'ASC','orderby' => 'menu_order');
	$featured_items = new WP_Query( $args );
	while ( $featured_items->have_posts() ) : $featured_items->the_post(); 
	
		// Get event post and remove dates.
		$postdate1 = get_post_meta( get_the_ID(), 'b_postdate', true );
		$postdate1 = strtotime($postdate1);
		$removedate1 = get_post_meta( get_the_ID(), 'b_removedate', true );
		$removedate1 = strtotime($removedate1);
		
		// Check if event is should be displayed.
		if (time() > $postdate1 && time() < $removedate1): ?>
		<div class="featured-item <?php echo $post->post_name ?>">
			<div class="featured-item-image">
			<?php
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'event-thumb' ); 
				} 
			?>
			</div>
			<div class="featured-item-content">
				<h3><?php the_title(); ?></h3>
				<p><?php the_content(); ?></p>
			</div>    
		</div>
		<?php endif;
	endwhile;
	wp_reset_postdata();
}

function get_latest_news() {
	$args = array( 'post_type' => 'post',
				   'order' => 'DESC',
				   'orderby' => 'post_date',
				   'posts_per_page' => 5,
                   'tax_query' => array(
				      array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'news'
                        )
                    ));
	$loop = new WP_Query( $args ); ?>
    <ul>
        <?php 
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
        <?php endwhile; 
        wp_reset_postdata(); ?>
        <li><a href="<?php bloginfo('url') ?>/press/news">View All News Articles</a></li>
    </ul>
    <?php
}

function get_latest_press() {
	$args = array(  'post_type' => 'post',
					'order' => 'DESC',
					'orderby' => 'post_date',
					'posts_per_page' => 5,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'press-releases'
                        )
                    )
                );
	$loop = new WP_Query( $args ) ?>
    <ul>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
        <?php endwhile; wp_reset_postdata(); ?>
        <li><a href="<?php bloginfo('url') ?>/press/press-releases">View All Press Releases</a></li>
    </ul>
    <?php
}
?>