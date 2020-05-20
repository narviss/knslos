<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">
			<?php /*
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo('description', 'display');
			// if ( is_customize_preview() ) :
			?>
			*/?>
			<p class="site-title">Поставка <span class="fnt-dinpro-bold">СООРУЖЕНИЯ</span> для<br/>ОЧИСТКИ И ПЕРЕКАЧКИ СТОЧНЫХ ВОД</p>
			<p class="site-description">Ответьте на несколько вопросов и мы сможем вам подобрать<br>подходящее оборудование</p>
			<div class="header-offer">
				<a href="/#panel3" class="btn btn-green btn-responsive">
					<span class="btn__text" style="color:white">Подобрать</span>
					<span class="btn__img"></span>
					<!-- <img src="<?php echo get_parent_theme_file_uri('/assets/images/next.png') ?>" /> -->
				</a>
				<span>оборудование, основываясь<br>на параметрах</span>
				<div class="header-offer-link">
					<span class="fnt-dinpro-regular">Или</span>
					<a href="http://sirvl2.skillmasters.ga/wp-content/uploads/2020/04/Каталог-очистные-сооружения.pdf">
						<b class="fnt-dinpro-bold">СКАЧАТЬ</b> <span class="fnt-dinpro-medium">каталог продукции</span>
					</a>
				</div>
			</div>
		</div><!-- .site-branding-text -->

		<?php //if ( ( sirvl_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<!-- <a href="#panel4" class="menu-scroll-down"> -->
		<a href="#panel6" class="header-scroll-down">
			<span style="margin:8px 0;vertical-align:middle">Виды сооружений</span>
			<span class="circle-1"></span>
			<span class="circle-2"></span>
			<span class="circle-3"></span>
			<?php //echo sirvl_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
			<!-- <span class="screen-reader-text"><?php _e( 'Scroll down to content', 'sirvl' ); ?></span> -->
		</a>
		<?php //endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
