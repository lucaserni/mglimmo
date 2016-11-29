<?php 
	/*
* Template name: Home
*/
get_header(); 
?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="contentWrap">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="homeContentOuter">
									<div class="logoOuter tempHome">
										<a  class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="blank">
											<img class="img-responsive mglLogo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mgl-logo.png" alt="">
										</a>
									</div>
									<a class="homeLinks" href="/immobilien-vermarktungsart/rent/">
										<svg class="icon icon-key"><use xlink:href="#icon-key">
											<symbol id="icon-key" viewBox="0 0 16 16">
											<title>key</title>
											<path class="path1" d="M11 0c-2.761 0-5 2.239-5 5 0 0.313 0.029 0.619 0.084 0.916l-6.084 6.084v3c0 0.552 0.448 1 1 1h1v-1h2v-2h2v-2h2l1.298-1.298c0.531 0.192 1.105 0.298 1.702 0.298 2.761 0 5-2.239 5-5s-2.239-5-5-5zM12.498 5.002c-0.828 0-1.5-0.672-1.5-1.5s0.672-1.5 1.5-1.5 1.5 0.672 1.5 1.5-0.672 1.5-1.5 1.5z"></path>
											</symbol>
										</use></svg><br><br>
										MIETOBJEKTE
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="homeContentOuter">
									<div class="logoOuter tempHome">
										<a class="site-logo" href="http://moessinger.ch" target="blank">
											<img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/moe-logo.png" alt="">
										</a>
									</div>
									<a class="homeLinks" href="http://moessinger.ch/immobilien-vermarktungsart/buy/" target="blank">
										<svg class="icon icon-home3"><use xlink:href="#icon-home3">
											<symbol id="icon-home3" viewBox="0 0 16 16">
											<title>home3</title>
											<path class="path1" d="M16 9.5l-3-3v-4.5h-2v2.5l-3-3-8 8v0.5h2v5h5v-3h2v3h5v-5h2z"></path>
											</symbol>
										</use></svg><br><br>
										KAUFOBJEKTE
									</a>
									<a class="homeLinks" href="http://moessinger.ch/immobilienbewertung" target="blank">
										<svg class="icon icon-stats-bars"><use xlink:href="#icon-stats-bars"><symbol id="icon-stats-bars" viewBox="0 0 16 16">
										<title>stats-bars</title>
										<path class="path1" d="M0 13h16v2h-16zM2 9h2v3h-2zM5 5h2v7h-2zM8 8h2v4h-2zM11 2h2v10h-2z"></path>
										</symbol></use>
										</svg><br><br>
										IMMOBILIEN<br>BEWERTUNG
									</a>
									<a class="homeLinks" href="http://moessinger.ch/bauherrenberatung" target="blank">
										<svg class="icon icon-office"><use xlink:href="#icon-office">
											<symbol id="icon-office" viewBox="0 0 16 16">
											<title>office</title>
											<path class="path1" d="M0 16h8v-16h-8v16zM5 2h2v2h-2v-2zM5 6h2v2h-2v-2zM5 10h2v2h-2v-2zM1 2h2v2h-2v-2zM1 6h2v2h-2v-2zM1 10h2v2h-2v-2zM9 5h7v1h-7zM9 16h2v-4h3v4h2v-9h-7z"></path>
											</symbol>
										</use></svg><br><br>
										BERATUNG<br>PROJEKTENTWICKLUNG
									</a>
								</div>	
								
							</div>
						</div>
						<?php if (get_the_content()): ?>
							<div class="section-content">
								<?php the_content() ?>
							</div>
						<?php endif ?>

					</div>
				</div>
				
				
				

			<?php endwhile; ?>
		<?php else : ?>
			<?php _e('no entries found', 'theme'); ?>
		<?php endif; ?>
	</section>
<?php get_footer(); ?>
