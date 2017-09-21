<div class="col-md-4 col-sm-6 col-xs-12 member-box">
	<a href="<?php the_permalink(); ?>">
		<div class="member-image">
			<?php the_post_thumbnail( 'people_member_archive_thumb' ); ?>
		</div>

		<h4><?php the_title(); ?></h4>

		<div class="member-tagline">
			<?php echo get_field( 'tagline' ); ?>
		</div>
	</a>
</div>