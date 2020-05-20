<?php

global $sirvlcounter;

?>

<article id="panel<?php echo $sirvlcounter + 2; ?>" <?php post_class( 'sirvl-panel ' ); ?> >

	<?php
	if ( has_post_thumbnail() ) :
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

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' ) ) :
				?>

				<?php
				// Show three most recent posts.
				$recent_posts = new WP_Query(
					array(
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					)
				);
				?>

				<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
		<table class="side-navigation">
			<?php for ($i = 1; $i <= sirvl_panel_count() + 2; $i++):?>
				<tr class="side-navigation-item-wrapper">
					<?php if ($i == $sirvlcounter + 2): ?>
						<?php the_title( '<td class="side-navigation-caption">', '</td>' ); ?>
					<?php else: ?>
						<td></td>
					<?php endif; ?>
					<td class="side-navigation-item <?php echo $i == $sirvlcounter + 2 ? 'selected' : ''; ?>">
						<a href="#panel<?php echo $i == $sirvlcounter + 2 ? '' : $i; ?>">
							<span class="zero">0</span>
							<span class="index"><?php echo $i; ?></span>
						</a>
					</td>
				</tr>
			<?php endfor; ?>
		</table>
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
