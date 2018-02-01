<?php
	$classes = array(
		'background-red-very-soft color-red-very-soft arrow-xs-top arrow-sm-left',
		'background-cyan-very-dark color-cyan-very-dark arrow-xs-top',
		'background-cyan-moderate color-cyan-moderate arrow-xs-top arrow-sm-right',
	);
?>

<?php $i = 0; while ( have_rows( 'members' ) ) : the_row(); ?>

<div class="grid__item square text-xs-center">
	<div class="grid__item__inner">
		<?php the_image_field( get_sub_field( 'image' ), 'col-sm-2', array( 'class' => 'fluid' ) ) ?>
	</div>
</div>

<div class="grid__item square text-xs-center <?php echo $classes[ $i % 3 ] ?>">
	<div class="grid__item__inner color-white">

		<?php if ( get_sub_field( 'name' ) ) : ?>

			<p class="name w-xs-100">
				<?php the_sub_field( 'name' ) ?>
			</p>

		<?php endif; ?>

		<div class="contact w-xs-100">

			<?php the_sub_field( 'description' ) ?>

			<?php if ( get_sub_field( 'linkedin' ) ) : ?>

				<a class="social-link display-block" href="<?php the_sub_field( 'linkedin' ) ?>" target="_blank">
					<svg class="icon icon--linkedin" role="img">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/dist/svg/icons.svg#maga_logo_linkedin"/>
					</svg>
				</a>

			<?php endif; ?>

		</div>

	</div>
</div>

<?php $i++; endwhile; ?>