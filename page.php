<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<h1><?php the_title(); ?></h1>

		</div>

		<div class="col-md-2"></div>

		<div class="col-md-8 page-content">

			<?php the_content(); ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>