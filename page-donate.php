<?php get_header(); ?>

<div class="container">

	<div class="row member-donate">

		<div class="col-md-12">

			<h1>A simple way to support us</h1>

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
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="business" value="latifabid.hba@gmail.com">
				<input type="hidden" name="return" value="<?php the_permalink(); ?>finished/">
				<input type="hidden" name="cancel_return" value="<?php the_permalink(); ?>">
				<button type="submit" class="btn btn-primary btn-lg">Give Donation</button>
			</form>

		</div>

	</div>

</div>

<?php get_footer(); ?>