<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="site-section background-cyan-light-grayish page-template__introduction">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 text-xs-center color-blue-very-dark">
			<div class="page-template__introduction__inner">

				<?php the_title('<h1 class=" is-on-top">', '</h1>'); ?>
				<div class="page-template__introduction__text is-on-top text-xs-center">
					<?php the_content(); ?>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="site-section">

	<?php if( have_rows('content') ):

	    while ( have_rows('content') ) : the_row();

        get_partial ('partials/page', get_row_layout( ) );

    endwhile;


endif;

?>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>