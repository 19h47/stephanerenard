<section id="consultations-tarifs" class="site-section">

	<?php if ( is_front_page() ) : ?>

		<div class="site-secton__inner col-xs-12 text-xs-center is-on-top color-blue-very-dark">
			<h2>
				Consultation & tarifs
			</h2>
		</div>

	<?php endif; ?>

	<div class="row">
		<div class="col-xs-10 col-sm-3 col-xs-offset-1">

			<?php if ( get_field( 'title_first', 20 ) || get_field( 'description_first', 20 ) || get_field( 'text_first', 20 ) ) : ?>
				<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
					<svg id="" class="icon--consultations-rates" role="img">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_icons_soin-des-equilibres"/>
					</svg>
					<div class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">
						<?php the_field('title_first', 20); ?>
					</div>
					<div class="consultations-rates__text is-on-top">
						<?php the_field('description_first', 20); ?>
					</div>

					<?php if( !is_front_page() ): ?>
					<div class="is-on-top">
						<?php the_field('text_first'); ?>
					</div>
					<?php endif; ?>

				</article>
			<?php endif; ?>

			<?php if ( get_field( 'title_second', 20 ) || get_field( 'description_second', 20 ) || get_field( 'text_second', 20 ) ) : ?>
				<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
					<svg id="" class="icon--consultations-rates" role="img">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_icons_projet-sens"/>
					</svg>
					<p class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">
						<?php the_field( 'title_second', 20 ); ?>
					</p>
					<p class="consultations-rates__text is-on-top">
						<?php the_field( 'description_second', 20 ); ?>
					</p>

					<?php if( ! is_front_page() ) : ?>
					<div class="is-on-top">
						<?php the_field( 'text_second' ); ?>
					</div>
					<?php endif; ?>

				</article>
			<?php endif; ?>

		</div>
		<div class="col-xs-10 col-sm-3 col-xs-offset-1">

			<?php if( get_field( 'title_third', 20 ) || get_field( 'description_third', 20 ) || get_field( 'text_third', 20 ) ) : ?>
				<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
					<svg id="" class="icon--consultations-rates" role="img">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_icons_soin-des-masques"/>
					</svg>
					<p class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">
						<?php the_field( 'title_third', 20 ); ?>
					</p>
					<p class="consultations-rates__text is-on-top">
						<?php the_field( 'description_third', 20 ); ?>
					</p>

					<?php if( ! is_front_page() ) : ?>
					<div class="is-on-top">
						<?php the_field( 'text_third' ); ?>
					</div>
					<?php endif; ?>

				</article>
			<?php endif; ?>

			<?php if( get_field( 'title_fourth', 20 ) || get_field( 'description_fourth', 20 ) || get_field( 'text_fourth', 20 ) ) : ?>
				<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
					<svg id="" class="icon--consultations-rates" role="img">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_icons_mission-de-vie"/>
					</svg>
					<p class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">
						<?php the_field( 'title_fourth', 20 ); ?>
					</p>
					<p class="consultations-rates__text is-on-top">
						<?php the_field( 'description_fourth', 20 ); ?>
					</p>

					<?php if( ! is_front_page() ) : ?>
					<div class="is-on-top">
						<?php the_field( 'text_fourth' ); ?>
					</div>
					<?php endif; ?>

				</article>
			<?php endif; ?>

		</div>
		<div class="col-xs-10 col-sm-3 col-xs-offset-1">
			<?php if( get_field( 'title_fifth', 20 ) || get_field( 'description_fifth', 20 ) || get_field( 'text_fifth', 20 ) ) : ?>
			<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
				<svg id="" class="icon--consultations-rates" role="img">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_icons_soin-des-freins"/>
				</svg>
				<p class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">
					<?php the_field( 'title_fifth', 20 ); ?>
				</p>
				<p class="consultations-rates__text is-on-top">
					<?php the_field( 'description_fifth', 20 ); ?>
				</p>

				<?php if( ! is_front_page() ): ?>
				<div class="is-on-top">
					<?php the_field('text_fifth'); ?>
				</div>
				<?php endif; ?>

			</article>
			<?php endif; ?>

			<?php if( is_front_page() ): ?>

			<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">
				<a href="<?php the_permalink( 20 ) ?>#consultations-tarifs" class="btn consultations-rates__btn uppercase font-bold btn--blue-very-dark is-on-top">
					<?php _e( 'En savoir plus', 'stephanerenard' ) ?>
					<span class="btn--decor-after">
						<svg id="" class="" role="img">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
						</svg>
					</span>
				</a>
			</article>

			<?php endif; ?>

		</div>
	</div>
</section>