<?php 
global $block_count; 
$block_count = 1;

if(have_rows('flexible_content_blocks')) {  
	while(have_rows('flexible_content_blocks')) {
		the_row();
    if(get_row_layout() == 'hero_slider_block' ) {
    	get_template_part( 'blocks/hero-slider' );
		} elseif(get_row_layout() == 'image_and_content_block' ) {
      get_template_part( 'blocks/image-and-content' );
		} elseif(get_row_layout() == 'columnized_content_block' ) {
      get_template_part( 'blocks/columnized-content-block' );
		} elseif(get_row_layout() == 'full-width_text_block' ) {
      get_template_part( 'blocks/full-width-text' );
		} elseif(get_row_layout() == 'half-width_block' ) {
      get_template_part( 'blocks/half-width' );
		} elseif(get_row_layout() == 'recent_downloads_block' ) {
      get_template_part( 'blocks/recent-downloads' );
		} elseif(get_row_layout() == 'recent_posts_block' ) {
      get_template_part( 'blocks/recent_posts_block' );
		}
		$block_count++;
	}
} ?>

<div class="clear"></div>