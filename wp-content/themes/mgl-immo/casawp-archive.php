<?php 
/*
Template Name: Property list
*/
__( 'Property list', 'casawp' );
?>
<?php get_header() ?>

<?php echo stripslashes(get_option('casawp_before_content')); ?>
<section role="main">
	<div class="contentWrap">
		<div class="container">
				<div class="filterWrap">
					<div class="row">
						<div class="col-md-12 casawp-archive-filter">
						<h1>SUCHEN SIE IHR ZUHAUSE</h1>
							<?php echo $casawp->renderArchiveFilter() ?>
							<?php //wp_tag_cloud(array('taxonomy' => 'casawp_feature')); ?>
						</div>
					</div>
					
				</div>
		
			
				<?php if (is_tax('casawp_salestype') || is_tax('casawp_availability') || is_tax('casawp_category') || is_tax('casawp_location') || is_post_type_archive( 'casawp_property' )) : ?>
					<?php $archive = new casawp\Archive(); ?>
				    <?php $items = array(); ?>
				    <?php while ( have_posts() ) : the_post();
				    	$single = new casawp\Single($post);
				    	$offer = $casawp->prepareOffer($post);
				    	if ($single->address_street) {
				    		$lat = get_post_meta( get_the_ID(), 'property_geo_latitude', true );
				    		$lng = get_post_meta( get_the_ID(), 'property_geo_longitude', true );
				    	}
			    		
			    		if ($lat && $lng) {
							
							$items[] = array(
								'id' => get_the_ID(),
								'link' => $single->getPermalink(), 
								'lat' => $lat, 
								'lng' => $lng
							);
						}
					endwhile; 
					?>
					<script type="text/javascript">
				      function initialize() {
				        var mapOptions = {
				          center: { lat: 47.023907, lng: 8.325372},
				          zoom: 14,
				          maxZoom: 15
				        };
				        
				        var map = new google.maps.Map(document.getElementById('mapExtend'),
				            mapOptions);
				        var bounds = new google.maps.LatLngBounds();
						<?php $i=0; ?>
						<?php foreach ($items as $item) : ?>
							<?php $i++; ?>
							var markerpos = new google.maps.LatLng(<?= $item['lat']?>,<?= $item['lng']?>);
							var marker = new google.maps.Marker({
						      position: markerpos,
						      map: map,
						      title: '',
						      animation: google.maps.Animation.DROP,
						      url: '<?= $item['link'] ?>',
						      icon: new google.maps.MarkerImage(
						      		'/wp-content/themes/moessinger/img/locationX2.png',
						      		new google.maps.Size(60,96),
						      		null,
						      		null,
						      		new google.maps.Size(30, 48)
						      	)
							});
							bounds.extend(markerpos);
							map.fitBounds(bounds);
							// set gray style
							map.mapTypes.set('gray_map',
								new google.maps.StyledMapType([{stylers: [{saturation: -90}]}],
									{name: "Karte"}));
							map.setMapTypeId('gray_map');
							google.maps.event.addListener(marker, 'click', function() {
							    window.location.href = this.url;
								});
						<?php endforeach; ?>	




							    <?php $i=0; ?>
							    <?php foreach ($items as $item) : ?>
									<?php $i++; ?>
									var markerpos = new google.maps.LatLng(<?= $item['lat']?>,<?= $item['lng']?>);
									bounds.extend(markerpos);
									map.fitBounds(bounds);
								<?php endforeach; ?>	

				        
				    }

				    
				    google.maps.event.addDomListener(window, 'load', initialize);

			
				    </script>
				        <div class="row">
				    	    <div class="col-md-12">
				    	    	<div id="featuredImage">
				    	    		<div id="mapExtend" style="height: 400px; width: 100%;">
				    	    		</div>
				    	    	</div>
				    	    	
				    	    </div>
				        	
				        </div>
				    		
				    	<?php endif;  ?>
			<div class="casawp-archive casawp-row">
				<?php if ( have_posts() ): ?>
					<div class="col-md-12 casawp-archive-list">
						<?php while ( have_posts() ) : the_post(); ?>
							<?= $casawp->renderArchiveSingle($post); ?>
						<?php endwhile; ?>
						<?= $casawp->renderArchivePagination() ?>
						<?php wp_reset_query(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	
</section>
<?php echo stripslashes(get_option('casawp_after_content')); ?>

<?php get_footer() ?>