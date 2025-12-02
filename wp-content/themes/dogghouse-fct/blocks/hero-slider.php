<?php global $block_count; ?>
<section id="block-<?php echo $block_count; ?>" class="hero-slider">
	<?php if(have_rows('slides')) { ?>
		<?php $slide_count = 0; ?>
		<ul class="slider">
		<?php while(have_rows('slides')) { ?>
			<?php the_row('slides'); ?>
			<li class="slide">
				<?php $slide_type = get_sub_field('image_or_video'); ?>
				<?php $slide_heading = get_sub_field('slide_heading'); ?>
				<?php $slide_content = get_sub_field('slide_content'); ?>
				<?php if($slide_type == 'image') { ?>
					<?php $image_id = get_sub_field('image'); ?>
					<?php $image_src = wp_get_attachment_image_src( $image_id, 'hero_image' ); ?>
					<div class="slide-image" style="background-image: url(<?php echo $image_src[0]; ?>);"></div>
				<?php } else { ?>
					<?php	$video_id = get_sub_field('video_id'); ?>
					<?php $video_title = get_sub_field('video_title'); ?>
					<?php $video_fallback_image = (!empty(get_sub_field('video_fallback_image')) ? wp_get_attachmenet_image_src(get_sub_field('video_fallback_image'), 'full_hd')[0] : ''); ?>
					<?php $playlist_id = get_sub_field('video_playlist_id'); ?>
					<div class="slide-video">
						<?php if (!wp_is_mobile()) { ?>
							<div class="video-holder">
								<iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>?controls=0&amp;modestbranding=1&amp;autoplay=1&amp;list=<?php echo $playlist_id; ?>&amp;loop=1&amp;playsinline=1&amp;mute=1" title="<?php echo $video_title; ?>" frameborder="0" allow="autoplay"></iframe>
							</div>							
						<?php } else { ?>
							<div class="mobile-video-fallback-holder">
								<div class="mobile-video-fallback" style="background-image: url(<?php 	if($video_fallback_image) { echo $video_fallback_image; } else { echo 'https://img.youtube.com/vi/'.$video_id.'/maxresdefault.jpg'; } ?>);"></div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if($slide_heading || $slide_content) { ?>
					<div class="container">
						<?php if($slide_heading) { ?>
							<h1 class="slide-heading"><?php echo $slide_heading; ?></h1>
						<?php } ?>
						<?php if($slide_content) { ?>
							<div class="slide-content">
								<?php echo $slide_content; ?>
							</div>
						<?php } ?>
						<?php if(have_rows('slide_buttons')) { ?>
							<div class="button-container">
								<?php while(have_rows('slide_buttons')) { ?>
									<?php the_row(); ?>
									<?php $button_link = get_sub_field('button')['url']; ?>
									<?php $button_text = get_sub_field('button')['title']; ?>
									<?php $button_target = get_sub_field('button')['target']; ?>
									<a class="button" href="<?php echo $button_link; ?>" target="<?php echo $button_target; ?>">
										<?php echo $button_text; ?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</li> <!-- .slide -->
			<?php $slide_count++; ?>
    	<?php } ?>
		</ul>
	<?php } ?>
    <div class="clear"></div>
	<?php if($slide_count > 1) { ?>
		<div class="block-<?php echo $block_count; ?>-slider-prev"></div>
		<div class="block-<?php echo $block_count; ?>-slider-next"></div>
	<?php } ?>
</section>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#block-<?php echo $block_count; ?>.hero-slider .slider').cycle({
			timeout: 0,
			slides: '.slide',
			prev: '.block-<?php echo $block_count; ?>-slider-prev',
			next: '.block-<?php echo $block_count; ?>-slider-next',
		});
	});
	jQuery(document).on('cycle-initialized', function() {
		jQuery('.block-<?php echo $block_count; ?>-slider-prev, .block-<?php echo $block_count; ?>-slider-next').fadeIn(250);
	});
</script>