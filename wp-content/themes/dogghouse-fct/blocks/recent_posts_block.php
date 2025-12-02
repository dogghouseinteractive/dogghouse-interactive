<?php
	$post_limit = get_sub_field('post_limit');
	$posts_block_title = get_sub_field('posts_block_title');
	if($post_limit) {
		$post_limit = $post_limit;
	} else {
		$post_limit = '4';
	}
?>

<?php global $block_count; ?>
<section id="block-<?php echo $block_count; ?>" class="posts-callout">
    <div class="container">
		<h2 class="lazy fade-in-left"><?php echo $posts_block_title; ?></h2>
    </div>
	<?php 
	//$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $post_limit,
		//'post__in' => get_option( 'sticky_posts' ),
		//'paged' => $paged,
		//'tax_query' => $tax_query,
	);
	$wp_query = new WP_Query($args);
	if ( $wp_query->have_posts() ) {
		$direction = 'left'; ?>
		
		<div id="recent-posts-left"></div>
		<div id="recent-posts-right"></div>
		<div id="recent-posts">	
		
		<?php while ( $wp_query->have_posts() ) {
			$wp_query->the_post(); ?>
			<?php $category = get_the_category(); ?>
			<?php $the_category = $category[0]->slug; ?>

			<div class="post <?php echo $category[0]->slug; ?> <?php if(has_post_thumbnail()) { echo 'has-image'; } else { echo 'no-image'; } ?> lazy<?php if($direction == 'right') { ?> delay-one-half<?php } ?> slide-in-<?php echo $direction; ?>">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php $post_thumbnail_url = get_the_post_thumbnail_url(); ?>
					<?php if(empty($post_thumbnail_url)) {
						$post_thumbnail_url = 'http://placehold.it/960x540';
					} ?>
					<div class="post-featured-image" style="background: url(<?php echo $post_thumbnail_url; ?>) center center no-repeat;">
					</div>
				<?php } ?>
				<div class="category <?php echo $the_category; ?>">
					<a href="<?php echo get_category_link( $category[0]->term_id ); ?>">
						<?php echo $category[0]->name; ?>
					</a>
				</div>
				<div class="container">
					<div class="post-content <?php if(has_post_thumbnail()) { echo 'has-image'; } else { echo 'no-image'; } ?>">
						<?php if(empty(has_post_thumbnail())) { ?>
							<div class="post-date">
								<?php echo get_the_date('m.d.y'); ?>
							</div>
						<?php } ?>
						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a> 					<?php if(has_post_thumbnail()) { ?>
							<span>| </span><span class="post-date"><?php echo get_the_date('m.d.y'); ?></span>
						<?php } ?></h2>
						<div class="post-excerpt">
							<?php the_excerpt(); ?>
						</div>
						<a class="button" href="<?php echo get_the_permalink(); ?>">Read More</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php if($direction == 'left') {
				$direction = 'right';
			} else {
				$direction = 'left';
			} ?>
		<?php } ?>
		</div>
		<div class="clear"></div>
		<div class="read-more">
			<a class="button" href="/blog">See More</a>
		</div>
	<?php }
	wp_reset_query(); ?>
	<div class="clear"></div>
</section> <!-- .posts-callout -->
<div class="clear"></div>

<script type="text/javascript">
	jQuery('.post.slide-in-left').each(function() {
		jQuery(this).clone().appendTo('#recent-posts-left');
	});
	jQuery('.post.slide-in-right').each(function() {
		jQuery(this).clone().appendTo('#recent-posts-right');
	});
	jQuery('#recent-posts').empty();	
</script>