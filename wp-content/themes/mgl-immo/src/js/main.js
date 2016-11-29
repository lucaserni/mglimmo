(function () {
	"use strict";

	var $ = jQuery;
	$(document).ready(function(){	


		$('.matchHeight').matchHeight();

		/*var animate = $('.bannerHome');
		function loopbackground() {
		    animate.css('background-position', '0px 0px');
		    $({position_x: 0, position_y: 0}).animate({position_x: -5000, position_y: 0}, {
		        duration: 45000,
		        easing: 'linear',
		        step: function() {
		            animate.css('background-position', this.position_x+'px '+this.position_y+'px');
		        },
		        complete: function() {
		            loopbackground();
		        }
		    });
		}
		loopbackground();*/

		$('.banner').parallax();

		$('.secondBanner').parallax();

		//simple alternative lightbox for casasync (turn off Feather Light within the backend to avoid conflicts)
		//$('.property-image-gallery').fancybox();

		//fancybox implementation example for all images (you may turn this off and activate the above statement instead if only the plugin should be targeted)
		jQuery.fn.getTitle = function() { // Copy the title of every IMG tag and add it to its parent A so that fancybox can show titles
			var arr = jQuery("a.fancybox");
			jQuery.each(arr, function() {
				var title = jQuery(this).children("img").attr("title");
				jQuery(this).attr('title',title);
			});
		};

		var thumbnails = jQuery("a:has(img)").not(".nolightbox").filter( function() { return /\.(jpe?g|png|gif|bmp)$/i.test(jQuery(this).attr('href')) });
		thumbnails.addClass("fancybox").attr("rel","fancybox").getTitle();
		jQuery("a.fancybox").fancybox();

		//mobile header nav click toggles also
		$('.navbar-header').click(function(event) {
	    	if ($(event.target).hasClass('navbar-header') || $(event.target).hasClass('navbar-brand')) {
	    		$(this).find('.navbar-toggle').click();
	    	}
	    });

	    //google maps
	        function initializeMap($mapwraper) {
	            var location = new google.maps.LatLng($mapwraper.data('lat'),$mapwraper.data('lng'));
	            var mapOptions = {
	              zoom: parseInt(window.casawpOptionParams.google_maps_zoomlevel),
	              mapTypeId: google.maps.MapTypeId.ROADMAP,
	              center: location,
	              disableDefaultUI: false,
	              zoomControl: true,
	              scrollwheel: false,
	              zoomControlOptions: {
	              	style: google.maps.ZoomControlStyle.SMALL,
	              	position: google.maps.ControlPosition.LEFT_BOTTOM
	              },
	              mapTypeControlOptions: {
	              	mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'gray_map']
	              }
	            };
	            $mapwraper.show();
	            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	            var marker = new google.maps.Marker({
	                map: map,
	                position: location,
	                icon: new google.maps.MarkerImage(
	                		'/wp-content/themes/moessinger/img/locationX2.png',
	                		new google.maps.Size(60,96),
	                		null,
	                		null,
	                		new google.maps.Size(30, 48)
	                	)
	            });
	            map.mapTypes.set('gray_map',
	            	new google.maps.StyledMapType([{stylers: [{saturation: -90}]}],
	            		{name: "Gray Map"}));
	            map.setMapTypeId('gray_map');
	        }
	       
	            if ($('.casawp-map').length && google) {
	                $('.casawp-map').each(function(){
	                    var $mapwraper = $(this);
	                    if ($mapwraper.data('lat') && $mapwraper.data('lng')) {
	                        var map;
	                        initializeMap($mapwraper);
	                    }
	                });
	            }


	    	    $('.open').click(function() {
	    	    
        			$(this).find('.fa').removeClass('fa-minus').addClass('fa-plus');	        
	    		
	    	    	
	    	    });

        	    $('.collapse-toggle').click(function(event) {
        	    	event.preventDefault();
        	    	if (accordionIsOpen($(this))) {
        	    		resetAccordion();
            			openAcoordionItem($(this));
        	    	} else {
        	    		resetAccordion();
        	    		closeAcoordionItem($(this));
        	    		
        	    	};
        	    	
        	    });

	    	    


        	    function resetAccordion(){
        	    
        	    	$('.collapse-toggle').find('.fa').removeClass('fa-minus').addClass('fa-plus');
        	    	$('.panel-collapse:not(.collapse)').slideUp("slow");
        	    }

        	    function openAcoordionItem($elem){
        	 		var $shelf = $elem.parent().next();

        	    	$elem.find('.fa').removeClass('fa-plus').addClass('fa-minus');
        	    	$shelf.slideDown('slow', function(){
        	    		$shelf.removeClass("collapse");
        	    	});
        	    }

        	    function closeAcoordionItem($elem){
        	    	var $shelf = $elem.parent().next();

        	    	$elem.find('.fa').removeClass('fa-minus').addClass('fa-plus');
        	    	$shelf.slideUp('slow', function(){
        	    		$shelf.addClass("collapse");
        	    	});
        	    }

        	    function accordionIsOpen($elem){
        	    		
        	    	return ($elem.find('.fa').hasClass('fa-plus') ? true : false);
        	    }


	    /*----------Google Maps------------*/

	    function initialize() {
	    	var mapOptions = {
	    		center: {lat: 46.933896, lng: 7.423095},
	    		scrollwheel: false,
	    		zoom: 14,
	    		mapTypeControlOptions: {
	    			mapTypeIds: ['gray_map', google.maps.MapTypeId.SATELLITE]
	    		}
	    	};
	    	var map = new google.maps.Map(document.getElementById("googleMap"),
	    		mapOptions);


	    	var markerpos = new google.maps.LatLng(46.933896, 7.423095);
	    	var marker = new google.maps.Marker({
	    		position: markerpos,
	    		map: map,
	    		title: "Mössinger Immobilien",
	    		url: "https://www.google.ch/maps/place/Max+M%C3%B6ssinger/@46.9338931,7.423091,15z/data=!4m2!3m1!1s0x0:0xe143b9f44020ef65?sa=X&ved=0ahUKEwjn0NOJ8cXOAhVG8RQKHZNiBLsQ_BIIajAK",
	    		icon: new google.maps.MarkerImage(
	    				'/wp-content/themes/moessinger/img/moe.png',
	    				new google.maps.Size(40,52),
	    				null,
	    				null,
	    				new google.maps.Size(40,52)
	    			)
	    	});


	    	// set gray style
	    	map.mapTypes.set('gray_map',
	    		new google.maps.StyledMapType([{stylers: [{saturation: -90}]}],
	    			{name: "Karte"}));
	    	map.setMapTypeId('gray_map');

	   /* 	var infowindow = new google.maps.InfoWindow();
	    	infowindow.setContent('<img class="img-responsive moeLogo" src="/wp-content/themes/moessinger/img/logo.png">');
	    	infowindow.open(map, marker);*/

	    	google.maps.event.addListener(marker, 'click', function() {
	    		window.open(this.url, '_blank');
	    	});
	    }
	    if ($("#googleMap").length) {
	    	google.maps.event.addDomListener(window, 'load', initialize);
	    };

	    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
	    		$(this).toggleClass('open');
	    	});


	    $('.casawp-property').click(function(){

	        var url = $(this).find('a').attr('href');
	        window.location.href = url;

	        return false;
	    });


	    /*$('.team-member').click(function(){
	    	var url = $(this).find('a').attr('href');
	    	window.location.href = url;

	    	return false;
	    });*/

	    $('.casawp-property').click(function(){
	    	var url = jQuery(this).find('a').attr('href');
	    	window.location.href = url;

	    	return false;
	    });


	    $.fn.clicktoggle = function(a, b) {
	        return this.each(function() {
	            var clicked = false;
	            $(this).click(function() {
	                if (clicked) {
	                    clicked = false;
	                    return b.apply(this, arguments);
	                }
	                clicked = true;
	                return a.apply(this, arguments);
	            });
	        });
	    };

	    $('.readmore-contents').css('height', $('.readmore-contents .teaser').height() + 30);
	    setTimeout(function() {
	    	$('.readmore-contents').removeClass('transition-delayer');
	    }, 800);
	    
	    $('.readmore-wrap .more').click(function() {
	    	var $readmore = $(this).siblings('.readmore-contents');
	    	if ($readmore.hasClass('show-full')) {
	    		$readmore.css('height', $('.readmore-contents .teaser').height() + 30);
	    		
	    		$(this).find('.collapse-arrow').css('transform', 'rotate(0deg)')

	    		setTimeout(function() {
	    			$readmore.removeClass('show-full');
	    			$readmore.parent().removeClass('show-full');
	    		}, 800);
	    	
	    		
	    	} else {
	    		$readmore.addClass('show-full');
	    		$readmore.parent().addClass('show-full');
	    		$readmore.css('height', $('.readmore-contents .complete').height() + 30);
	    		$(this).find('.collapse-arrow').css('transform', 'rotate(180deg)')
	    	};
	    	
	    });

	});
 
})(jQuery);