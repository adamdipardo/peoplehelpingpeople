<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<h1 class="left">Our Members</h1>

		</div>

	</div>

	<div class="row">

		<?php if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'people_member', 'box' );

			endwhile;
		endif; ?>

	</div>

</div>

<?php get_footer(); ?>