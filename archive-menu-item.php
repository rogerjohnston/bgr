<?php
/**
 * The template for displaying the Menu page.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header(); ?>

	<div class="content">
    	<h1 class="title">Menu</h1>
        <nav id="menu-navigation">
        	<span class="menu-nav">
        	<?php 
			// Menu navigation
			$menuParameters = array('theme_location' => 'menu-page' ,'container' => false,'echo' => false,'items_wrap' => '%3$s', 'depth' => 0,);
			echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>	
        	</span>
        </nav>        
        <div class="menu-items">
			<?php
            // Get menu items
            $menu_terms = get_terms('menu-category', 'orderby=none&hide_empty');
            foreach ($menu_terms as $term): ?>
            <div class="section <?php echo $term->slug ?>"> 
                <h2>
                    <a id="<?php echo $term->slug ?>" class="anchor"></a>
                    <?php echo $term->name ?>
                </h2>
                
                <?php if (isset($term->description)): ?>
                    <p class="section-desc"><?php echo $term->description ?></p>
                <?php endif; ?>  
                
                <?php // Start talking burgers 
                
                if ($term->slug == "beef-burgers"): ?>
                    <div class="talking-beef-burger">
                        <div class="beef-burger-thought">
                            <p>I don't appreciate you looking at me like I am a piece of meat.</p>
                        </div>
                        <img src="<?php bloginfo('template_directory')?>/images/textmex-2.jpg" class="beef-burger" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Beef Burger']);"/>
                    </div>
                <?php endif; ?>
                
                <?php if ($term->slug == "chicken-burgers"): ?>
                    <div class="talking-chicken-burger">
                        <div class="chicken-burger-thought">
                            <p>Check out my crumbles.</p>
                        </div>
                        <img src="<?php bloginfo('template_directory')?>/images/buffalo-chicken-burger-2.jpg" class="chicken-burger" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Chicken Burger']);"/>
                    </div>
                <?php endif; ?>
                
                <?php if ($term->slug == "seafood-burgers"): ?>
                    <div class="talking-seafood-burger">
                        <div class="seafood-burger-thought">
                            <p>Other burgers aspire to my greatness.</p>
                        </div>
                        <img src="<?php bloginfo('template_directory')?>/images/the-ahi-tuna-burger-2.jpg" class="seafood-burger" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Seafood Burger']);"/>
                    </div>
                <?php endif; ?>
                
                <?php if ($term->slug == "turkey-burgers"): ?>
                    <div class="talking-turkey-burger">
                        <div class="turkey-burger-thought">
                            <p>I'm The Skinny and I know it.</p>
                        </div>
                        <img src="<?php bloginfo('template_directory')?>/images/the-skinny-turkey-burger-2.jpg" class="turkey-burger" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Turkey Burger']);"/>
                    </div>
                <?php endif; ?>
                
                <?php if ($term->slug == "slider-4-packs"): ?>
                    <div class="talking-slider-4-packs">
                        <div class="slider-4-packs-thought">
                            <p>Whoa! Am I seeing quadruple?</p>
                        </div>
                        <img src="<?php bloginfo('template_directory')?>/images/bacon-cheesy-4-pack-2.jpg" class="slider-4-pack" onClick="_gaq.push(['_trackEvent', 'Talking Burgers', 'Sliders']);"/>
                    </div>
                <?php endif; 
                // End talking burgers ?>
                
                <?php
                $args = array( 'post_type' => 'menu-item', 'order' => 'ASC','orderby' => 'menu_order','tax_query' => array(array('taxonomy' => 'menu-category','field' => 'slug','terms' => $term->slug)));
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="item <?php echo $post->post_name ?>">
                        <h3><?php get_the_title() ?></h3>
                        <div class="menu-item-desc">
                            <?php the_content() ?>
                         </div>
                    </div>
                    
                <?php endwhile;
                wp_reset_postdata() ?>
                <p class="clear"></p>
            </div>
            <hr/>
            <?php endforeach; ?>
    	</div>
	</div><!-- #content -->
    
<?php get_footer(); ?>