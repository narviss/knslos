<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'sirvl' ); ?>">
	<img style="max-height:48px" src="<?php echo get_parent_theme_file_uri('/assets/images/logo.png') ?>" />

	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo sirvl_get_svg([ 'icon' => 'bars' ]);
		echo sirvl_get_svg([ 'icon' => 'close' ]);
		?>
	</button>

	<div class="menu__wrapper">
		<?php
		wp_nav_menu([
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		]);
		?>
	</div>
<?php /*
	<?php if ( ( sirvl_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo sirvl_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'sirvl' ); ?></span></a>
	<?php endif; ?>
*/?>
</nav><!-- #site-navigation -->
