/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	// Parallax on subheader image
	if( $( '#header .subheader.image' ).length ) {
		$( '#header .subheader.image' ).parallax({
			speed: 0.15
		});
	}

	// carouFredSel Carousel 1
	if( $( '.carousel1-slides' ).length ) {
		$( '.carousel1-slides' ).carouFredSel({
			responsive: true,
			items: 1,
			auto: false,
			items: {
				width: 1900
			},
			scroll: {
				items: 1,
			}
		});
	}

	// carouFredSel Carousel 2
	if( $( '.carousel2-slides' ).length ) {
		$( '.carousel2-slides' ).carouFredSel({
			synchronise: ['.carousel1-slides', false],
			responsive: true,
			items: 1,
			auto: false,
			height: 'variable',
			items: {
				width: 585,
				height: 'variable'
			},
			scroll: {
				items: 1
			}
		});
	}

	$( '#header .bottom-header .header-carousel2 .carousel2-slides-prev' ).click( function() {
		$( '.carousel2-slides' ).trigger( 'prev' );
	});

	$( '#header .bottom-header .header-carousel2 .carousel2-slides-next' ).click( function() {
		$( '.carousel2-slides' ).trigger( 'next' );
	});

	// carouFredSel Carousel 3
	if( $( '.carousel3-slides' ).length ) {
		$( '.carousel3-slides' ).carouFredSel({
			responsive: true,
			items: 1,
			height: 'variable',
			auto: false,
			prev: '.carousel3-slides-prev',
			next: '.carousel3-slides-next',
			items: {
				width: 700,
				height: 'variable'
			},
			scroll: {
				items: 1
			}
		});
	}

	$( window ).load( function() {
		// carouFredSel Top Slides
		if( $( '.top-slides' ).length ) {
			$( '.top-slides' ).carouFredSel({
				responsive: true,
				items: 1,
				auto: false,
				items: {
					width: 1200
				},
				scroll: {
					items: 1
				}
			});
		}

		// carouFredSel Bottom Slides
		if( $( '.bottom-slides' ).length ) {
			$( '.bottom-slides' ).carouFredSel({
				synchronise: ['.top-slides', false],
				responsive: true,
				items: 1,
				auto: false,
				prev: '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-prev',
				next: '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-next',
				items: {
					width: 725
				},
				scroll: {
					items: 1
				}
			});
		}

		var bottomSlidesSlide = $( '.single-carousels .carousel-bottom .bottom-slides .slide' );
		var bottomSlides = $( '.single-carousels .carousel-bottom .bottom-slides' );
		var navigationPagesCurrent = $( '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-pages .navigation-pages-current' );
		var navigationPagesTotal = $( '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-pages .navigation-pages-total' );
		var navigationNext = $( '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-next' );
		var navigationPrev = $( '.single-carousels .carousel-bottom .carousel-button-navigation .navigation-prev' );

		$( navigationPagesCurrent ).text( bottomSlides.triggerHandler( 'currentPosition' ) + 1 );
		$( navigationPagesTotal ).text( '/' + bottomSlidesSlide.length );

		$( navigationNext ).click( function() {
			$( navigationPagesCurrent ).text( bottomSlides.triggerHandler( 'currentPosition' ) + 1 );
		});

		$( navigationPrev ).click( function() {
			$( navigationPagesCurrent ).text( bottomSlides.triggerHandler( 'currentPosition' ) + 1 );
		});
	});
});