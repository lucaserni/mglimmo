<?php 
	/*
* Template name: Dienstleistungen
*/
get_header(); 
?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="contentWrap">
					<div class="container">
						<?php get_template_part( 'content', 'page' ); ?>
						
						<?php if (get_field('kacheln')): ?>
							<div class="row">
								<?php foreach (get_field('kacheln') as $kachel): ?>
									<div class="col-md-4">
										<div class="kachelWrap matchHeight">
											<div class="kachelBild" <?php if ($kachel['bild']): ?>
												style="background-image: url(<?php echo $kachel['bild']['sizes']['large'] ?>)"
											<?php endif ?>></div>
											<?php if ($kachel['link']): ?>
												<a href="<?php echo $kachel['link'] ?>"></a>
												<?php if ($kachel['text']): ?>
													<h3>
														<?php echo $kachel['text'] ?>
													</h3>
													
												<?php endif ?>
											<?php endif ?>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						<?php endif ?>
						
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
				<?php if (function_exists('has_sub_field')): ?>
					<?php while(have_rows('zusatzinhalt')) : the_row(); ?>
						<?php if (get_row_layout() == 'second-slider-layout'): ?>
							<?php if (get_sub_field('second-slider')): ?>
								<div class="secondSliderOuter">
									<div class="container">
										<h1>Was unsere Kunden & Partner über uns sagen:</h1>
										<div class="secondSlider">
											<?php foreach (get_sub_field('second-slider') as $slide): ?>
												<div class="gallery-cell">
													<div class="row">
														<div class="col-md-3">
															<div class="kundenImage" style="background-image: url(<?php echo $slide['slide']['sizes']['banner'] ?>)"></div>
														</div>
														<div class="col-md-9">
															<?php if ($slide['text']): ?>
																<div class="slideText">
																	<?php echo $slide['text'] ?>
																</div>
															<?php endif ?>
														</div>
													</div>
													
													
												</div>
											<?php endforeach ?>
										</div>
										
									</div>
								</div>
								
							<?php endif ?>
						<?php endif ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<script>
					jQuery(function(){
						jQuery('.secondSlider').flickity({
							cellAlign: 'left',
							autoPlay: 20000,
							wrapAround: true,
							draggable: true,
							pageDots: false,
							prevNextButtons: true
						});
					});
				</script>
				
				
			<?php endwhile; ?>
		<?php else : ?>
			<?php _e('no entries found', 'theme'); ?>
		<?php endif; ?>
	</section>
<?php get_footer(); ?>
