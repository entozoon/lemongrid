$(document).ready(function() {

	// Text replace
	if ($('.replace').length) {
		$('.replace').each(function() {
			$(this)
				.attr('data-label', $(this).val())
				.focus(function() {
					if ($(this).val() == $(this).attr('data-label')) {
						$(this).removeClass('replace').val('');
					}
				})
				.blur(function() {
					if (!$(this).val()) {
						$(this).addClass('replace').val($(this).attr('data-label'));
					}
				});
		});
	}


	initSliders();
	
	initValidation();

	initMaps();


	var winWidth = $(window).width(),
		winHeight = $(window).height();

	$(window).resize(function(){
		var winNewWidth = $(window).width(),
		winNewHeight = $(window).height();

		if(winWidth!=winNewWidth || winHeight!=winNewHeight) {
			resizeThings();
			setTimeout(function() {
				resizeThings();
			}, 100);
			
		}

		winWidth = winNewWidth;
		winHeight = winNewHeight;
	});

	var resizing = setInterval(function() {
		if ($('.content').outerHeight() != 0) {
			resizeThings();
			clearInterval(resizing);
		}
	}, 100);

});


function resizeThings() {
	destroySliders();
	initSliders();

	setMatchHeights();
}



function setMatchHeights() {
	// Divs that match each other's heights
	if ($('.js-match-heights').length) {
		var elements = [];
		var count = 0;
		var tallestHeight = 0;

		// Gather height matching elements
		$('.js-match-heights').each(function() {
			elements[count] = $(this);
			count++;
		})

		// Deduce the tallest one
		for (var i=0; i<count; i++) {
			$(elements[i]).css('height', 'auto');

			if ($(elements[i]).outerHeight() > tallestHeight)
				tallestHeight = $(elements[i]).outerHeight();
		}

		// Set them all to this height
		for (var i=0; i<count; i++)
			$(elements[i]).outerHeight(tallestHeight);
	}
}




function destroySliders() {
	if ($('.slider-pager').length)
		$('.slider-pager').each(function() { $(this).remove(); });

	if ($('.slider-arrows').length)
		$('.slider-arrows').each(function() { $(this).remove(); });

	if ($('.slider').length)
		$('.slider').each(function() { $(this).cycle('destroy'); });

	if ($('.carousel').length) {
		$('.carousel').each(function() {
			$(this).trigger('destroy');

			$(this).children('div').removeClass('active').removeAttr('data-index').unbind();
		});
	}
}

