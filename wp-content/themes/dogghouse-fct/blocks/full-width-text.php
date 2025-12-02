<?php global $block_count; ?>

<?php $background_image = get_sub_field('background_image'); ?>
<?php $background_color_toggle = get_sub_field('background_color_toggle'); ?>
<?php $text_color_toggle = get_sub_field('text_color_toggle'); ?>
<?php $text_align_toggle = get_sub_field('text_align_toggle'); ?>
<?php $content = get_sub_field('content'); ?>

<section id="block-<?php echo $block_count; ?>" class="full-width-text background-<?php echo $background_color_toggle; ?> text-<?php echo $text_color_toggle; ?><?php if($background_image) { ?> has-background-image<?php } ?><?php if($text_align_toggle) { ?> text-<?php echo $text_align_toggle; ?><?php } ?>"<?php if($background_image) { ?> style="background-image: url(<?php echo wp_get_attachment_image_src($background_image, 'full_hd')[0]; ?>);"<?php } ?>>
	<div class="container">
		<div class="block-content lazy zoom-in">
			<?php echo $content; ?>
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
</section>