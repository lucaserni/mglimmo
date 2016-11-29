<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<script src="<?php echo get_bloginfo('template_directory'); ?>/js/modernizr.min.js"></script>
	<?php wp_head(); ?>

	<!--[if lte IE 8]>
	<script src="<?php echo get_template_directory_uri(); ?>/bower_components/html5shiv/dist/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->
	
	
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory') ?>/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory') ?>/img/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory') ?>/img/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory') ?>/img/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory') ?>/img/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory') ?>/img/android-chrome-192x192.png" sizes="192x192">
	<meta name="msapplication-square70x70logo" content="<?php echo get_bloginfo('template_directory') ?>/img/smalltile.png" />
	<meta name="msapplication-square150x150logo" content="<?php echo get_bloginfo('template_directory') ?>/img/mediumtile.png" />
	<meta name="msapplication-wide310x150logo" content="<?php echo get_bloginfo('template_directory') ?>/img/widetile.png" />
	<meta name="msapplication-square310x310logo" content="<?php echo get_bloginfo('template_directory') ?>/img/largetile.png" />
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOPYZoLRaPFSg5JVwr7Le06qPpWd5jCU8"></script>
	 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body id="top" <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<div id="header" class="site-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="logoOuter">
							<a id="logo" class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" alt="">
							</a>
						</div>
						<div class="buttonOuter">
							<button type="button" id="nav-icon3" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobileMainMenuCollapse">
							  <span></span>
							  <span></span>
							  <span></span>
							  <span></span>
							</button>
						</div>
					</div>
					
				</div>
			</div>
				<nav id="navigation">
					<?php wp_nav_menu( array( 'container_class' => 'main-menu', 'menu_class' => 'hidden-xs nav', 'theme_location' => 'mainmenu', 'fallback_cb' => false ) ); ?>
				</nav>
		
		</div>
		
		<nav id="mobileNavigation" class="navbar navbar-default visible-md visible-sm visible-xs" role="navigation">        	
			<div class="collapse navbar-collapse " id="mobileMainMenuCollapse">
				<?php wp_nav_menu( array( 'container_class' => 'mobile-main-menu', 'menu_class' => 'nav navbar-nav', 'theme_location' => 'mainmenu', 'fallback_cb' => false ) ); ?>
			</div>
		</nav>
		<?php
			$attachments = null;
			$title = null;
			if(is_singular('casawp_property')) {
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'exclude' => get_post_thumbnail_id()
				) );
				$images = array();
				if (get_post_thumbnail_id()) { 
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'banner');
					$images[0]['image']['sizes']['banner'] = $img[0];
				}
				if ( $attachments ) {
					$i = 1;
					foreach ( $attachments as $attachment ) {
						$img = wp_get_attachment_image_src($attachment->ID, 'banner');
						$images[$i]['image']['sizes']['banner'] = $img[0];
						$i++;
					}
					
				}
				?>
				<script>

					
				</script>
			<?php } else {
				$images = 0;
			}

		?>
		<?php if (is_singular('casawp_property')): ?>
			<div class="main-slider-immo">
				<?php if ($images): ?>
			        <?php foreach ($images as $slide): ?>
				        <?php if (isset($slide['image']['sizes']['banner'])): ?>
				        	<div class="galleryCellOuter">
				        		<img class="gallery-cell" src="<?= $slide['image']['sizes']['banner']; ?>" alt="">
				        		<div class="inner"></div>
				        	</div>
				           

				        <?php endif; ?>
			        <?php endforeach ?>
			        <script>
			            jQuery(function(){
			               
			                jQuery('.main-slider-immo').flickity({
			                    cellAlign: 'center',
			                    autoPlay: 7000,
			                    draggable: false,
			                    contain: true,
			                   // wrapAround: true,
			                    pageDots: false,
			                    imagesLoaded: true,
			                    arrowShape: { 
			                      x0: 10,
			                      x1: 60, y1: 50,
			                      x2: 60, y2: 45,
			                      x3: 15
			                    },
			                    selectedAttraction: 0.02
			                   // friction: 0.15
			                });
			            });
			        </script>
			    <?php endif ?>
			</div>
			
		<?php else: ?>
			<?php if (get_field('banner')): ?>
				<div class="banner" data-parallax="scroll" data-bleed="10" data-speed="0.7" data-positionY="100" data-image-src="<?php echo get_field('banner')['sizes']['banner'] ?>">
					<div class="container">
						<div class="bannerInner">
						<?php if (!is_page_template('page-template-home.php') && !is_page_template('page-template-ueberuns.php') && !is_page_template('templates/team-archive.php') && !is_page_template('page-template-partner.php')): ?>
							<div class="jubi">
								<img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/50-jahr.png" alt="">
							</div>
						<?php endif ?>
							
						</div>
					</div>
				</div>
			<?php elseif(get_field('banner-immo', 'option')): ?>
				<div class="banner" data-parallax="scroll" data-bleed="10" data-speed="0.7" data-image-src="<?php echo get_field('banner-immo', 'option')['sizes']['banner'] ?>">
					<div class="container">
						<div class="bannerInner">
						<?php if (!is_page_template('page-template-home.php')): ?>
							<div class="jubi">
								<img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/50-jahr.png" alt="">
							</div>
						<?php endif ?>
							
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>
		<div id="content" class="site-main">
