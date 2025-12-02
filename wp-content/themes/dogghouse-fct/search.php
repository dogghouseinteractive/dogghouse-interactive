<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="page-content">
			<div class="container">
				<div class="page-header">
					<?php if ( have_posts() ) : ?>
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dogghouse_fct' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php else : ?>
						<h1 class="page-title"><?php _e( 'Nothing Found', 'dogghouse_fct' ); ?></h1>
					<?php endif; ?>
				</div><!-- .page-header -->
				<?php if ( have_posts() ) {
					while ( have_posts() ) { 
						the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
					echo dogghouse_fct_time_link();
					dogghouse_fct_edit_link();
				?>
			</div><!-- .entry-meta -->
		<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
			<div class="entry-meta">
				<?php dogghouse_fct_edit_link(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_front_page() && ! is_home() ) {

			// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		} ?>
	</div><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->


					<?php }

					the_posts_pagination( array(
						'prev_text' => dogghouse_fct_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'dogghouse_fct' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'dogghouse_fct' ) . '</span>' . dogghouse_fct_get_svg( array( 'icon' => 'arrow-right' ) ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dogghouse_fct' ) . ' </span>',
					) );

				} else { ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dogghouse_fct' ); ?></p>
					<?php
						get_search_form();

				} ?>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer();
