<?php
/**
 * The template for displaying the single Store Location.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header();
error_reporting(E_ALL);ini_set('display_errors', 1);
?>

    <?php if ( have_posts() ) : ?>
        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php 		 
				// Get Meet Us Data
				$meet_us_display = rwmb_meta( 'b_meet-us-display');
				$meet_us_name = rwmb_meta( 'b_meet-us-name');
				$meet_us_title = rwmb_meta( 'b_meet-us-title');
				$meet_us_message = rwmb_meta( 'b_meet-us-message');
            ?>                    

        <div class="location-header" itemscope itemtype="http://schema.org/Restaurant">
        	<span itemprop="name" style="display:none;">Burger 21</span>
            <div class="location-map">
                <img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo get_store_details('map_address') ?>&zoom=12&size=145x145&markers=<?php echo get_store_details('map_address') ?>&sensor=false&scale=2" width="145" height="145" />
            </div>
            <?php
				// Get location standard menu
				$standard_menu = rwmb_meta( 'b_standard_menu', 'type=file');
				if($standard_menu):
					foreach ( $standard_menu as $info ): 
						$standard_menu_url = $info['url'];
					endforeach;
				endif;
				
				// Get location gluten-free menu
				$gf_menu = rwmb_meta( 'b_gf_menu', 'type=file');
				if($gf_menu):
					foreach ($gf_menu as $gf_info ): 
						$gf_menu_url = $gf_info['url'];
					endforeach;
				endif;
				
				// Get location party platter menu
				$pp_menu = rwmb_meta( 'b_pp_menu', 'type=file');
				if($pp_menu):
					foreach ( $pp_menu as $pp_info ): 
						$pp_menu_url = $pp_info['url']; 
					endforeach;	
				endif;
				
				// Get location meet us thumbnail image
				$files = get_post_meta( get_the_ID(), 'b_meet-us-image', false );
				if($files):
					foreach ( $files as $att ):
						$meet_us_image = wp_get_attachment_image( $att ,'event-thumb');
					endforeach;
				endif;
			?>
            <div class="location-details">
                <h1><?php the_title(); ?></h1>
                    <div class="location-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span class="loc-address" itemprop="streetAddress"><?php echo get_store_details('address') ?></span>
                        <span class="loc-city"><span itemprop="addressLocality"><?php echo get_store_details('city') ?></span>, <span itemprop="addressRegion"><?php echo get_store_details('state') ?></span> <span itemprop="postalCode"><?php echo get_store_details('zip') ?></span></span>
                        <span class="loc-phone-title">Phone:</span>
                        <span class="loc-phone" itemprop="telephone"><?php echo get_store_details('phone') ?></span>
                    </div>    
                	<div class="location-hours">
                    	<div class="hours"><meta itemprop="openingHours" content="<?php echo get_store_details('meta_hours') ?>"><?php echo get_store_details('hours') ?></div>
                    </div>
            	</div>
                <div class="location-options">
                    <span class="button get-directions"><a href="https://maps.google.com/maps?daddr=<?php echo get_store_details('map_address') ?>" target="_blank">Get Directions</a></span>
                     <span class="button order-now"><a href="https://burger21.hungerrush.com/" target="_blank">Order Now</a></span>
                    <?php if(isset($standard_menu_url)): ?>
                    	<span class="button dl-menu"><a href="<?php echo $standard_menu_url; ?>" target="_blank">Download Menu</a></span>
                    <?php endif; ?>
                    <?php if(isset($pp_menu_url)): ?>
                    <span class="button pp-menu"><a href="<?php echo $pp_menu_url; ?>" target="_blank">Party Platter Menu</a></span>
                    <?php endif; ?>
                    <?php if(isset($gf_menu_url)): ?>
                    <span class="button gf-menu"><a href="<?php echo $gf_menu_url; ?>" target="_blank">Gluten-Free Menu</a></span>
                    <?php endif; ?>
                   
                </div>
        	     
        </div>
        
    	<?php endwhile; ?>
	<?php endif;?>
    
	<div class="location-content">
    
    	<div class="location-content-left">
            <div class="location-events">
                <h2>Specials &amp Events</h2>
                <span class="b21-icon"></span>
            	<?php get_store_events(); ?>
            </div>
        
        </div><!-- .location-content-left -->
        <div class="location-content-right">
        	<div class="talking-burger">
            	<div class="burger-thought">I can feel you looking at me.</div>
            	<img src="<?php bloginfo('template_directory')?>/images/bacon-cheesy-burger.png" class="store-burger" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Location Burger']);"/>
            </div>
            <div class="featured-items">
                <div class="featured-items-container">
                    <h2>Featured Burger &amp Shake</h2>
                    <span class="b21-icon"></span>
                	<?php echo get_store_featured_menu() ?>
                </div>
            </div>
		</div><!-- .location-content-right -->
         
        
        <div class="charities-container">
        	<h2>Charity of the Month</h2>
            <span class="b21-icon"></span>
            <div class="charities">
            	<p>Burger 21 has donated over $25,000 to local charities since our opening. On the 21st of each month we donate a portion of our sales to our charity partner of the month.</p>
                <div class="featured-charity">
                <?php $featured_charity = get_store_charity('featured'); ?>
                <?php if(!$featured_charity): ?>
                	<p>See store for this months featured charity!</p>
                <?php else: ?>
                	<p>Join us on <?php echo get_store_charity('month') ?> 21 as we donate 10% of our sales to</p>
					<h3><?php echo $featured_charity ?></h3>
                <?php endif;?>    
                </div>
                <?php $past_charities = get_store_charity('past'); ?>
                <?php if($past_charities): ?>
                <p class="charity-list-title">Burger 21 has supported the following organizations as our Charity of the Month</p>
                <div class="charity-list">
                	<?php echo get_store_charity('past'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if($meet_us_display == 1): ?>
        <div class="meet-us">
            <h2>Meet Us</h2>
            <span class="b21-icon"></span>
            <div class="meet-us-image"><?php echo $meet_us_image ?></div>
            <div class="meet-us-content">
                <h3><?php echo $meet_us_name ?></h3>
                <h4><?php echo $meet_us_title ?></h4>
                <p><?php echo $meet_us_message ?></p>
            </div>
        </div>
        <?php endif; ?>
        <p class="clear"></p>
	</div><!-- #content -->
    
<?php get_footer(); ?>