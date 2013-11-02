<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Burger 21
 * @since Burger 21 1.0
 */

get_header(); ?>

	<div class="content press-room">
    	<h1 class="title"><?php wp_title('',true); ?></h1>
        <div class="media-inquires">
        	<p>For media inquiries, please email <a href="mailto:pr@burger21.com">pr@burger21.com</a>.</p>
        </div>
        <div class="in-the-news">
        	<h2>Burger 21 In The News</h2>
            <?php get_latest_news() ?>
                
        </div>
        
        <div class="press-releases">
        	<h2>Latest Press Releases</h2>
            <?php get_latest_press() ?>
                
        </div>
        
        <div class="resources">
        	<h2>Other Resources</h2>
            <ul>
            <?php 
			$menuParameters = array('theme_location' => 'press-room' ,'container' => false,'echo' => false,'items_wrap' => '%3$s', 'depth' => 0,);
			echo wp_nav_menu( $menuParameters );
			?>
            </ul>
        </div>

	</div><!-- #content -->
    
<?php get_footer(); ?>