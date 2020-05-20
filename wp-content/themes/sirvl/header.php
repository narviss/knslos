<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="overlay-video"></div>
<?php wp_body_open(); ?>
<div id="page" class="site" style="background:black">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sirvl' ); ?></a>

	<div class="popup-callback-wrapper">
		<div class="popup-callback">
			<span class="popup-close"><?php echo sirvl_get_svg([ 'icon' => 'close' ]); ?></span>
			<?php echo do_shortcode('[contact-form-7 id="525" title="Обратный звонок"]'); ?>
<!-- 
			<span class="popup-caption">Оставьте заявку</span>
			<span class="popup-text">Заполните формы и наш менеджер свяжется с Вами</span>
			<input type="text" placeholder="Имя" required />
			<input type="tel" placeholder="Телефон +7 (555) 555-55-55" pattern="[+]?[0-9]\s*[\(]{0,1}[0-9]{3}[\)]{0,1}\s*[0-9]{3}[-]{0,1}[0-9]{2}[-]{0,1}[0-9]{2}" required />
			<div class="popup-footer">
				<button>Отправить</button>
				<span>Нажимая на кнопку, Вы даете согласие на обработку персональных данных</span>
			</div>
 -->
		</div>
	</div>

	<div id="panel1" class="mobile-text-center" style="position:absolute;top:0;left:0;right:0">
		<div class="wrap" style="position:relative;padding:4px 0;z-index:10">
			<span class="header-ico ico-address purple">г. Владивосток, ул. Маковского 22, офис 4</span>
			<span class="header-ico ico-phone purple">8 (423) 201-80-05</span>
		</div>
	</div>

	<header id="masthead" class="site-header" role="banner">

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

	</header><!-- #masthead -->

	<div id="stfu-stuff">
		<div class="wrap">
			<div class="stfu-left"></div>
			<div class="stfu-right">
				<span></span>
			</div>
		</div>
	</div>

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! sirvl_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		// echo '<div class="single-featured-image-header">';
		// echo get_the_post_thumbnail( get_queried_object_id(), 'sirvl-featured-image' );
		// echo '</div><!-- .single-featured-image-header -->';
	else:?>

	<!-- <div class="fig-circle"></div> -->

	<?php endif; ?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
