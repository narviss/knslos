<div class="site-info">
	<div class="wrap">
		<div>
			<img style="max-height:48px" src="<?php echo get_parent_theme_file_uri('/assets/images/logo.png') ?>" />    
		</div>
		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		// printf( __( 'Proudly powered by %s', 'sirvl' ), 'WordPress' );
		?>
		<div style="color: white;margin-top:12px">
			<span>© <?php echo date('Y'); ?> Современные инженерные решения</span>
		</div>
	</div>
</div><!-- .site-info -->
