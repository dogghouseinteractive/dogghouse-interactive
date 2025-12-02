<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<footer>
	<div class="container">
		<div class="footer-left site-info">
			<?php if(is_active_sidebar('sidebar-1')) { ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			<?php } ?>
			<div class="branding-info">
				<p>&copy; <?php echo date('Y'); ?>, <a href="<?php echo home_url(); ?>"><strong><?php echo get_bloginfo('name'); ?></strong></a></p>
				<p><?php echo get_bloginfo('description'); ?></p>
			</div>
		</div>
		<div class="footer-right">
			<?php if ( has_nav_menu( 'footer' ) ) { ?>
				<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Nav Menu', 'dogghouse_fct' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-nav-menu',
							'depth'          => 1,
							'link_before'    => '',
							'link_after'     => '',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php } ?>
			<?php if ( has_nav_menu( 'social' ) ) { ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'dogghouse_fct' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php } ?>
			<?php if(is_active_sidebar('sidebar-2')) { ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</footer>
	
<?php wp_footer(); ?>
<div class="clear"></div>
</body>
</html>
