<div class="page__two-columns row">

	<div class="page__two-columns__article">
		<?php

		the_image_field(
			get_sub_field( 'first_image' ),
			'large',
			array(
				'class' => 'img-fluid w-xs-100'
			)
		)

		?>
		<div class="is-on-top">
			<?php the_sub_field( 'first_text' ); ?>
		</div>
	</div>

	<?php

	if ( get_sub_field( 'second_text' ) || get_sub_field( 'second_image' ) ) : ?>
		<div class="page__two-columns__article">
			<?php the_image_field( get_sub_field( 'second_image' ), 'large', array( 'class' => 'img-fluid w-xs-100' ) ) ?>
			<div class="is-on-top">
				<?php the_sub_field( 'second_text' ); ?>
			</div>
		</div>
	<?php endif; ?>
</div>