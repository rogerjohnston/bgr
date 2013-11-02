<?php
/**
 * The template for displaying the Homepage.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */
?>
<?php get_header(); ?>

        <div class="slider">
        	<?php echo do_shortcode('[layerslider id="1"]'); ?>
        </div>
        <div class="home-boxes">
            <div class="box-wrapper box1">
                <div class="box ">
                	<?php dynamic_sidebar( 'home-left-block' ); ?>
                </div>
            </div>
            <div class="box-wrapper box2">    
                <div class="box">
                	<?php dynamic_sidebar( 'home-center-block' ); ?>
                </div>
           </div>     
           <div class="box-wrapper box3">     
                <div class="box">
					<?php dynamic_sidebar( 'home-right-block' ); ?>
                </div>
            </div>
        </div>
           
<?php get_footer(); ?>         