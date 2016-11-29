<?php 
	/*
* Template name: Kontakt
*/
get_header(); 
?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="contentWrap">
					<div class="container">
						<?php get_template_part( 'content', 'page' ); ?>
						<?php if (get_field('kontaktperson')): ?>
							<h1 class="kontaktTitel">Kontaktperson</h1>
							<div class="row">
								<?php foreach (get_field('kontaktperson') as $kontakt): ?>
									<div class="col-md-6">
										<div class="kontaktPersonWrap">
											<div class="row">
												<div class="col-md-6">
													<?php if ($kontakt['bild']): ?>
														<div class="kontaktBild" style="background-image: url(<?php echo $kontakt['bild']['sizes']['large'] ?>)">
															<?php if ($kontakt['name']): ?>
																<div class="kontaktName">
																	<?php echo $kontakt['name'] ?>
																</div>
															<?php endif ?>
														</div>
													<?php endif ?>
												</div>
												<div class="col-md-6">
													<div class="kontaktText">
														<?php if ($kontakt['name']): ?>
															<?php echo $kontakt['name'] ?><br>
														<?php endif ?>
														<?php if ($kontakt['funktion']): ?>
															<?php echo $kontakt['funktion'] ?><br><br>
														<?php endif ?>
														<?php if ($kontakt['telefon']): ?>
															<?php echo $kontakt['telefon'] ?><br>
														<?php endif ?>
														<?php if ($kontakt['e-mail']): ?>
															<a href="mailto:<?php echo $kontakt['e-mail'] ?>"><?php echo $kontakt['e-mail'] ?></a>
														<?php endif ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
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
