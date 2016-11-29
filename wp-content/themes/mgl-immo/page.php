<?php get_header(); ?>
	<section role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="contentWrap">
					<div class="container">
						<?php get_template_part( 'content', 'page' ); ?>

						<?php if (function_exists('has_sub_field')): ?>
							<?php while(have_rows('zusatzinhalt')) : the_row(); ?>
								<?php if (get_row_layout() == 'inhalt-layout'): ?>
									<?php if (get_sub_field('inhalt')): ?>
									
											<div class="zusatzInhalt">
												<?php 
													if (substr_count(get_sub_field('inhalt'), '<hr />') === 1) {
														$content_parts = explode('<hr />', get_sub_field('inhalt'));
														echo '<div class="row">';
															echo '<div class="col-md-6">';
																echo apply_filters( 'the_content', $content_parts[0] );
															echo '</div>';
															echo '<div class="col-md-6">';
																echo apply_filters( 'the_content', $content_parts[1] );
															echo '</div>';
														echo '</div>';
													} else {
														echo get_sub_field('inhalt');
													}
												?>
											</div>
								
									<?php endif ?>
								<?php endif ?>
								<?php if (get_row_layout() == 'tab-layout'): ?>
									<?php if (get_sub_field('tabs')): ?>
				       	        		<div class="row">
				       	        			<div id="accordion" class="panel-group">
				       	        			<?php $tabs = get_sub_field('tabs') ?>
				       	        			<?php $i = 0; ?>
				       	        			<?php $count = count($tabs) ?>
				       	        				<div class="col-md-6">
				       	        				<?php foreach ($tabs as $tab): ?>
			       	        						<?php if ($i !== 0 && $i % (round($count/2)) === 0): ?>
			       	        							</div><div class="col-md-6 smallMargin">
			       	        						<?php endif ?>
			       	        						<div class="tabWrap panel">
			   	        								<div class="tabInner">
			   	        								<?php if ($tab['tab-titel']): ?>
			   	        									<a class="collapse-toggle" href="<?php echo '#' . sanitize_key($tab['tab-titel']) ?>">
			   	        								
			   	        											<i class="fa fa-plus" aria-hidden="true"></i> <?php echo $tab['tab-titel']; ?> 
			   	        										
			   	        									</a>
			   	        								</div>
			        									<div id="<?php echo sanitize_key($tab['tab-titel']) ?>" class="panel-collapse collapse">
			        										<?php echo $tab['tab-text'] ?>       	       
			        									</div>
			        								<?php endif ?>       	        					
			       	        						</div>
				       	        					<?php $i++; ?>
				       	        				<?php endforeach ?>
				       	        				</div>
				       	        			</div>
				       	        		</div>
									<?php endif ?>
								<?php endif ?>
							<?php endwhile; ?>
						<?php endif; ?>
						
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
