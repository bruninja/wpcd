/**
 *	jQuery Document Ready
 */
jQuery( document ).ready( function($) {
	var windowWidth = $( window ).width();
	var documentWidth = $( document ).width();
	var documentHeight = $( document ).height();
	var containerWidth = $( '.container' ).width();
	var postSingleWidth = $( '.post-single' ).width();

	//	Sub Menu
	$( '#header .center-header .header-navigation ul li.menu-item-has-children' ).hover( function() {
		$( this ).children( 'ul' ).show( 'fast' );
	}, function() {
		$( this ).children( 'ul' ).hide( 'fast' );
	});

	// Search Modal
	$( '#header .top-header .top-header-contact li a .fa.fa-search' ).click( function() {
		$( '.search-modal' ).addClass( 'active' );

		$( '.search-modal .modal-box .close-modal' ).click( function() {
			$( '.search-modal' ).removeClass( 'active' );
		});
	});

	$( '.search-modal' ).css({
		'width': documentWidth,
		'height': documentHeight
	});

	// Out Container Right
	function outContainerRight( value1, value2 ) {
		var windowWidth = $( window ).width();
		var containerWidth = $( '.container' ).width() + 30;
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
		var containerWidth = $( '.container' ).width() + 30;
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

	// Margin Left Carousel Top
	$( 'main.blog-post .carousel-top' ).css({
		'width': postSingleWidth + ( windowWidth - containerWidth ) / 2,
		'margin-left': -( windowWidth - containerWidth ) / 2
	});

	// Called Functions
	$( function() {
		$( window ).load( function() {
			outContainerRight( '.details-blog', '.details-blog .out-right' );
		});
		outContainerRight( '#header .bottom-header .container .header-carousel2', '.header-carousel2 .out-right' );
		outContainerRight( '.index-testimonials .testimonials-carousel3', '.index-testimonials .testimonials-carousel3 .out-right' );
		outContainerRight( '.index-head .container .row .col-md-6 .section-head', '.index-head .container .row .col-md-6 .section-head .out-right' );
		outContainerRight( '.blog-list-no-sidebar .post .post-content', '.blog-list-no-sidebar .post .post-content .out-right' );
		outContainerRight( '.portfolio-posts .portfolio-post.right .post-content', '.portfolio-posts .portfolio-post.right .post-content .out-right' );

		outContainerLeft( '.blog-list-no-sidebar .post .post-content', '.blog-list-no-sidebar .post .post-content .out-left' );
		outContainerLeft( '.breadcrumb', '.breadcrumb .out-left' );
		outContainerLeft( '.post-single .single-title', '.post-single .single-title .out-left' );
		outContainerLeft( '.portfolio-posts .portfolio-post.left .post-content', '.portfolio-posts .portfolio-post.left .post-content .out-left' );
		outContainerLeft( '.project-single .single-title', '.project-single .single-title .out-left' );

		setHeight( '.details-blog .blog-post .post-image', '.details-blog .blog-post .post-image' );
	});
});

/**
 *	jQuery Window Resize
 */
jQuery( window ).resize( function() {
	var windowWidth = $( window ).width();
	var documentWidth = $( document ).width();
	var documentHeight = $( document ).height();
	var containerWidth = $( '.container' ).width();
	var postSingleWidth = $( '.post-single' ).width();

	// Out Container Right
	function outContainerRight( value1, value2 ) {
		var windowWidth = jQuery( window ).width();
		var containerWidth = jQuery( '.container' ).width() + 30;
		var headerCarousel2Height = jQuery( value1 ).outerHeight();
		jQuery( value2 ).css({
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
		var containerWidth = $( '.container' ).width() + 30;
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

	// Margin Left Carousel Top
	$( 'main.blog-post .carousel-top' ).css({
		'width': postSingleWidth + ( windowWidth - containerWidth ) / 2,
		'margin-left': -( windowWidth - containerWidth ) / 2
	});

	// Called Functions
	jQuery( function() {
		outContainerRight( '.details-blog', '.details-blog .out-right' );
		outContainerRight( '#header .bottom-header .container .header-carousel2', '.header-carousel2 .out-right' );
		outContainerRight( '.index-testimonials .testimonials-carousel3', '.index-testimonials .testimonials-carousel3 .out-right' );
		outContainerRight( '.index-head .container .row .col-md-6 .section-head', '.index-head .container .row .col-md-6 .section-head .out-right' );
		outContainerRight( '.blog-list-no-sidebar .post .post-content', '.blog-list-no-sidebar .post .post-content .out-right' );
		outContainerRight( '.portfolio-posts .portfolio-post.right .post-content', '.portfolio-posts .portfolio-post.right .post-content .out-right' );

		outContainerLeft( '.blog-list-no-sidebar .post .post-content', '.blog-list-no-sidebar .post .post-content .out-left' );
		outContainerLeft( '.breadcrumb', '.breadcrumb .out-left' );
		outContainerLeft( '.post-single .single-title', '.post-single .single-title .out-left' );
		outContainerLeft( '.portfolio-posts .portfolio-post.left .post-content', '.portfolio-posts .portfolio-post.left .post-content .out-left' );
		outContainerLeft( '.project-single .single-title', '.project-single .single-title .out-left' );

		setHeight( '.details-blog .blog-post .post-image', '.details-blog .blog-post .post-image' );
	});
});