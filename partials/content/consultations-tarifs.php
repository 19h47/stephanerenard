<?php

/**
 * Content Consultations tarifs
 */

////////////////
// Controller //
////////////////

$consultations_tarifs_id = 20;

$fields = get_fields( $consultations_tarifs_id );

$sections = array(
	array(
		'title'			=> $fields['title_first'],
		'description'	=> $fields['description_first'],
		'text'			=> $fields['text_first'],
		'icon'			=> get_template_directory_uri() . '/dist/svg/icons.svg#stephanerenard_icons_soin-des-equilibres',
	),
	array(
		'title'			=> $fields['title_second'],
		'description'		=> $fields['description_second'],
		'text'			=> $fields['text_second'],
		'icon'			=> get_template_directory_uri() . '/dist/svg/icons.svg#stephanerenard_icons_projet-sens',
	),
	array(
		'title'			=> $fields['title_third'],
		'description'		=> $fields['description_third'],
		'text'			=> $fields['text_third'],
		'icon'			=> get_template_directory_uri() . '/dist/svg/icons.svg#stephanerenard_icons_soin-des-masques',
	),
	array(
		'title'			=> $fields['title_fourth'],
		'description'		=> $fields['description_fourth'],
		'text'			=> $fields['text_fourth'],
		'icon'			=> get_template_directory_uri() . '/dist/svg/icons.svg#stephanerenard_icons_mission-de-vie',
	),
	array(
		'title'			=> $fields['title_fifth'],
		'description'		=> $fields['description_fifth'],
		'text'			=> $fields['text_fifth'],
		'icon'			=> get_template_directory_uri() . '/dist/svg/icons.svg#stephanerenard_icons_soin-des-freins',
	),
);


$output = '';
$i = 0;

foreach ( $sections as $section ) {
	$output .= '<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">';

	// SVG
	$output .= '<svg class="icon--consultations-rates" role="img">';
	$output .= "<use xlink:href=\"{$section['icon']}\"/>";
	$output .= '</svg>';

	// Title
	if ( $section['title'] ) {
		$output .= '<div class="h4 color-blue-very-dark uppercase consultations-rates__title is-on-top">';
		$output .= $section['title'];
		$output .= '</div>';
	}

	// Description
	if ( $section['description'] ) {
		$output .= '<div class="consultations-rates__text is-on-top">';
		$output .= $section['description'];
		$output .= '</div>';
	}

	if ( ! is_front_page() ) {
		$output .= "<div class=\"is-on-top\">{$section['text']}</div>";
	}

	$output .= '</article>';

	$i++;

	if ( $i === count( $section ) && is_front_page() ) {

		$output .= '<article class="js-consultations-rates consultations-rates text-xs-center text-sm-left">';

		$output .= '<a href="' . get_permalink( $consultations_tarifs_id ) . '#consultations-tarifs" ';
		$output .= 'class="btn consultations-rates__btn uppercase font-bold btn--blue-very-dark is-on-top">';

		$output .= __( 'En savoir plus', 'stephanerenard' );

		$output .= '<span class="btn--decor-after"><svg role="img">';

		$output .= '<use xlink:href="';
		$output .= get_template_directory_uri();
		$output .= '/dist/svg/icons.svg#stephanerenard_button-after"/>';

		$output .= '</svg></span></a></article>';
	}

    if ( $i % 2 === 0 ) {
        $output .= '</div><div class="col-xs-10 col-sm-3 col-xs-offset-1">';
    }
}

//////////
// View //
//////////
?><section id="consultations-tarifs" class="site-section"><?php

	if ( is_front_page() ) : ?>

		<div class="site-secton__inner col-xs-12 text-xs-center is-on-top color-blue-very-dark">
			<?php echo "<h2>{$fields['title']}</h2>" ?>
		</div>

	<?php endif;

	echo "<div class=\"row\"><div class=\"col-xs-10 col-sm-3 col-xs-offset-1\">{$output}</div></div>";

?></section>
