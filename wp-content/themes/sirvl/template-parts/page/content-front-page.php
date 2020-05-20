<article id="panel2" <?php post_class( 'sirvl-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sirvl-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
	?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<?php sirvl_edit_link( get_the_ID() ); ?>
		<div class="wrap">
			<?php /*
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<?php sirvl_edit_link( get_the_ID() ); ?>
			</header><!-- .entry-header -->
			*/?>
			<div class="entry-content">
				<?php
					the_content(
						sprintf(
							/* translators: %s: Post title. */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sirvl' ),
							get_the_title()
						)
					);
					?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
		<table class="side-navigation">
			<?php for ($i = 1; $i <= sirvl_panel_count() + 2; $i++):?>
				<tr class="side-navigation-item-wrapper">
					<?php if ($i == 2): ?>
						<?php the_title( '<td class="side-navigation-caption">', '</td>' ); ?>
					<?php else: ?>
						<td></td>
					<?php endif; ?>
					<td class="side-navigation-item <?php echo $i == 2 ? 'selected' : ''; ?>">
						<a href="#panel<?php echo $i == 2 ? '' : $i; ?>">
							<span class="zero">0</span>
							<span class="index"><?php echo $i; ?></span>
						</a>
					</td>
				</tr>
			<?php endfor; ?>
		</table>
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