function initSliders() {
	slidersInitialising = true;
	// Sliders with various customisable peripherals
	if ($('.slider').length) {
		$('.slider').each(function() {
			var slider = $(this);

			if (slider.children('div').size()>1) {
				var options = {
					fx:     'scrollHorz',
					speed:  'slow',
					timeout: 0,
					nowrap: false,
					slideResize: false,
					containerResize: true
				};

				// add a wrapper for peripherals and copy the slider outer width
				if (!slider.parent().hasClass('slider-wrapper')) {
					slider.wrap('<div class="slider-wrapper" style="position: relative" />');
					slider.parent().width(slider.outerWidth());
				}

				if (slider.hasClass('slider-fade'))
					options['fx'] = 'fade';

				// create the pagination div if necessary
				if (slider.hasClass('slider-has-pager')) {
					slider.after('<div class="slider-pager"><div><div><div class="slider-pager__inner">');
					
					var pager = slider.next('.slider-pager').children('div').find('.slider-pager__inner');
					options['pager'] = pager;

					// set pager div to higher z-index than slides
					slider.parent().find('.slider-pager').css('z-index', (slider.children('div').length + 2));
				}

				// create prev / next arrows
				if (slider.hasClass('slider-has-arrows')) {
					if (slider.hasClass('slider-pager-arrows')) {
						pager.parent().prepend('<div class="slider-arrows"><div class="previous">&nbsp;</div><div class="next">&nbsp;</div></div>');
						//pager.parent().append('<div class="arrows"><div class="next"></div></div>');
					}
					else {
						slider.after('<div class="slider-arrows"><div class="slider-arrows__inner"><div class="previous"></div><div class="next"></div></div></div>');
					}
					if (slider.hasClass('slider-arrows-middle')) {
						var arrows = slider.parent().find('.slider-arrows');
						var top = slider.outerHeight() / 2 - arrows.find('.slider-arrows__inner').children('div').outerHeight() / 2;
						c(arrows.find('.slider-arrows__inner').children('div').outerHeight() );
						arrows.css('top', top + 'px');
					}


					if (slider.hasClass('slider-pager-arrows')) {
						options['prev'] = slider.next('.slider-pager').find('.previous');
						options['next'] = slider.next('.slider-pager').find('.next');
					}
					else {
						options['prev'] = slider.next('.slider-arrows').find('.previous');
						options['next'] = slider.next('.slider-arrows').find('.next');
					}

					// set arrows div to higher z-index than slides
					slider.next('.slider-arrows').css('z-index', (slider.children('div').length + 2));
				}

				// look for slider-timeout-[num] classes and parse
				var timeout = slider.attr('class').match(/\bslider-timeout-(\d+)/);
				if (timeout)
					options['timeout'] = timeout[1];

				slider.cycle(options);

				// set the paginator width if necessary (so as to center it)
				if (slider.hasClass('slider-pager-centralised') && slider.hasClass('slider-has-pager')) {
					var itemWidth = pager.children('a').width();
					var marginLeft = parseInt(pager.children('a').css('margin-left').replace(/[^-\d\.]/g, ''));
					var marginRight = parseInt(pager.children('a').css('margin-right').replace(/[^-\d\.]/g, ''));

					itemWidth = itemWidth + marginLeft + marginRight;

					var count = pager.children('a').length;
					var width = count * itemWidth;

					pager.css('width', width);
				}
			}
		});
	}

	// Slider carousels
	if ($('.carousel').length) {

		$('.carousel').each(function() {

			$(this).children('div').each(function(i) {
				$(this).attr('data-index', i);
			});

			var previous = $(this).siblings('.previous');
			var next = $(this).siblings('.next');

			var options = {
				direction: 'left',
				align: 'left',
				width: '100%',
				height: 60,
				auto: false,
				circular: false,
				infinite: false,
				prev: previous,
				next: next
			};

			if ($(this).hasClass('vertical')) {
				options[width] = 60;
				options[direction] = 'up';
			}

			$(this).carouFredSel(options);

			$(this).children('div').first().addClass('active');

			// When thumbs are clicked, open respective image in adjacent slider
			$(this).children('div').bind('click', function() {
				var imagenum = parseInt($(this).attr('data-index'));

				$(this).parent().children().removeClass('active');
				$(this).addClass('active');

				//c($(this).closest('.carousel-wrapper').siblings('.slider-wrapper').attr('class'));

				$(this).closest('.carousel-wrapper').siblings('.slider-wrapper').find('.slider').cycle(imagenum);
				//$('.slider').cycle(imagenum);
			});
		});
	}


	slidersInitialising = false;
}




function initValidation() {

	$('form.validate').each(function() {
		// -- Telephone format validation
		jQuery.validator.addMethod('telephone', function(value, element) {
			if (value.length >= 6 && value.match(/^([()0-9-+\s]+)$/))
				return true;
			else return false;
		}, '');
		
		$(this).validate({
			// stop default error messages
			errorPlacement: function(error, element) {},

			// place error class on parent form if necessary
			highlight: function(element, errorClass) {
				$(element).addClass('error');
				$(element).removeClass('valid');
				$(element).closest('form').addClass('error');
			},
			unhighlight: function(element, errorClass) {
				$(element).removeClass('error');
				$(element).addClass('valid');
				$(element).closest('form').removeClass('error');
			}
		});

		var count=1;
		$('.not-value').each(function() {
				if ($(this).is('textarea'))
					var placeholder = $(this).html(); // textareas
				else
					var placeholder = $(this).val(); // inputs

				$(this).addClass('geneneratedvalidation_'+count);

				jQuery.validator.addMethod('geneneratedvalidation_'+count, function(value, element) {
					if (value==placeholder) return false;
					else return true;
				}, '');

			count++;
		});
	});
}


function initMaps() {

	// General maps
	if ($('.js-map').length) {
		$('.js-map').each(function() {

			map = $(this);

			if (map.attr('data-lat') && map.attr('data-lng')) {
				var latlng = new google.maps.LatLng(map.attr('data-lat'), map.attr('data-lng'));
			}
			if (map.attr('data-zoom')) var zoom = parseInt(map.attr('data-zoom'));
			else var zoom = 15;

			var myOptions = {
    			scrollwheel: false,
				zoom: zoom,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				//disableDefaultUI: true
				mapTypeControl: false,
				scaleControl: false,
				zoomControl: true,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.LARGE 
				},
			};


			map = new google.maps.Map(map[0], myOptions);

			var image = new google.maps.MarkerImage(
				'img/google-maps-marker.png',
				new google.maps.Size(28,44),
				new google.maps.Point(0,0),
				new google.maps.Point(14,44)
			);
			var shape = {
				coord: [0,0,28,44],
				type: 'square'
			};
			
			var marker = new google.maps.Marker({
				draggable: false,
				icon: image,
				shape: shape,
				map: map,
				position: latlng
			});
		});
	}
}



function c(dwa) { console.log(dwa); }