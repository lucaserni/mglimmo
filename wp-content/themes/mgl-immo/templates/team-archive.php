<?php 
/*
* Template name:  Team Archiv
*/
get_header();
?>
<div class="contentWrap">
	<div class="container">
		
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>


					<?php 
						if (get_field('is_grouped') == 'true'){
							$groups = get_field('groups');
						} else {
							$groups[0]['groupname'] = false;
							$groups[0]['members'] = get_field('members');
						}
					?>
					<div class="teamOuter">
						<div class="row">
						<?php foreach ($groups as $group): ?>
							<div class="col-md-12">
								<h2><?php echo $group['groupname']; ?></h2>
								<div class="row">
									<?php foreach ($group['members'] as $member): ?>
										<?php if (in_array('image', get_field('show_fields'))): ?>		
											<?php if ($member['image']): ?>
												<?php $image_url = $member['image']['sizes']['large'] ?>
											<?php else: ?>
												<?php $image_url = get_template_directory_uri() . '/templates/team-archive/img/placeholder-person.jpg'; ?>
											<?php endif ?>
										<?php endif ?>
										<div class="col-md-3 col-sm-6">
											<article class="team-member">
												
												<?php if (in_array('image', get_field('show_fields'))): ?>
													<div class="team-image-wrap">
														<div class="team-responsive-sized-image portrait" style="background-image: url('<?php echo $image_url ?>')"></div>
														<div class="teamInner">
															<?php if ($member['name']): ?>
																<b><?php echo $member['name']; ?></b>
															<?php endif ?>
															<?php if ($member['function']): ?>
																<?php echo $member['function']; ?><br>
															<?php endif ?>
															<?php if ($member['apprenticeship']): ?>
																<?php echo $member['apprenticeship']; ?><br><br>
															<?php endif ?>
															<?php if ($member['mail']): ?>
																<a href="mailto:<?php echo $member['mail'] ?>">
																	<i class="fa fa-envelope-o" aria-hidden="true"></i>
																</a><br>	
															<?php endif ?>
														</div>
													</div>
												<?php endif ?>		
	
												<?php if ($member['name']): ?>
													<b><?php #echo $member['name']; ?></b>
												<?php endif ?> 
												<?php if ($member['function']): ?>
													<?php #echo $member['function']; ?>
												<?php endif ?>
												
												<?php if ($member['phone']): ?>
													Telefon: <?php echo $member['phone']; ?><br>
												<?php endif ?>
												<?php if ($member['mobile']): ?>
													Mobile <?php echo $member['mobile']; ?><br>
												<?php endif ?>
												<?php if ($member['apprenticeship']): ?>
													<?php #echo $member['apprenticeship']; ?>
												<?php endif ?>
												<?php if ($member['description']): ?>
													<?php echo $member['description']; ?><br>
												<?php endif ?>	
												<div class="clearfix"></div>
											</article>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endforeach ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php _e('no entries found', 'theme'); ?>
			<?php endif; ?>
			
			<?php
				// Include Plugin JS like this
				//wp_enqueue_script("partner", get_template_directory_uri() . '/templates/team-archive/plugins/fancybox.js', array( 'theme-assets' ));
			?>
		
		
	</div>
</div>
<?php if (function_exists('has_sub_field')): ?>
	<?php while(have_rows('zusatzinhalt')) : the_row(); ?>
		<?php if (get_row_layout() == 'second-slider-layout'): ?>
			<?php if (get_sub_field('second-slider')): ?>
				<div class="secondSlider">

					<?php foreach (get_sub_field('second-slider') as $slide): ?>
						<div class="gallery-cell" style="background-image:url(<?php echo $slide['slide']['sizes']['banner'] ?>)">
							<?php if ($slide['text']): ?>
								<div class="overlay"></div>
								<div class="container">
									<div class="slideText">
										<?php echo $slide['text'] ?>
									</div>
								</div>
							<?php endif ?>
						</div>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		<?php endif ?>
	<?php endwhile; ?>
<?php endif; ?>
<script>
	jQuery(function(){
		jQuery('.secondSlider').flickity({
			cellAlign: 'left',
			autoPlay: 10000,
			wrapAround: true,
			draggable: true,
			pageDots: false,
			prevNextButtons: false
		});
	});
</script>
<?php get_footer(); ?>
