<div id="hamburger-toggle-menu">
	<div class="container">
		<?php if ( has_nav_menu( 'top' ) ) {
			wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'menu-toggle-container', 'menu_id' => 'toggle-nav' ) ); 
		} else { ?>
			<nav id="toggle-nav">
				<div class="menu-toggle-container">
					<ul>
						<li><a href="<?php echo home_url(); ?>">Home</a></li>
					</ul>
				</div>
			</nav>
		<?php } ?>
	</div><!-- .container -->
</div>