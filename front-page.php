<?php get_header();
	while ( have_posts() ) : the_post(); ?>
		<section class="site-section home-description row has-rounded-edge background-cyan-slightly-desaturated">
			<div class="site-secton__inner col-xs-12 col-sm-6 text-xs-center text-sm-left">
				<h1 class="site-title is-script color-blue-very-dark is-on-top text-xs-center text-sm-left">
					<?php bloginfo( 'title' ); ?>
				</h1>

				<p class="description">
					<span class="h2 home-description__subtitle uppercase color-blue-very-dark is-on-top">
						<?php bloginfo( 'description' ); ?>
					</span><br>
					<span class="home-description__profession color-blue-very-dark is-on-top">
						Soins énergétiques, magnétisme<br>
						& psycho-énergie
					</span>
				</p>

				<div class="home-description__text is-on-top">
					<?php the_content(); ?>
				</div>
				<a
					href="<?php the_permalink( 2 ); ?>"
					class="btn btn--description has-decor-after uppercase font-bold btn--blue-very-dark is-on-top"
				>
					Mon approche
					<span class="btn--decor-after">
						<svg id="" class="" role="img">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
						</svg>
					</span>
				</a>
			</div>

			<div class="site-section__inner home-description__right col-xs-6 hidden-xs js-animation-slide is-on-top">
				<!-- <img class="home-description__img float-right" src="<?php echo get_template_directory_uri() ?>/img/jpg/stephanerenard__img-01.jpg" alt="" width="473" height="660"> -->

				<?php

				echo the_post_thumbnail(
					'large',
					array(
						'class' 	=> 'home-description__img float-right'
					)
				);

				?>
			</div>

			<div class="home-description__background-image js-animation-slide">
			</div>
		</section>

		<?php

		get_partial( 'partials/content', 'consultations-tarifs' );

		$args = array(
			'post_type'			=> 'post',
		    'post_status' 		=> 'publish',
		    'posts_per_page'	=> 3
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

		?>
		<section class="site-section actuality clearfix">
			<div class="site-secton__inner row">

				<header class="actuality__header has-rounded-edge row background-blue-very-dark">
					<div class="col-xs-12 col-sm-8 col-sm-offset-1">
						<h2 class="h2 actuality__title color-white is-on-top">
							Actualités
						</h2>
					</div>
					<div class="col-xs-3 hidden-xs">
						<a href="<?php the_permalink( 17 ); ?>" class="btn color-white uppercase font-bold btn--actuality is-on-top">
							Toutes les actualités
							<span class="btn--decor-after js-animation-slide">
								<svg id="" class="" role="img">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
								</svg>
							</span>
						</a>
					</div>
				</header>
				<div class="actuality__content row">

						<?php

						while ( $query->have_posts() ) {
							$query->the_post();
							get_partial( 'partials/content', 'article' );
						}
						wp_reset_postdata(); ?>

				</div>

				<div class="row color-blue-very-dark">
					<div class="col-xs-12 hidden-sm hidden-md hidden-lg hidden-hd text-xs-center">
						<a href="<?php the_permalink(17) ?>" class="btn uppercase font-bold btn--actuality is-on-top hoverable">
							Toutes les actualités
							<span class="btn--decor-after">
								<svg id="" class="" role="img">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
								</svg>
							</span>
						</a>
					</div>
				</div>
			</div>
		</section>
	<?php endif;
endwhile;
get_footer()

?>