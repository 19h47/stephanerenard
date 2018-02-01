<?php get_header() ?>

<?php while( have_posts() ) : the_post(); ?>

	<section class="site-section page-introduction row has-rounded-edge background-blue-very-dark">

		<div class="site-section__inner col-xs-10 col-xs-offset-1 col-sm-5 text-xs-center text-sm-left">
			<h1 class="h1 color-white is-on-top">
				<?php the_title(); ?>
			</h1>

			<div class="page-introduction__paragraph is-on-top color-white">

				<?php the_content(); ?>

				<a
					href="#consultations-tarifs"
					class="btn btn--description has-decor-after uppercase font-bold btn--cyan-slightly-desaturated js-anchor"
				>
					<?php _e( 'Découvrir les soins', 'stephanerenard' ) ?>
					<span class="btn--decor-after is-rotate">
						<svg id="" class="" role="img">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
						</svg>
					</span>
				</a>

			</div>
		</div>
		<div class="site-section__inner col-xs-6 hidden-xs is-on-top">
			<div class="row">

				<?php $image = get_field( 'img' );

				if ( ! empty( $image ) ) :

					$size = 'large';
					$thumb = $image['sizes'][ $size ];

				?>

				<div
					class="col-xs-10 col-xs-offset-2 page-introduction__img--single js-animation-slide"
					style="background-image: url('<?php echo $thumb ?>');"
				></div>

				<?php endif; ?>
			</div>
		</div>

	</section>


	<?php get_partial( 'partials/content', 'consultations-tarifs' ); ?>

	<section class="site-section row has-rounded-edge background-cyan-slightly-desaturated tarifs">
		<div class="row">
			<div class="site-section__inner col-xs-12 col-sm-7 col-sm-offset-5">
				<h1 class="h1 color-white tarifs__title is-on-top">
					<?php _e( 'Tarifs', 'stephanerenard' ) ?>
				</h1>
			</div>
		</div>
	</section>

	<section class="site-section consultations-prices">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-1 hidden-xs js-animation-slide is-on-top">
				<?php $image_prices = get_field('img_prices'); ?>
				<?php if ( ! empty( $image_prices ) ) : ?>

					<?php $size = 'large'; ?>
					<?php $thumb = $image_prices['sizes'][ $size ]; ?>

					<img class="img-fluid tarifs__img" src="<?php echo $thumb; ?>">
				<?php endif; ?>
			</div>

			<div class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-5 consultations-prices__text is-on-top">
				<?php the_field('text_prices'); ?>
				<a href="#contact" class="btn btn--description has-decor-after uppercase font-bold btn--blue-very-dark js-anchor is-on-top">
					Contactez-moi !
					<span class="btn--decor-after is-rotate">
						<svg id="" class="" role="img">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"></use>
						</svg>
					</span>
				</a>
			</div>
		</div>
		<footer class="consultations-prices__footer row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 consultations-prices__footer__inner background-cyan-light-grayish">
				<div class="is-on-top">
					<?php the_field('footer_prices'); ?>
				</div>
			</div>
		</footer>
	</section>

<?php

endwhile;
get_footer()

?>