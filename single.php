<?php
/**
 * The template for displaying a single Post.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header(); ?>

	<div class="content">
    	<article class="article">
    		<p class="article-date"><?php the_time('M jS, Y') ?></p>
    		<h1><?php the_title(); ?></h1>
			<?php if ( have_posts() ) : ?>
				<?php /* The loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
		</article>
	</div><!-- #content -->
    
<?php get_footer(); ?>