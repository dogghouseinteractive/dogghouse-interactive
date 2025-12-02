<?php global $block_count; ?>

<?php $background_color_toggle = get_sub_field('background_color_toggle'); ?>
<?php $text_color_toggle = get_sub_field('text_color_toggle'); ?>
<?php $layout_toggle = get_sub_field('layout_toggle'); ?>
<?php $image_id = get_sub_field('image'); ?>
<?php $full_bleed_image = get_sub_field('full-bleed_image'); ?>
<?php $image_src = wp_get_attachment_image_src( $image_id, 'image_content_block' ); ?>
<?php $heading = get_sub_field('heading'); ?>
<?php $sub_heading = get_sub_field('sub-heading'); ?>
<?php $content = get_sub_field('content'); ?>

<section id="block-<?php echo $block_count; ?>" class="image-and-content background-<?php echo $background_color_toggle; ?> text-<?php echo $text_color_toggle; ?> <?php echo $layout_toggle; ?>">
	<?php if(!$full_bleed_image || $full_bleed_image[0] != 'full-bleed') { ?>
		<div class="container">
	<?php } ?>
		<div class="block-image lazy <?php if($layout_toggle == 'image-left') { echo 'slide-in-left'; } else { echo 'slide-in-right'; } ?>" style="background-image: url(<?php echo $image_src[0]; ?>);"></div>
		<div class="block-content lazy delay-one-quarter fade-in">
			<div class="container">
				<?php if($heading) { ?>
					<h2><?php echo $heading; ?></h2>
				<?php } ?>
				<?php if($sub_heading) { ?>
					<h3><?php echo $sub_heading; ?></h3>
				<?php } ?>
				<?php if($content) { ?>
					<?php echo $content; ?>
				<?php } ?>
				<?php if(have_rows('buttons')) { ?>
					<div class="button-container">
						<?php while(have_rows('buttons')) { ?>
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
		</div>
		<div class="clear"></div>
	<?php if($full_bleed_image != 'full-bleed') { ?>
		</div>
	<?php } ?>
</section>