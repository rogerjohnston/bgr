<?php
/**
 * The template for displaying a single Event.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header(); ?>

	<div class="content">
    	<h1 class="title"><?php the_title(); ?></h1>
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- content -->
    
<?php get_footer(); ?>