<?php

/**
 * partials/content/article
 */

?>
<article
    id="actuality-<?php the_ID() ?>"
    class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-4"
>
    <div class="actuality__article">

        <header class="actuality__article__header">
        	<a
                href="<?php the_permalink(); ?>"
                class="display-block w-xs-100 h-xs-100 is-on-top js-animation-slide"
            >
                <?php

                if ( has_post_thumbnail() ) {

                    the_post_thumbnail(
                        'large',
                        array( 'class' => 'img-fluid site-section__article__img' )
                    );

                } else {

                    echo '<div class="img-fluid site-section__article__img"></div>';
                }

                ?>
    		</a>
    	</header>

		<div class="actuality__article__content">

            <a
                class="actuality__article__content__title h4 color-blue-very-dark uppercase is-on-top"
                href="<?php the_permalink(); ?>"
            >
        		<?php the_title(); ?>
        	</a>

        	<div class="actuality__article__content__excerpt color-red-very-dark-grayish is-on-top">
				<?php the_excerpt(); ?>
			</div>
	        <footer class="actuality__article__footer color-red-very-dark-grayish">
            	<span class="actuality__article__footer__date is-on-top">
            		Il y a <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ); ?>
            	</span>
            	<!-- <span class="actuality__article__footer__counter">123</span> -->

	    	</footer>
    	</div>
    </div>
</article>