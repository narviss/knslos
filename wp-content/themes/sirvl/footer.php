		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="no-padding">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) :
				?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'sirvl' ); ?>">
						<?php
							wp_nav_menu([
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . sirvl_get_svg( array( 'icon' => 'chain' ) ),
							]);
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>
			</div><!-- .no-padding -->

			<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
