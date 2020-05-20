<?php

/**
 * Renders the `sirvl/latest-posts` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with latest posts added.
 */
function sirvl_render_block_latest_posts( $attributes ) {
	$args = array(
		'posts_per_page'   => $attributes['postsToShow'],
		'post_status'      => 'publish',
		'order'            => $attributes['order'],
		'orderby'          => $attributes['orderBy'],
		'suppress_filters' => false,
	);

	if ( isset( $attributes['categories'] ) ) {
		$args['category'] = $attributes['categories'];
	}

	$recent_posts = get_posts( $args );

	$list_items_markup = '';

	$excerpt_length = $attributes['excerptLength'];

	foreach ($recent_posts as $post) {
		$list_items_markup .= sprintf(
			'<li class="slider__item"><a href="%1$s"',
			esc_url( get_permalink( $post ) )
		);

		if (has_post_thumbnail($post)) {
			$list_items_markup .= sprintf(
				' style="background-image: url(%1$s);"',
				get_the_post_thumbnail_url($post)
			);
			// $list_items_markup .= get_the_post_thumbnail($post);
		}

		$list_items_markup .= '><span>';

		if ( isset( $attributes['displayPostDate'] ) && $attributes['displayPostDate'] ) {
			$list_items_markup .= sprintf(
				'<time datetime="%1$s" class="wp-block-latest-posts__post-date">%2$s</time>',
				esc_attr( get_the_date( 'c', $post ) ),
				esc_html( get_the_date( '', $post ) )
			);
		}

		$title = get_the_title( $post );
		if (!$title) {
			$title = __('(no title)');
		}
		$list_items_markup .= sprintf(
			'<div class="btn-play"></div><span class="post-title">%1$s</span>',
			esc_html( $title )
		);

		$list_items_markup .= '</span>';

		if ( isset( $attributes['displayPostContent'] ) && $attributes['displayPostContent']
		 && isset( $attributes['displayPostContentRadio'] ) && 'excerpt' === $attributes['displayPostContentRadio'] ) {
			$post_excerpt = $post->post_excerpt;
			if ( ! ( $post_excerpt ) ) {
				$post_excerpt = $post->post_content;
			}
			$trimmed_excerpt = esc_html( wp_trim_words( $post_excerpt, $excerpt_length, ' &hellip; ' ) );

			$list_items_markup .= sprintf(
				'<div class="wp-block-latest-posts__post-excerpt">%1$s</div>',
				$trimmed_excerpt
			);

			// if ( strpos( $trimmed_excerpt, ' &hellip; ' ) !== false )
		}

		$list_items_markup .= sprintf(
			'<div class="read-more"><span>%1$s</span></div>',
			__( 'Read more' )
		);

		if ( isset( $attributes['displayPostContent'] ) && $attributes['displayPostContent']
		 && isset( $attributes['displayPostContentRadio'] ) && 'full_post' === $attributes['displayPostContentRadio'] ) {
			$list_items_markup .= sprintf(
				'<div class="wp-block-latest-posts__post-full-content">%1$s</div>',
				wp_kses_post( html_entity_decode( $post->post_content, ENT_QUOTES, get_option( 'blog_charset' ) ) )
			);
		}
		$list_items_markup .= "</a></li>\n";
	}

	$class = 'wp-block-latest-posts wp-block-latest-posts__list';
	if ( isset( $attributes['align'] ) ) {
		$class .= ' align' . $attributes['align'];
	}

	if ( isset( $attributes['postLayout'] ) && 'grid' === $attributes['postLayout'] ) {
		$class .= ' is-grid';
	}

	if ( isset( $attributes['columns'] ) && 'grid' === $attributes['postLayout'] ) {
		$class .= ' columns-4';// . $attributes['columns'];
	}

	if ( isset( $attributes['displayPostDate'] ) && $attributes['displayPostDate'] ) {
		$class .= ' has-dates';
	}

	if ( isset( $attributes['className'] ) ) {
		$class .= ' ' . $attributes['className'];
	}

	return sprintf(
		'<div class="%1$s slider-responsive"><ol>%2$s</ol></div>',
		esc_attr( $class ),
		$list_items_markup
	);
}

/**
 * Registers the `sirvl/latest-posts` block on server.
 */
function sirvl_register_block_latest_posts() {
	register_block_type(
		'core/latest-posts',
		array(
			'attributes'      => array(
				'align'                   => array(
					'type' => 'string',
					'enum' => array( 'left', 'center', 'right', 'wide', 'full' ),
				),
				'className'               => array(
					'type' => 'string',
				),
				'categories'              => array(
					'type' => 'string',
				),
				'postsToShow'             => array(
					'type'    => 'number',
					'default' => 5,
				),
				'displayPostContent'      => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'displayPostContentRadio' => array(
					'type'    => 'string',
					'default' => 'excerpt',
				),
				'excerptLength'           => array(
					'type'    => 'number',
					'default' => 55,
				),
				'displayPostDate'         => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'postLayout'              => array(
					'type'    => 'string',
					'default' => 'list',
				),
				'columns'                 => array(
					'type'    => 'number',
					'default' => 3,
				),
				'order'                   => array(
					'type'    => 'string',
					'default' => 'desc',
				),
				'orderBy'                 => array(
					'type'    => 'string',
					'default' => 'date',
				),
			),
			'render_callback' => 'sirvl_render_block_latest_posts',
		)
	);
}
add_action( 'init', 'sirvl_register_block_latest_posts' );