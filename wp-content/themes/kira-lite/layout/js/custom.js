/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	var windowWidth = $( window ).width();
	var windowHeight = $( window ).height();
	var documentWidth = $( document ).width();
	var documentHeight = $( document ).height();
	var containerWidth = $( '.container' ).width();
	var postSingleWidth = $( '.post-single' ).width();
	var widget = $( '.sidebar .widget, #footer .widget' );

	// Smooth Scroll Anchors
	function smoothScrollAnchors() {
		var headerNavigation = $( '#header .center-header .header-navigation' );

		if( $( headerNavigation ).hasClass( 'custom-header-navigation' ) ) {
			$( 'a' ).click( function() {
				$( 'html, body' ).animate({
					scrollTop: $( $.attr( this, 'href' ) ).offset().top
				}, 1000 );

				return false;
			});
		}
	}

	// Center Bottom Header Elements
	function centerBottomHeaderElements() {
		var bottomHeaderContainerFluid = $( '#header .bottom-header .container-fluid' );
		var bottomHeaderContainerFluidHeight = $( bottomHeaderContainerFluid ).height();
		var containerFluidFirstChild = $( '#header .bottom-header .container-fluid .row > div:first-child' );
		var containerFluidFirstChildHeight = $( containerFluidFirstChild ).height();
		var containerFluidLastChild = $( '#header .bottom-header .container-fluid .row > div:last-child' );
		var containerFluidLastChildHeight = $( containerFluidLastChild ).height();

		$( containerFluidFirstChild ).css( 'margin-top', ( bottomHeaderContainerFluidHeight - containerFluidFirstChildHeight ) / 2 );
		$( containerFluidLastChild ).css( 'margin-top', ( bottomHeaderContainerFluidHeight - containerFluidLastChildHeight ) / 2 );
	}

	// Add Wrap Widget Content
	function addWrapWidgetContent() {
		$( widget ).each( function() {
			var widgetTagCloud = $( '.sidebar .widget .tagcloud' );
			var numberOfElements = $( this ).children().length;

			if( widgetTagCloud.length ) {
				$( widgetTagCloud ).addClass( 'clearfix' );
			}

			if( numberOfElements == 1 ) {
				$( this ).children().wrap( '<div class="widget-content"></div>' );
			} else {
				$( this ).children().not( ':eq(0)' ).wrapAll( '<div class="widget-content"></div>' );
			}
		});
	}

	// Mouse Over & Out
	function mouseOverOut( value1 ) {
		$( value1 ).mouseover( function() {
			$( this ).addClass( 'hover' );
		});
		$( value1 ).mouseout( function() {
			$( this ).removeClass( 'hover' );
		});
	}

	// Click Instead Hover
	function clickInsteadHover( value1 ) {
		$( value1 ).click( function( event ) {
			event.stopPropagation();
			$( value1 ).removeClass( 'hover' );
			$( this ).addClass( 'hover' );
		});
		$( 'body' ).click( function() {
			$( value1 ).removeClass( 'hover' );
		});
	}

	// Sub Menu
	function subMenu() {
		$( '#header .center-header .header-navigation ul li.menu-item-has-children' ).hover( function() {
			$( this ).children( 'ul' ).show( 'fast' );
		}, function() {
			$( this ).children( 'ul' ).hide( 'fast' );
		});
	}

	// Open Responsive Menu
	function openResponsiveMenu() {
		$( '#header .center-header .open-responsive-menu' ).click( function() {
			$( '#header .responsive-menu' ).toggle( 'slow', function() {
				$( this ).toggleClass( 'active' );
			});
		});
	}

	// Search Modal
	function searchModal() {
		$( '#header .top-header .top-header-contact li a .fa.fa-search' ).click( function() {
			$( '.search-modal' ).addClass( 'active' );

			$( '.search-modal .modal-box .close-modal' ).click( function() {
				$( '.search-modal' ).removeClass( 'active' );
			});
		});

		$( '.search-modal' ).css({
			'width': documentWidth,
			'height': windowHeight
		});
	}

	// Margin Left Carousel Top
	function marginLeftCarouselTop() {
		$( 'main.blog-post .carousel-top' ).css({
			'width': postSingleWidth + ( windowWidth - containerWidth ) / 2,
			'margin-left': -( windowWidth - containerWidth ) / 2
		});
	}

	// Post Content Height and Out Right
	function postContentHeightOutRight() {
		$( '.post.post-content-right' ).each( function() {
			var postImage = $( this ).children( '.col-sm-6' ).first().children( '.post-image' );
			var postContent = $( this ).children( '.col-sm-6' ).last().children( '.post-content' );
			var postOutLeft = $( postContent ).children( '.post-out-left' );
			var container = $( '.container-fluid' );
			var outRight = $( postContent ).children( '.out-right' );

			var postImageHeight = $( postImage ).height();
			var postContentOuterHeight = $( postContent ).outerHeight();
			var windowWidth = $( window ).width();
			var containerWidth = $( container ).width() + 30;

			if( postContentOuterHeight > postImageHeight ) {
				$( postImage ).css( 'height', postContentOuterHeight );
				$( postOutLeft ).css( 'height', postContentOuterHeight );
			}

			$( outRight ).css({
				'width': ( windowWidth - containerWidth ) / 2,
				'height': postContentOuterHeight,
				'top': '0px',
				'right': -( windowWidth - containerWidth ) / 2,
				'z-index': 1
			});
		});
	}

	// Post Content Height and Out Left
	function postContentHeightOutLeft() {
		$( '.post.post-content-left' ).each( function() {
			var postImage = $( this ).children( '.col-sm-6' ).last().children( '.post-image' );
			var postContent = $( this ).children( '.col-sm-6' ).first().children( '.post-content' );
			var postOutLeft = $( postContent ).children( '.post-out-right' );
			var container = $( '.container-fluid' );
			var outLeft = $( postContent ).children( '.out-left' );

			var postImageHeight = $( postImage ).height();
			var postContentOuterHeight = $( postContent ).outerHeight();
			var windowWidth = $( window ).width();
			var containerWidth = $( container ).width() + 30;

			if( postContentOuterHeight > postImageHeight ) {
				$( postImage ).css( 'height', postContentOuterHeight );
				$( postOutLeft ).css( 'height', postContentOuterHeight );
			}

			$( outLeft ).css({
				'width': ( windowWidth - containerWidth ) / 2,
				'height': postContentOuterHeight,
				'top': '0px',
				'left': -( windowWidth - containerWidth ) / 2,
				'z-index': 1
			});
		});
	}

	// Portfolio Post Right and Out Right
	function portfolioPostRightOutRight() {
		$( '.portfolio-post.right' ).each( function() {
			var postContent = $( this ).children( '.row' ).children( '.col-sm-8' ).children( '.post-content' );
			var outRight = $( postContent ).children( '.out-right' );
			var container = $( '.container-fluid' );

			var postContentOuterHeight = $( postContent ).outerHeight();
			var windowWidth = $( window ).width();
			var containerWidth = $( container ).width() + 30;

			$( outRight ).css({
				'width': ( windowWidth - containerWidth ) / 2,
				'height': postContentOuterHeight,
				'top': '0px',
				'right': -( windowWidth - containerWidth ) / 2,
				'z-index': 1
			});
		});
	}

	// Portfolio Post Left and Out Left
	function portfolioPostLeftOutLeft() {
		$( '.portfolio-post.left' ).each( function() {
			var postContent = $( this ).children( '.row' ).children( '.col-sm-8' ).children( '.post-content' );
			var outLeft = $( postContent ).children( '.out-left' );
			var container = $( '.container-fluid' );

			var postContentOuterHeight = $( postContent ).outerHeight();
			var windowWidth = $( window ).width();
			var containerWidth = $( container ).width() + 30;

			$( outLeft ).css({
				'width': ( windowWidth - containerWidth ) / 2,
				'height': postContentOuterHeight,
				'top': '0px',
				'left': -( windowWidth - containerWidth ) / 2,
				'z-index': 1
			});
		});
	}

	// Details Blog
	function detailsBlog() {
		var indexDetails = $( '.index-details' );
		var detailsContact = $( '.details-contact' );
		var detailsBlog = $( '.details-blog' );
		var containerFluid = $( '.container-fluid' );

		var indexDetailsHeight = $( indexDetails ).height();
		var detailsContactOuterHeight = $( detailsContact ).outerHeight();
		var detailsBlogHeight = $( detailsBlog ).height();
		var windowWidth = $( window ).width();
		var containerFluidWidth = $( containerFluid ).width() + 30;

		if( detailsContactOuterHeight > detailsBlogHeight ) {
			$( detailsBlog ).css( 'min-height', detailsContactOuterHeight );
		}

		$( '.details-blog .out-right' ).css({
			'width': ( windowWidth - containerFluidWidth ) / 2,
			'height': indexDetailsHeight,
			'top': '0px',
			'right': -( windowWidth - containerFluidWidth ) / 2,
			'z-index': 1
		});
	}

	// Back to top
	function backToTop() {
		// browser window scroll (in pixels) after which the "back to top" link is shown
		var offset = 300,

		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 300,

		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,

		//grab the "back to top" link
		$back_to_top = $('.mt-top');

		//hide or show the "back to top" link
		$(window).scroll(function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('mt-is-visible') : $back_to_top.removeClass('mt-is-visible mt-fade-out');
			if( $(this).scrollTop() > offset_opacity ) {
				$back_to_top.addClass('mt-fade-out');
			}
		});

		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0,
			}, scroll_top_duration);
		});
	}

	// Out Container Right
	function outContainerRight( value1, value2 ) {
		var windowWidth = $( window ).width();
		var containerWidth = $( '.container-fluid' ).width() + 30;
		var headerCarousel2Height = $( value1 ).outerHeight();
		$( value2 ).css({
			'width': ( windowWidth - containerWidth ) / 2,
			'height': headerCarousel2Height,
			'top': '0px',
			'right': -( windowWidth - containerWidth ) / 2,
			'z-index': 1
		});
	}

	// Out Container Left
	function outContainerLeft( value1, value2 ) {
		var windowWidth = $( window ).width();
		var containerWidth = $( '.container-fluid' ).width() + 30;
		var headerCarousel2Height = $( value1 ).outerHeight();
		$( value2 ).css({
			'width': ( windowWidth - containerWidth ) / 2,
			'height': headerCarousel2Height,
			'top': '0px',
			'left': -( windowWidth - containerWidth ) / 2,
			'z-index': 1
		});
	}

	// Set Height
	function setHeight( value1, value2 ) {
		var value1Width = $( value1 ).width();
		$( value2 ).css({
			'height': value1Width
		});
	}

	// Page Loader
	function pageLoader() {
        $( '#page-loader .page-loader-inner' ).delay(500).fadeIn(10, function () {
            $(this).fadeOut(500, function () {
                $( '#page-loader' ).fadeOut(500)
            })
        })
    }


	// Called Functions
	$( function() {
		smoothScrollAnchors();
		centerBottomHeaderElements();
		addWrapWidgetContent();
		subMenu()
		pageLoader();
		backToTop();
		openResponsiveMenu();
		searchModal();
		marginLeftCarouselTop();
		postContentHeightOutRight();
		postContentHeightOutLeft();
		portfolioPostRightOutRight();

		if( windowWidth > 768 ) {
			$( window ).load( function() {
				detailsBlog();
			});

			mouseOverOut( '.service, .person' );
		} else {
			clickInsteadHover( '.service, .person' );
		}

		outContainerRight( '#header .bottom-header .container-fluid .header-carousel2', '.header-carousel2 .out-right' );
		outContainerRight( '.index-testimonials .testimonials-carousel3', '.index-testimonials .testimonials-carousel3 .out-right' );
		outContainerRight( '.index-head .container-fluid .row .col-sm-6 .section-head', '.index-head .container-fluid .row .col-sm-6 .section-head .out-right' );

		outContainerLeft( '.breadcrumb', '.breadcrumb .out-left' );
		outContainerLeft( '.post-single .single-title', '.post-single .single-title .out-left' );
		outContainerLeft( '.project-single .single-title', '.project-single .single-title .out-left' );

		if( windowWidth > 480 ) {
			setHeight( '.details-blog .blog-post .post-image', '.details-blog .blog-post .post-image' );
		}
		setHeight( '.sidebar .widget .widget-content .widget-recent-post .recent-post-image', '.sidebar .widget .widget-content .widget-recent-post .recent-post-image' );
	});
});