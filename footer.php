			<footer id="contact" class="site-footer has-rounded-edge-top-only">

				<div class="site-footer__content">
					<div class="site-footer__content--left">
						<div class="site-footer__content--left--top background-cyan-slightly-desaturated">
							<div class="site-footer__content--left--top__inner row">

								<div class="site-footer__content--left--top__inner__column col-sm-6 has-background">
									<a href="<?php echo home_url( '/' ) ?>" class="display-block w-xs-100 h-xs-100">
										<img class="site-footer__content--left--top__inner__column__logo" src="<?php echo get_template_directory_uri() ?>/img/png/stephanerenard_logo.png" width="150" height="129" alt="">
									</a>
								</div>

								<div class="site-footer__content--left--top__inner__column col-sm-6">

									<div class="site-footer__content--left--top__inner__column__inner">
										<h2 class="site-footer__content--left--top__inner__column__inner__title color-white h1 is-on-top">
											Contact
										</h2>
										<p class="">
											<span class="site-footer__content--left--top__inner__column__text is-on-top">
												Consultation sur rendez-vous
											</span>

											<?php if( get_option( 'company_address' ) ) : ?>
												<br>
												<span class="site-footer__content--left--top__inner__column__address is-on-top">
													<?php echo nl2br( get_option( 'company_address' ) ); ?>
												</span>
											<?php endif; ?>

											<?php if( get_option('company_email') ): ?>
												<br>
												<span class="site-footer__content--left--top__inner__column__email is-on-top">
													<a href="mailto:<?php echo get_option('company_email'); ?>" class="hoverable no-barba">
														<?php echo get_option('company_email'); ?>
													</a>
												</span>
											<?php endif; ?>

											<?php if( get_option('company_phone') ): ?>
												<span class="site-footer__content--left--top__inner__column__phone is-on-top">
													<a class="no-barba" href="callto:<?php echo preg_replace('/\s+/', '', get_option('company_phone') ); ?>">
														<?php echo get_option('company_phone'); ?>
													</a>
												</span>
											<?php endif; ?>
										</p>

										<div class="site-footer__content--left--top__inner__column__inner__social">

											<?php if ( get_option( 'social_facebook' ) ): ?>
												<a href="<?php echo get_option( 'social_facebook' ); ?>" class="site-footer__content--left--top__inner__column__inner__social__link is-on-top no-barba" target="_blank">
													<svg id="" class="icon--social" role="img">
														<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_facebook"/>
													</svg>
												</a>
											<?php endif; ?>

											<?php if ( get_option( 'social_twitter' ) ): ?>
											<a href="<?php echo get_option( 'social_twitter' ); ?>" class="site-footer__content--left--top__inner__column__inner__social__link is-on-top no-barba" target="_blank">
												<svg id="" class="icon--social" role="img">
													<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_twitter"/>
												</svg>
											</a>
											<?php endif; ?>

											<?php if ( get_option( 'social_googleplus' ) ): ?>
											<a href="<?php echo get_option( 'social_googleplus' ); ?>" class="site-footer__content--left--top__inner__column__inner__social__link is-on-top no-barba" target="_blank">
												<svg id="" class="icon--social" role="img">
													<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#stephanerenard_googleplus"/>
												</svg>
											</a>
											<?php endif; ?>

										</div>
									</div>

								</div>

							</div>
						</div>
						<?php if( is_front_page() ) : ?>
						<div class="site-footer__content--left--bottom hidden-xs">
							<div class="site-footer__content--left--bottom__inner row">

								<div class="site-footer__content--left--bottom__inner__column col-xs-4">
									<div class="site-footer__content--left--bottom__inner__column__img js-animation-slide is-on-top" style="background-image: url('<?php echo get_option( 'footer_img_first' ); ?>');">

									</div>
								</div>
								<div class="site-footer__content--left--bottom__inner__column col-xs-4">
									<div class="site-footer__content--left--bottom__inner__column__img js-animation-slide is-on-top" style="background-image: url('<?php echo get_option( 'footer_img_second' ); ?>');">

									</div>
								</div>
								<div class="site-footer__content--left--bottom__inner__column col-xs-4">
									<div class="site-footer__content--left--bottom__inner__column__img js-animation-slide is-on-top" style="background-image: url('<?php echo get_option( 'footer_img_third' ); ?>');">

									</div>
								</div>

							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="site-footer__content--right is-on-top hidden-xs">
						<div class="embed-container">
							<div id="map" class="map"></div>
						</div>
					</div>
				</div>

				<div class="site-footer__copyright row">

					<div class="col-xs-12 col-sm-offset-1 col-sm-5 text-xs-center text-sm-left">
						<p class="site-footer__copyright--left">
							© 2016 <a href="<?php echo home_url( '/' ) ?>" class="is-on-top hoverable">Stéphane Renard</a>. Tout droits réservés.
						</p>
					</div>

					<div class="col-xs-12 col-sm-5 text-xs-center text-sm-right">
						<p class="site-footer__copyright--right">
							Conception graphique du site : <a href="http://lesindiens.fr/" target="_blank" class="no-barba is-on-top hoverable"><strong>Les Indiens</strong></a> / Développement : <a href="http://19h47.fr/" class="no-barba is-on-top hoverable" target="_blank"><strong>19h47</strong></a>
						</p>
					</div>

				</div>

			</footer>

		</main>
	</div><!-- /.barba-container -->

	<!-- BACKGROUND SITE -->
	<div class="site-background hidden-xs">
		<div class="h-xs-100">
			<div class="row site-background__inner">
				<div class="col-xs-1 site-background__column"></div>
				<div class="col-xs-2 site-background__column"></div>
				<div class="col-xs-2 site-background__column"></div>
				<div class="col-xs-2 site-background__column"></div>
				<div class="col-xs-2 site-background__column"></div>
				<div class="col-xs-2 site-background__column"></div>
				<div class="col-xs-1 site-background__column"></div>
			</div>
		</div>
	</div>

	<?php wp_footer() ?>
</body>
</html>