<?php

/**
 * single
 */

get_header();

while( have_posts() ) : the_post(); ?>

<header class="single-header">
	<div class="single-header__inner row background-cyan-light-grayish">

		<?php

		the_title(
			'<h1 class="col-xs-offset-3 col-xs-6 text-xs-center is-on-top color-blue-very-dark">',
			'</h1>'
		);

		?>

		<div class="col-xs-2 text-xs-right single-header__inner__meta">
			<div class="actuality__article__footer color-red-very-dark-grayish">
            	<span class="actuality__article__footer__date is-on-top">
            		Il y a <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?>
            	</span>
            	<!-- <span class="actuality__article__footer__counter">123</span> -->
	    	</div>
		</div>
	</div>
</header>

<section class="single-hero-image row site-section">
	<div class="col-xs-offset-1 col-xs-10">
		<?php the_post_thumbnail('large', array( 'class' => 'single-hero-image__img' ) ); ?>
	</div>
</section>

<section class="site-section single-content row">
	<div class="single-content__inner col-xs-offset-2 col-xs-8 is-on-top">
		<?php the_content(); ?>
	</div>
</section>


<?php

endwhile;
get_footer()

?>