<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Burger21
 * @since Burger21 1.0
 */

get_header(); ?>

	<div class="content">
    	<h1 class="title"><?php wp_title('',true); ?></h1>
            <?php if ( have_posts() ) : ?>
                <?php /* The loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="article-short">
                        <p class="article-date"><?php the_time('M jS, Y') ?></p>
                        <h2 class="article-title">
                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="more">Read More</a>
                    </article>
                    
                <?php endwhile; ?>
            <?php endif; ?>
	</div><!-- content -->
    
<?php get_footer(); ?>