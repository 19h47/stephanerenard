<?php

/**
 * page-consultations-tarifs
 */

////////////////
// Controller //
////////////////

$fields = get_fields();

// img
$output_img = '';
if ( ! empty( $fields['img'] ) ) {

	$size = 'large';
	$thumb = $fields['img']['sizes'][$size];

	$output_img .= '<div ';
	$output_img .= 'class="col-xs-10 col-xs-offset-2 page-introduction__img--single js-animation-slide" ';
	$output_img .= "style=\"background-image: url('{$thumb}');\" ";
	$output_img .= '></div>';

}

// img_prices
$output_img_prices = '';
if ( ! empty( $fields['img_prices'] ) ) {

	$size = 'large';
	$thumb = $fields['img_prices']['sizes'][$size];

	$output_img_prices .= "<img class=\"img-fluid tarifs__img\" src=\"{$thumb}\">";
}

get_header();

//////////
// View //
//////////


while( have_posts() ) : the_post(); ?>

	<section class="site-section page-introduction row has-rounded-edge background-blue-very-dark">

		<div class="site-section__inner col-xs-10 col-xs-offset-1 col-sm-5 text-xs-center text-sm-left">

			<?php the_title('<h1 class="h1 color-white is-on-top">', '</h1>'); ?>

			<div class="page-introduction__paragraph is-on-top color-white">

				<?php the_content(); ?>

				<a
					href="#consultations-tarifs"
					class="btn btn--description has-decor-after uppercase font-bold btn--cyan-slightly-desaturated js-anchor"
				>
					<?php echo $fields['label_decouvrir_les_soins'] ?>
					<span class="btn--decor-after is-rotate">
						<svg id="" class="" role="img">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_button-after"/>
						</svg>
					</span>
				</a>

			</div>
		</div>

		<div class="site-section__inner col-xs-6 hidden-xs is-on-top">
			<div class="row"><?php echo $output_img ?></div>
		</div>

	</section>


	<?php get_partial( 'partials/content/consultations-tarifs', null ); ?>

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

			<!-- output_img_prices -->
			<div class="col-xs-4 col-xs-offset-1 hidden-xs js-animation-slide is-on-top">
				<?php echo $output_img_prices ?>
			</div>

			<!-- text_prices -->
			<div class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-5 consultations-prices__text is-on-top">
				<?php echo $fields['text_prices'] ?>

				<a href="#contact" class="btn btn--description has-decor-after uppercase font-bold btn--blue-very-dark js-anchor is-on-top">
					<?php echo $fields['label_contactez_moi'] ?>
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
					<?php echo $fields['footer_prices'] ?>
				</div>
			</div>
		</footer>
	</section>

<?php

endwhile;
get_footer()

?>