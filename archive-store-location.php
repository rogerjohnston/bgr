<?php
/**
 * The template for displaying the Locations page.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header(); ?>

	<div class="content">
    	<h1 class="title">Locations</h1>
    	<?php echo do_shortcode('[SLPLUS]'); ?>
        
        <?php
		$terms = get_terms("location-states");
		$count = count($terms);
		$rows = floor($count / 3);
		if ( $count > 0 ): ?>
			<div class="locations-by-state">
            	<h2>Locations by State</h2>
            	<?php
				$i=1;
		 		foreach ( $terms as $term ):
					$state = $term->name;
					?>
                    <?php if( $i == 1 || $i == $rows+1 || $i == $rows*2+1): ?> <div class="col"><?php endif; ?>
                        <h3><?php echo $term->name ?></h3>
                        <ul>
                        <?php
                        global $post;
                        $args = array('location-states' => $state,'post_type' => 'store-location','orderby' => 'post_title','order' => 'ASC','posts_per_page'   => 999);
                        $locations = get_posts( $args );
                        foreach ( $locations as  $post ):
                            setup_postdata( $post ); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                       
                        <?php endforeach; ?>
                        </ul>
					<?php
					wp_reset_postdata();
					if( $i == $rows || $i == $rows*2 || $i == $rows*3): ?></div>
				<?php endif;
		 		$i++;
				endforeach; ?>
                <p class="clear"></p>
				</div>
		<?php endif; ?>
        
        
	</div><!-- content -->
    
<?php get_footer(); ?>