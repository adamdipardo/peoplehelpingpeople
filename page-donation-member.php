<?php get_header(); ?>

<?php 
// change post to be the member
global $post;
preg_match( "/^.*\/(.*)\/donate\/?$/", $_SERVER['REQUEST_URI'], $matches );
$post = get_page_by_path( $matches[1], OBJECT, 'people_member' );
setup_postdata( $post ); ?>

<div class="container">

	<div class="row member-donate">

		<div class="col-md-12">

			<h1>A simple way to support <?php the_title(); ?></h1>

		</div>

		<div class="col-md-2"></div>

		<div class="col-md-8">

			<p>Donate to help our efforts of discovering  more talented souls and giving them a second chance</p>

		</div>

		<div class="col-md-12">

			<form class="form-inline" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<div class="form-group">
					<label for="amount" class="sr-only">Amount</label>
					<input type="number" class="form-control" id="amount" name="amount" placeholder="$">
				</div>
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="on1" value="Member">
				<input type="hidden" name="os1" value="<?php the_title(); ?>">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="business" value="latifabid.hba@gmail.com">
				<input type="hidden" name="return" value="<?php the_permalink(); ?>donate/finished/">
				<input type="hidden" name="cancel_return" value="<?php the_permalink(); ?>donate/">
				<button type="submit" class="btn btn-primary btn-lg">Give Donation</button>
			</form>

		</div>

	</div>

</div>

<?php get_footer(); ?>