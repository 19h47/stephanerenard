<?php get_header() ?>
<div class="site-section background-cyan-light-grayish page-template__introduction">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 text-xs-center color-blue-very-dark">
			<div class="page-template__introduction__inner">
				<h1 class=" is-on-top">
					<?php if( have_posts() ): ?>
						Actualités
					<?php else: ?>
						Pas d'actualités pour le moment
					<?php endif; ?>
				</h1>
				<div class="page-template__introduction__text is-on-top">

					<?php the_field( 'text', 17 ); ?>

				</div>
			</div>
		</div>
	</div>
</div>

<section class="site-section">
<?php

if ( have_posts() ) : ?>

	<div class="clearfix">

	<?php $i = 0;

	while ( have_posts() ) : the_post();
		$i++;
		get_partial( 'partials/content', 'article' );

		if ( $i % 3 === 0 ) : ?>
		<span class="clearfix"></span>
		<?php endif;
	endwhile; ?>

	</div>


	<?php

	the_posts_pagination(
		array(
    		'mid_size' 	=> 2,
    		'prev_text' => __( '<span class="prev-icon"></span>', 'textdomain' ),
    		'next_text' => __( '<span class="next-icon"></span>', 'textdomain' ),
		)
	);

endif;

?>
</section>

<?php get_footer() ?>