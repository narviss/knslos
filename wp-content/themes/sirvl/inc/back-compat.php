<?php

/**
 * Prevent switching to Twenty Seventeen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Twenty Seventeen 1.0
 */
function sirvl_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'sirvl_upgrade_notice' );
}
add_action( 'after_switch_theme', 'sirvl_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Twenty Seventeen on WordPress versions prior to 4.7.
 *
 * @since Twenty Seventeen 1.0
 *
 * @global string $wp_version WordPress version.
 */
function sirvl_upgrade_notice() {
	/* translators: %s: The current WordPress version. */
	$message = sprintf( __( 'Twenty Seventeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'sirvl' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Twenty Seventeen 1.0
 *
 * @global string $wp_version WordPress version.
 */
function sirvl_customize() {
	wp_die(
		/* translators: %s: The current WordPress version. */
		sprintf( __( 'Twenty Seventeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'sirvl' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'sirvl_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Twenty Seventeen 1.0
 *
 * @global string $wp_version WordPress version.
 */
function sirvl_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current WordPress version. */
		wp_die( sprintf( __( 'Twenty Seventeen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'sirvl' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'sirvl_preview' );
