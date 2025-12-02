<?php global $block_count; ?>

<?php $image_placement_toggle = get_sub_field('images_placement_toggle'); ?>
<?php $left_column_image_id = get_sub_field('left_column_image'); ?>
<?php $left_column_image_src = wp_get_attachment_image_src( $left_column_image_id, 'half_width_block' ); ?>
<?php $left_column_content = get_sub_field('left_column_content'); ?>
<?php $right_column_image_id = get_sub_field('right_column_image'); ?>
<?php $right_column_image_src = wp_get_attachment_image_src( $right_column_image_id, 'half_width_block' ); ?>
<?php $right_column_content = get_sub_field('right_column_content'); ?>

<section id="block-<?php echo $block_count; ?>" class="half-width <?php echo $image_placement_toggle; ?>">
	<div class="block-left lazy slide-in-left background-primary text-white"<?php if($image_placement_toggle == 'bg-images' && $left_column_image_src) { ?> style="background-image: url(<?php echo $left_column_image_src[0]; ?>);"<?php } ?>>
		<?php if($image_placement_toggle == 'images-above' && $left_column_image_src) { ?>
			<div class="block-image" style="background-image: url(<?php echo $left_column_image_src[0]; ?>);"></div>
		<?php } ?>
		<?php if($left_column_content) { ?>
			<div class="container">
				<div class="block-content">
					<?php echo $left_column_content; ?>
					<?php if(have_rows('left_column_buttons')) { ?>
						<div class="button-container">
							<?php while(have_rows('left_column_buttons')) { ?>
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
		<?php } ?>
	</div>
	<div class="block-right lazy slide-in-right delay-one-quarter background-secondary text-white"<?php if($image_placement_toggle == 'bg-images' && $right_column_image_src) { ?> style="background-image: url(<?php echo $right_column_image_src[0]; ?>);"<?php } ?>>
		<?php if($image_placement_toggle == 'images-above' && $right_column_image_src) { ?>
			<div class="block-image" style="background-image: url(<?php echo $right_column_image_src[0]; ?>);"></div>
		<?php } ?>
		<?php if($right_column_content) { ?>
			<div class="container">
				<div class="block-content">
					<?php echo $right_column_content; ?>
					<?php if(have_rows('right_column_buttons')) { ?>
						<div class="button-container">
							<?php while(have_rows('right_column_buttons')) { ?>
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
		<?php } ?>
	</div>
	<div class="clear"></div>
</section>