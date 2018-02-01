<header id="js-site-header" class="site-header">

	<div class="site-header__inner row">
		
		<div class="site-logo col-xs-2 col-xs-offset-5 col-sm-offset-1">
			<a href="<?php echo home_url( '/' ) ?>" class="site-logo__link is-on-top text-xs-center">
				<img class="site-logo__img" src="<?php echo get_template_directory_uri() ?>/img/png/stephanerenard_logo.png" width="150" height="129" alt="">
			</a>
		</div>
		<?php
			$args = array(
				'theme_location'	=> 'primary',
				'container'			=> 'nav',
				'container_id'		=> 'js-nav',
				'container_class'	=> 'site-nav clearfix',
				'menu_class'		=> 'site-nav__inner clearfix',
				'walker'			=> new Walker_Nav_Menu_Advanced(),
			);

			wp_nav_menu( $args );
		?>

		<button id="js-toggle-menu" class="site-nav__button hidden-sm hidden-md hidden-lg hidden-hd">
		</button>

	</div>
</header>