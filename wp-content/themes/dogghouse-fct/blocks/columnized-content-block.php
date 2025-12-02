<?php global $block_count; ?>

<?php $column_count = get_sub_field('column_count'); ?>
<?php $background_color_toggle = get_sub_field('background_color_toggle'); ?>
<?php $background_image = get_sub_field('background_image'); ?>
<?php $text_color_toggle = get_sub_field('text_color_toggle'); ?>

<section id="block-<?php echo $block_count; ?>" class="columnized-cta background-<?php echo $background_color_toggle; ?> text-<?php echo $text_color_toggle; ?><?php if($background_image) { ?> has-background-image<?php } ?>"<?php if($background_image) { ?> style="background-image: url(<?php echo wp_get_attachment_image_src($background_image, 'full_hd')[0]; ?>);"<?php } ?>>
	<div class="container">
		<?php if(have_rows('columns')) { ?>
			<div class="columns columns-<?php echo $column_count; ?>">
				<?php while(have_rows('columns')) { ?>
					<?php the_row(); ?>
					<?php if(get_row_index() <= $column_count) { ?>
						<?php $delay = ''; ?>
						<?php if(get_row_index() == 1) {
							$delay = 'one-quarter';
						} else if(get_row_index() == 2) {
							$delay = 'one-half';
						} else if(get_row_index() == 3) {
							$delay = 'three-quarters';
						} else if(get_row_index() == 4) {
							$delay = 'one-second';
						}	?>
						<div class="column lazy fade-in delay-<?php echo $delay; ?>">
							<?php $column_image_icon = get_sub_field('column_image_icon'); ?>
							<?php $column_content = get_sub_field('column_content'); ?>
							<?php if($column_image_icon) { ?>
								<div class="column-image" style="background-image: url(<?php echo wp_get_attachment_image_src($column_image_icon, 'image_content_block')[0]; ?>);"></div>
							<?php } ?>
							<?php if($column_content) { ?>
								<div class="column-content">
									<?php echo $column_content; ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</section>