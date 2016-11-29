<?php 
	/*
* Template name: Kontakt mit Google Karte
*/
get_header(); 
?>
<div class="map-wrap hidden-xs">
	<?php if (get_field('markers')): ?>
		<div class="responsive-slide-wrap">
			<div class="responsive-slide">
				<div id="cs-map"></div>
				<?php $i = 0; foreach (get_field('markers') as $marker): $i++; ?>

					<?php if ($marker['lat-lng']): ?>
						<?php if ($i == 1): ?>
							<?php $firstlatlng =  $marker['lat-lng']?>
						<?php endif ?>
						<?php
							if (isset($marker['label-image']['sizes']['google-map-card'])) {
								$labelImage = $marker['label-image']['sizes']['google-map-card'];
							} else {
								$labelImage = '';
							}
							if (isset($marker['marker-image']['sizes']['medium'])) {
								$markerImage = $marker['marker-image']['sizes']['medium'];;
							} else {
								$markerImage = '';
							}
						?>
						<div class="marker" data-marker="<?php echo $marker['color']; ?>" data-lat="<?php echo $marker['lat-lng']['lat']; ?>" data-lng="<?php echo $marker['lat-lng']['lng']; ?>">
							<h2 class="title">
								<?php echo $marker['title']; ?>
							</h2>
							<?php if ($markerImage): ?>
								<div class="marker-image" data-url="<?php echo $markerImage; ?>">
									<img src="<?php echo $markerImage; ?>" alt="">
								</div>
							<?php endif ?>
							<?php if ( $labelImage): ?>
								<div class="label-image" data-url="<?php echo $labelImage; ?>">
									<img src="<?php echo $labelImage; ?>" alt="">
								</div>
							<?php endif ?>
							<div class="description" data-bgcolor="<?php echo $marker['bg-color']; ?>">
								<?php echo $marker['description']; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach ?>
			</div>
		</div>
		
	<?php else: ?>
		<div class="slide" style="background-image: url('<?php echo get_field('default-images', 'options')[0]['image']['sizes']['large'] ?>');"></div>
	<?php endif ?>
	
</div>
<a href="<?php echo 'http://maps.google.com/maps?q=loc:' . $firstlatlng['lat'] . ',' . $firstlatlng['lng'] ?>" target="_blank" class="btn btn-primary form-control map-link visible-xs">Standort Auf Google Maps anzeigen</a>
<section class="main" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>
			
		<?php endwhile; ?>
		
		
	<?php else : ?>
		<?php _e('no entries found', 'theme'); ?>
	<?php endif; ?>
</section>
<?php
	wp_enqueue_script("googlemap-js", get_template_directory_uri() . '/templates/contact-google-map/scripts.js', array( 'theme-assets' ));

	wp_enqueue_script("googlemap-api", 'https://maps.googleapis.com/maps/api/js?callback=initThemeMap', array( 'googlemap-js' ));
	

?>
<?php get_footer(); ?>
