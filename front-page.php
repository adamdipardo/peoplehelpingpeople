<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-md-1"></div>

		<div class="col-md-10">

			<h1>Opportunity Creates Equality</h1>

		</div>

		<div class="col-md-1"></div>

		<div class="col-md-3"></div>

		<div class="col-md-6">

			<h3>Meet hardworking members of our community looking for a second chance</h3>

		</div>

	</div>

	<div class="row team-members">

		<?php $members_query = new WP_Query( array(
				'post_type' => 'people_member',
				'posts_per_page' => 3
			) 
		);

		$count = 1;
		while ( $members_query->have_posts() ): $members_query->the_post();
			get_template_part( 'people_member', 'box' );

			if ( $count++ == 2 ):
				echo '<div class="col-sm-3 col-md-0"></div>';
			endif;
		endwhile; ?>

	</div>

	<div class="row meet-all-members">

		<div class="col-md-12">

			<a href="/members" class="btn btn-primary btn-lg">Meet all our members</a>

		</div>

	</div>

</div>

<?php get_footer(); ?>