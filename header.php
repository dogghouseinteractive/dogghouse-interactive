<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<?php $hide_primary_nav = (get_field('hide_top_primary_nav', 'option') ? get_field('hide_top_primary_nav', 'option')[0] : ''); ?>
<?php $left_nav_expanded = (get_field('expand_left_primary_menu_by_default', 'option') ? get_field('expand_left_primary_menu_by_default', 'option')[0] : ''); ?>
<body <?php body_class(); ?>>
<header class="site-header" role="banner">
	<div class="container">
		<?php $custom_logo = get_custom_logo(); ?>
		<div id="hamburger"<?php if($left_nav_expanded == 'expand') { echo ' class="clicked"'; } ?>>
			<div class="top-bun fadeIn"></div>
			<div class="patty fadeIn"></div>
			<div class="bottom-bun fadeIn"></div>
		</div>
		<div id="logo" class="fadeIn extra-slow">
			<?php if(!empty($custom_logo)) { 
				 echo $custom_logo;
			} else { ?>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
				</a>
			<?php } ?>
		</div>
		<div id="primary-nav-container"<?php if($hide_primary_nav == 'no-show') { echo ' class="no-show"'; } ?>>
			<nav id="primary-nav">
				<?php if ( has_nav_menu( 'top' ) ) {
					wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); 
				} else { ?>
					<nav id="primary-nav">
						<div class="menu-primary-navigation-container">
							<ul>
								<li><a href="<?php echo home_url(); ?>">Home</a></li>
							</ul>
						</div>
					</nav>
				<?php } ?>
			</nav>
			<div class="clear"></div>
		</div> <!-- #primary-nav-container -->
		<div class="clear"></div>
	</div>
	<?php get_template_part('template-parts/hamburger', 'toggle'); ?>
</header>