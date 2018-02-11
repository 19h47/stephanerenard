<?php

/**
 * page-mon-approche
 */

$fields = get_fields();

$sections = array(
	array(
		'title'	=> $fields['title_first_pour-aller-plus-loin'],
		'text'	=> $fields['text_first_pour-aller-plus-loin'],
	),
	array(
		'title'	=> $fields['title_second_pour-aller-plus-loin'],
		'text'	=> $fields['text_second_pour-aller-plus-loin'],
	),
	array(
		'title'	=> $fields['title_third_pour-aller-plus-loin'],
		'text'	=> $fields['text_third_pour-aller-plus-loin'],
	),
	array(
		'title'	=> $fields['title_fourth_pour-aller-plus-loin'],
		'text'	=> $fields['text_fourth_pour-aller-plus-loin'],
	),
);

$output_sections = '';
foreach ( $sections as $section ) {

	if ( $section['title'] ) {
		$output_sections .= '<h3 class="h4 is-on-top color-blue-very-dark">';
		$output_sections .= $section['title'];
		$output_sections .= '</h3>';
	}

	if ( $section['text'] ) {
		$output_sections .= '<div class="page-pour-aller-plus-loin__content js-column color-red-very-dark-grayish is-on-top">';
		$output_sections .= $section['text'];
		$output_sections .= '</div>';
	}
}

$output_img_first = '';
if ( ! empty( $fields['img_first'] ) ) {

	$size = 'large';
	$thumb = $fields['img_first']['sizes'][$size];

	$output_img_first .= '<div class="col-xs-5 col-xs-offset-1 page-introduction__img--first" ';
	$output_img_first .= "style=\"background-image: url( '{$thumb}' );\"></div>";

}

$output_img_second = '';
if ( ! empty( $fields['img_second'] ) ) {

	$size = 'large';
	$thumb = $fields['img_second']['sizes'][$size];

	$output_img_second .= '<div class="col-xs-10 col-xs-offset-2 page-introduction__img--second" ';
	$output_img_second .= "style=\"background-image: url( '{$thumb}' );\"></div>";

}

$output_img_mon_parcours = '';
if ( ! empty( $fields['img_mon-parcours'] ) ) {

	$alt = $fields['img_mon-parcours']['alt'];
	$size = 'large';
	$large = $fields['img_mon-parcours']['sizes'][ $size ];
	$width = $fields['img_mon-parcours']['sizes'][ $size . '-width' ];
	$height = $fields['img_mon-parcours']['sizes'][ $size . '-height' ];

	$output_img_mon_parcours .= '<img class="img-fluid" ';
	$output_img_mon_parcours .= "src=\"{$large}\" ";
	$output_img_mon_parcours .= "alt=\"{$alt}\" ";
	$output_img_mon_parcours .= "width=\"{$width}\" ";
	$output_img_mon_parcours .= "height=\"{$height}\"";
	$output_img_mon_parcours .= '>';

}

get_header();

while ( have_posts() ) : the_post(); ?>

	<section class="site-section page-introduction row has-rounded-edge background-blue-very-dark">

		<div class="site-section__inner col-xs-10 col-xs-offset-1 col-sm-5">

			<?php the_title( '<h1 class="h1 color-white is-on-top">', '</h1>' ); ?>


			<div class="page-introduction__paragraph is-on-top color-white">
				<?php echo $fields['content_mon-parcours'] ?>
			</div>
		</div>

		<div class="site-section__inner col-xs-6 hidden-xs js-animation-slide is-on-top">
			<div class="row">

				<?php

				echo
					$output_img_first,
					$output_img_second;

				?>

			</div>
		</div>

	</section>

	<section class="site-section row">

		<div class="site-secton__inner col-xs-10 col-xs-offset-1 col-sm-4 js-animation-slide is-on-top">
			<?php echo $output_img_mon_parcours ?>
		</div>

		<div class="site-section__inner page-mon-parcours--right col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0">

			<h2 class="h4 uppercase color-blue-very-dark">
				<?php _e( 'Mon parcours', 'stephanerenard' ) ?>
			</h2>

			<div class="page-mon-parcours--right__content color-red-very-dark-grayish is-on-top">
				<?php echo $fields['texte_mon-parcours'] ?>
			</div>
		</div>

	</section>

	<section class="site-section page-pour-aller-plus-loin row">

		<div class="site-secton__inner col-xs-10 col-xs-offset-1">

			<h2 class="h1 is-on-top color-cyan-dark-grayish">
				<?php _e( 'Pour aller plus loin', 'stephanerenard' ) ?>
			</h2>
			<br>

			<?php echo $output_sections ?>

		</div>

	</section>
<?php

endwhile;
get_footer()

?>
