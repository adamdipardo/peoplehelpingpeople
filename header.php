<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container-fluid">
			<header class="row header">
				<?php // get hero options
				$hero_classes = [];
				if ( get_field( 'shade_featured_image' ) ):
					$hero_classes[] = "shade";
				endif;
				if ( get_field( 'featured_image_position' ) == 'bottom' ):
					$hero_classes[] = "bottom";
				elseif ( get_field( 'featured_image_position' ) == 'top' ):
					$hero_classes[] = "top";
				endif; ?>
				<div class="col-md-12 hero <?php echo join( ' ', $hero_classes ); ?>" style="<?php people_get_header_background_image(); ?>">
					<nav class="navbar">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								 <a class="navbar-brand" href="<?php echo get_home_url(); ?>">People<strong>Helping</strong>People</a>
							</div>
							<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
								<?php wp_nav_menu( array( 'menu' => 'people_header_menu', 'menu_class' => 'nav navbar-nav', 'container' => 'ul' ) ); ?>
							</div>
						</div>
					</nav>
				</div>
			</header>
			<div class="row">
				<div class="col-md-12" id="content">