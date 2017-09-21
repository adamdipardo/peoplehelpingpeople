<?php get_header(); ?>

<?php 
// change post to be the member
global $post;
preg_match( "/^.*\/(.*)\/donate\/finished\/?$/", $_SERVER['REQUEST_URI'], $matches );
$post = get_page_by_path( $matches[1], OBJECT, 'people_member' );
setup_postdata( $post ); ?>

<div class="container">

	<div class="row member-donate">

		<div class="col-md-12">

			<h1>Thank you for supporting <?php the_title(); ?>!</h1>

		</div>

	</div>

</div>

<?php get_footer(); ?>