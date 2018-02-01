<?php

get_header();

while ( have_posts() ) : the_post(); ?>

	<section class="site-section page-introduction row has-rounded-edge background-blue-very-dark">

		<div class="site-section__inner col-xs-10 col-xs-offset-1 col-sm-5">
			<h1 class="h1 color-white is-on-top">
				<?php the_title(); ?>
			</h1>

			<div class="page-introduction__paragraph is-on-top color-white">
				<?php the_field( 'content_mon-parcours' ); ?>

			</div>
		</div>

		<div class="site-section__inner col-xs-6 hidden-xs js-animation-slide is-on-top">
			<div class="row">

				<?php $image_first = get_field( 'img_first' );
				if ( ! empty( $image_first ) ) :

					$size = 'large';
					$thumb = $image_first['sizes'][ $size ]; ?>

					<div
						class="col-xs-5 col-xs-offset-1 page-introduction__img--first"
						style="background-image: url('<?php echo $thumb ?>');"
					></div>

				<?php endif;

				$image_second = get_field( 'img_second' );
				if ( ! empty( $image_second ) ) :

					$size = 'large';
					$thumb = $image_second['sizes'][ $size ];

					?>
					<div
						class="col-xs-10 col-xs-offset-2 page-introduction__img--second"
						style="background-image: url( '<?php echo $thumb ?>' );"
					>
					</div>

				<?php endif; ?>

			</div>
		</div>

	</section>

	<section class="site-section row">
		<div class="site-secton__inner col-xs-10 col-xs-offset-1 col-sm-4 js-animation-slide is-on-top">

			<?php

			$image_mon_parcours = get_field( 'img_mon-parcours' );

			if ( ! empty( $image_mon_parcours ) ) :

				$alt = $image_mon_parcours['alt'];
				$size = 'large';
				$large = $image_mon_parcours['sizes'][ $size ];
				$width = $image_mon_parcours['sizes'][ $size . '-width' ];
				$height = $image_mon_parcours['sizes'][ $size . '-height' ]; ?>

				<img
					class="img-fluid" src="<?php echo $large ?>"
					alt="<?php echo $alt ?>"
					width="<?php echo $width ?>"
					height="<?php echo $height ?>"
				>

			<?php endif ?>

		</div>

		<div class="site-section__inner page-mon-parcours--right col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0">

			<h2 class="h4 uppercase color-blue-very-dark">
				<?php _e( 'Mon parcours', 'stephanerenard' ) ?>
			</h2>

			<div class="page-mon-parcours--right__content color-red-very-dark-grayish is-on-top">
				<?php the_field( 'texte_mon-parcours' ); ?>
			</div>
		</div>

	</section>

	<section class="site-section page-pour-aller-plus-loin row">

		<div class="site-secton__inner col-xs-10 col-xs-offset-1">
			<h2 class="h1 is-on-top color-cyan-dark-grayish">
				<?php _e( 'Pour aller plus loin', 'stephanerenard' ) ?>
			</h2>

			<?php if ( get_field( 'title_first_pour-aller-plus-loin' ) ) : ?>
				<h3 class="h4 is-on-top color-blue-very-dark">
					<?php the_field( 'title_first_pour-aller-plus-loin' ); ?>
				</h3>
			<?php endif;

			if( get_field( 'text_first_pour-aller-plus-loin' ) ) : ?>
				<div class="page-pour-aller-plus-loin__content js-column color-red-very-dark-grayish is-on-top">
					<?php the_field('text_first_pour-aller-plus-loin'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field( 'title_second_pour-aller-plus-loin' ) ) : ?>
				<h3 class="h4 is-on-top color-blue-very-dark">
					<?php the_field('title_second_pour-aller-plus-loin'); ?>
				</h3>
			<?php endif; ?>

			<?php if( get_field( 'text_second_pour-aller-plus-loin' ) ) : ?>
				<div class="page-pour-aller-plus-loin__content js-column color-red-very-dark-grayish is-on-top">
					<?php the_field('text_second_pour-aller-plus-loin'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field( 'title_third_pour-aller-plus-loin' ) ) : ?>
				<h3 class="h4 is-on-top color-blue-very-dark">
					<?php the_field('title_third_pour-aller-plus-loin'); ?>
				</h3>
			<?php endif; ?>

			<?php if( get_field( 'text_third_pour-aller-plus-loin' ) ) : ?>
				<div class="page-pour-aller-plus-loin__content js-column color-red-very-dark-grayish is-on-top">
					<?php the_field('text_third_pour-aller-plus-loin'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field( 'title_fourth_pour-aller-plus-loin' ) ) : ?>
				<h3 class="h4 is-on-top color-blue-very-dark">
					<?php the_field( 'title_fourth_pour-aller-plus-loin' ); ?>
				</h3>
			<?php endif; ?>

			<?php if( get_field( 'text_fourth_pour-aller-plus-loin' ) ) : ?>
				<div class="page-pour-aller-plus-loin__content js-column color-red-very-dark-grayish is-on-top">
					<?php the_field( 'text_fourth_pour-aller-plus-loin' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php

endwhile;
get_footer()

?>