<?php if (is_active_sidebar('sidebar-2') || is_active_sidebar('sidebar-3')): ?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'sirvl' ); ?>">
		<?php if (is_active_sidebar('sidebar-2')): ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar('sidebar-2'); ?>
			</div>
		<?php endif; ?>
		<?php if (is_active_sidebar('sidebar-3')): ?>
			<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar('sidebar-3'); ?>
			</div>
		<?php endif; ?>
	</aside><!-- .widget-area -->

<?php endif; ?>
