<?php get_header(); ?>

<div class="container">

	<div class="row single-member">

		<?php if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>

				<div class="col-md-12">
					<h1 class="left">Meet <?php the_title(); ?></h1>
				</div>

				<div class="col-md-5 col-sm-5 member-image">
					<?php the_post_thumbnail( 'people_member_single_thumb', array( 'class' => 'img-responsive' ) ); ?>

					<a href="<?php the_permalink(); ?>donate/" class="btn btn-primary btn-lg">Connect with <?php the_title(); ?></a>
				</div>

				<div class="col-md-1 col-sm-0"></div>

				<div class="col-md-6 col-sm-7">
					<div class="member-content page-content">
						<?php the_content(); ?>
					</div>					
					<?php if ( have_rows( 'testimonials') ): ?>
						<div class="member-testimonial">
						<?php while ( have_rows( 'testimonials') ): the_row(); ?>
							<div class="member-testimonial-text">
								<?php the_sub_field('testimonial'); ?>
							</div>
							<div class="member-testimonial-author">
								<?php the_sub_field('author'); ?>
							</div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if ( get_field( 'skills' ) ): ?>
						<div class="member-skills">
							<?php $pronoun = "Their";
							if ( get_field( 'gender' ) ):
								if ( get_field( 'gender' ) == 'Male' ):
									$pronoun = "His";
								elseif ( get_field( 'gender' ) == 'Female' ):
									$pronoun = "Her";
								endif;
							endif;
							echo "$pronoun best skills are:<br />";
							the_field( 'skills' ); ?>
						</div>
					<?php endif; ?>
				</div>

			<?php endwhile;
		endif; ?>

	</div>

</div>

<?php get_footer(); ?>