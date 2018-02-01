<!DOCTYPE html>
<!--[if IE 9]>
<html <?php html_class( 'ie9 no-js no-touch' ); ?> <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 9)]><!-->
<html <?php html_class( 'no-js no-touch' ); ?> <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

	<script src="<?php echo get_template_directory_uri() ?>/dist/js/min/feature.min.js"></script>
	<?php get_partial( 'partials/google', 'analytics', array( 'ga_id' => 'UA-80812517-1' ) ); ?>
	<?php wp_head() ?>
</head>
<body id="barba-wrapper" class="first-loading">
	<div <?php body_class( 'barba-container' ) ?> <?php barba_namespace() ?>>

		<main class="site-container">
		
		<?php get_partial( 'partials/header' ) ?>