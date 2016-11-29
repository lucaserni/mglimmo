			</div>
			<?php if (is_page_template('page-template-contact.php')): ?>
				<div id="googleMap"></div>
				<div class="mapLink">
					<a href="https://www.google.ch/maps/place/Max+M%C3%B6ssinger/@46.933628,7.4233241,19.85z/data=!4m5!3m4!1s0x0:0xe143b9f44020ef65!8m2!3d46.9338931!4d7.423091" target="_blank">Auf Google Maps anzeigen</a>
				</div>
			<?php endif ?>
			
			<div id="footer" class="site-footer" role="contentinfo">
				<div class="container">
					
					<div class="row">
						<div class="col-md-3">
						<h3>Adresse</h3>
							<div class="footerAddress">
								<div itemscope itemtype="http://schema.org/Organization">
									<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<address>
											
						                    <span itemprop="streetAddress">
						                    	Grenzweg 1 <br>
						                    </span>
						                    <span>
						                    	Postfach 108 <br>
						                    </span>
						                    <span itemprop="postalCode">3097</span>
						                    <span itemprop="addressLocality">
						                    	Liebefeld <br>
						                    </span>
						                    
						                </address>Tel. 
						            	<span itemprop="telephone">
						            		031 972 21 28 <br>
						            	</span>
						            	<a href="mailto:info@moessinger.ch">info@moessinger.ch</a>
						            </div>
						    	</div>
								
							</div>
						</div>
						<div class="col-md-3">
							<h3>Öffnungszeiten</h3>
							Montag bis Donnerstag<br>
							08:00 bis 12:00 Uhr<br>
							13:00 bis 17:00 Uhr<br><br>
							Freitag<br>
							08:00 bis 12:00 Uhr<br>
							13:00 bis 16:00 Uhr<br>

						</div>
						<div class="col-md-3">
							<h3>Mitgliedschaften</h3>
							<div class="mitgliedschaften">
								<a href="http://www.hev-bern.ch/" target="_blank"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/hev.png" alt=""></a>
								<a href="http://www.svit.ch/" target="_blank"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/svit.png" alt=""></a>
								<a href="http://www.bern-cci.ch/" target="_blank"><img class="img-responsive hik" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/hik.png" alt=""></a>
								<a href="http://www.siv.ch/" target="_blank"><img class="img-responsive hik" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/siv.png" alt=""></a>
								
								
								
								
								
							</div>
							
						</div>
						<div class="col-md-3">
							<?php wp_nav_menu( array( 'container_class' => 'footer-menu', 'menu_class' => 'nav', 'theme_location' => 'footmenu', 'fallback_cb' => false ) ); ?>
							<div class="logoOuter">
								<a id="logo" class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo_white.png" alt="">
								</a>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>