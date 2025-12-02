<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php while(have_posts()) { ?>
		<?php the_post(); ?>
		<?php get_template_part('blocks/flexible-content'); ?>
		<?php if(!empty(get_the_content())) { ?>
			<div class="container">
				<?php the_content(); ?>
			</div>
		<?php } ?>
	<?php } ?>
</main><!-- #main -->

<?php get_footer();
