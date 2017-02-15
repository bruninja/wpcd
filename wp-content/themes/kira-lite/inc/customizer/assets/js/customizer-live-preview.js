/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	/* Company text logo */
	wp.customize( 'kira_lite_text_logo', function( value ) {
		value.bind( function( newval ) {
			$( '#header .center-header .header-logo' ).html( newval );
		} );
	} );

	/* Company image logo */
	wp.customize( 'kira_lite_img_logo', function( value ) {
		value.bind( function( newval ) {
			if( newval !== '' ) {
				$( '#header .center-header .header-logo' ).empty();
				$( '#header .center-header .header-logo' ).prepend( '<img src="" alt="'+ wp.customize._value.kira_lite_text_logo +'" title="'+ wp.customize._value.kira_lite_text_logo +'" />' );
				$( '#header .center-header .header-logo img' ).attr( 'src', newval );

				$( '.details-contact' ).prepend( '<img class="contact-logo" src="" alt="'+ wp.customize._value.kira_lite_text_logo +'" title="'+ wp.customize._value.kira_lite_text_logo +'" />' );
				$( '.details-contact img.contact-logo' ).attr( 'src', newval );
			} else {
				$( '#header .center-header .header-logo' ).text( wp.customize._value.kira_lite_text_logo() );

				$( '.details-contact .contact-logo' ).remove();
			}
		} );
	} );

	/* Facebook URL */
	wp.customize( 'kira_lite_contact_bar_facebook_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="Facebook"]' ).attr( 'href', newval );
		} );
	} );

	/* Twitter URL */
	wp.customize( 'kira_lite_contact_bar_twitter_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="Twitter"]' ).attr( 'href', newval );
		} );
	} );

	/* YouTube URL */
	wp.customize( 'kira_lite_contact_bar_youtube_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="YouTube"]' ).attr( 'href', newval );
		} );
	} );

	/* Pinterest URL */
	wp.customize( 'kira_lite_contact_bar_pinterest_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="Pinterest"]' ).attr( 'href', newval );
		} );
	} );

	/* LinkedIN URL */
	wp.customize( 'kira_lite_contact_bar_linkedin_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="LinkedIn"]' ).attr( 'href', newval );
		} );
	} );

	/* Instagram URL */
	wp.customize( 'kira_lite_contact_bar_instagram_url', function( value ) {
		value.bind( function( newval ) {
			$( '.social-links-list li a[title="Instagram"]' ).attr( 'href', newval );
		} );
	} );

	/* email */
	wp.customize( 'kira_lite_email', function( value ) {
		value.bind( function( newval ) {
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-email-address"] a' ).attr( 'href', 'mailto: ' + newval );
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-email-address"] a' ).attr( 'title', newval );
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-email-address"] a' ).text( newval );

			$( '.details-contact .contact-list li[data-customizer="contact-list-email-address"] a' ).attr( 'href', 'mailto: ' + newval );
			$( '.details-contact .contact-list li[data-customizer="contact-list-email-address"] a' ).attr( 'title', newval );
			$( '.details-contact .contact-list li[data-customizer="contact-list-email-address"] a' ).text( newval );
		} );
	} );

	/* phone number */
	wp.customize( 'kira_lite_phone', function( value ) {
		value.bind( function( newval ) {
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-phone"] a' ).attr( 'href', 'tel:' + newval );
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-phone"] a' ).attr( 'title', newval );
			$( '#header .top-header .top-header-contact li[data-customizer="top-header-contact-phone"] a' ).text( newval );

			$( '.details-contact .contact-list li[data-customizer="contact-list-phone"]' ).attr( 'href', 'tel:' + newval );
			$( '.details-contact .contact-list li[data-customizer="contact-list-phone"]' ).attr( 'title', newval );
			$( '.details-contact .contact-list li[data-customizer="contact-list-phone"]' ).html( '<i class="fa fa-phone"></i>' + newval );
		} );
	} );

	// Address 1
	wp.customize( 'kira_lite_address1', function( value ) {
		value.bind( function( newval ) {
			$( '.details-contact .contact-list li[data-customizer="contact-list-address1"]' ).html( '<i class="fa fa-map-marker"></i>' + newval );
		} );
	} );

	// Address 2
	wp.customize( 'kira_lite_address2', function( value ) {
		value.bind( function( newval ) {
			$( '.details-contact .contact-list li[data-customizer="contact-list-address2"]' ).html( newval );
		} );
	} );

	/* Enable Social Icons */
	wp.customize( 'kira_lite_footer_enable_social_icons', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.social-links-list[data-customizer="details-contact-social-links-list"]' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '.social-links-list[data-customizer="details-contact-social-links-list"]' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Footer Copyright */
	wp.customize( 'kira_lite_footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '#footer .copyright' ).html( newval );
		} );
	} );

	/* Footer Image Logo */
	wp.customize( 'kira_lite_img_footer_logo', function( value ) {
		value.bind( function( newval ) {
			if( newval !== '' ) {
				$( '#footer .footer-logo' ).removeClass( 'customizer-dispaly-none' );
				$( '#footer .footer-logo' ).prepend( '<img src="" alt="'+ wp.customize._value.kira_lite_text_logo +'" title="'+ wp.customize._value.kira_lite_text_logo +'" />' );
				$( '#footer .footer-logo img' ).attr( 'src', newval );
			} else {
				$( '#footer .footer-logo img' ).addClass( 'customizer-dispaly-none' );
			}
		} );
	} );

	/* Current header */
	wp.customize( 'header_image', function( value ) {
		value.bind( function( newval ) {
			console.log( newval );
			if( newval == 'remove-header' ) {
				$( '#header .bottom-header' ).addClass( 'customizer-display-none' );
			} else if( newval == 'random-uploaded-image' ) {
				$( '#header .bottom-header' ).removeClass( 'customizer-display-none' );
			} else if( newval == 'random-default-image' ) {
				$( '#header .bottom-header' ).removeClass( 'customizer-display-none' );
			} else {
				$( '#header .bottom-header' ).removeClass( 'customizer-display-none' );
				$( '#header .bottom-header .header-carousel1 .slide' ).css( 'background-image', 'url('+ newval +')' );
			}
		} );
	} );

	// Title
	wp.customize( 'kira_lite_header_image_title', function( value ) {
		value.bind( function( newval ) {
			$( '#header .bottom-header .container-fluid h1' ).text( newval );
		} );
	} );

	// Entry
	wp.customize( 'kira_lite_header_image_entry', function( value ) {
		value.bind( function( newval ) {
			$( '#header .bottom-header .container-fluid h2' ).text( newval );
		} );
	} );

	// Enable box
	wp.customize( 'kira_lite_header_image_enable_right_box', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#header .bottom-header .container-fluid .row>div:last-child' ).addClass( 'customizer-display-none' );
				$( '#header .bottom-header .container-fluid .row>div:first-child' ).removeClass( 'col-sm-6' );
				$( '#header .bottom-header .container-fluid .row>div:first-child' ).addClass( 'col-sm-12' );
			} else if( newval == true ) {
				$( '#header .bottom-header .container-fluid .row>div:last-child' ).removeClass( 'customizer-display-none' );
				$( '#header .bottom-header .container-fluid .row>div:first-child' ).removeClass( 'col-sm-12' );
				$( '#header .bottom-header .container-fluid .row>div:first-child' ).addClass( 'col-sm-6' );
			}
		} );
	} );

	// Box Entry
	wp.customize( 'kira_lite_header_image_box_entry', function( value ) {
		value.bind( function( newval ) {
			$( '#header .bottom-header .header-carousel2 .slide p' ).text( newval );
		} );
	} );

	// Box Button Text
	wp.customize( 'kira_lite_header_image_box_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '#header .bottom-header .header-carousel2 .slide .button-one' ).attr( 'title', newval );
			$( '#header .bottom-header .header-carousel2 .slide .button-one' ).text( newval );
		} );
	} );

	// Box Button URL
	wp.customize( 'kira_lite_header_image_box_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '#header .bottom-header .header-carousel2 .slide .button-one' ).attr( 'href', newval );
		} );
	} );

	/* Posted on on single blog posts */
	wp.customize( 'kira_lite_enable_post_posted_on_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.post-single .single-content .content-meta' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.post-single .single-content .content-meta' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Post Category on single blog posts */
	wp.customize( 'kira_lite_enable_post_category_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.post-single .single-content .content-meta .meta-categories' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.post-single .single-content .content-meta .meta-categories' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Post Tags on single blog posts */
	wp.customize( 'kira_lite_enable_post_tags_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.post-single .single-meta .meta-left .meta-left-tags' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.post-single .single-meta .meta-left .meta-left-tags' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Post Comments on single blog posts */
	wp.customize( 'kira_lite_enable_post_comments_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.post-single .single-content .content-meta .meta-comments' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.post-single .single-content .content-meta .meta-comments' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Breadcrumbs on single blog posts */
	wp.customize( 'kira_lite_enable_post_breadcrumbs', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.breadcrumb' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.breadcrumb' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Author Info Box on single blog posts */
	wp.customize( 'kira_lite_enable_author_box_blog_posts', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.post-single .single-author' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.post-single .single-author' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* BreadCrumb Menu:  Prefix */
	wp.customize( 'kira_lite_blog_breadcrumb_menu_prefix', function( value ) {
		value.bind( function( newval ) {
			$( '.breadcrumb ul li.rl-breadcrumb-prefix' ).text( newval );
		} );
	} );

	/* BreadCrumb Menu:  separator */
	wp.customize( 'kira_lite_blog_breadcrumb_menu_separator', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'rarr' ) {
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).html( '&rarr;' );
			} else if( newval == 'middot' ) {
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).html( '&middot;' );
			} else if( newval == 'diez' ) {
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).html( '&#35;' );
			} else if( newval == 'ampersand' ) {
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).html( '&#38;' );
			}
		} );
	} );

	/* BreadCrumb Menu:  post category */
	wp.customize( 'kira_lite_blog_breadcrumb_menu_post_category', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.breadcrumb ul li[itemtype="http://data-vocabulary.org/Breadcrumb"]' ).addClass( 'customizer-display-none' );
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).addClass( 'customizer-display-none' );
			} else if( newval == true ) {
				$( '.breadcrumb ul li[itemtype="http://data-vocabulary.org/Breadcrumb"]' ).removeClass( 'customizer-display-none' );
				$( '.breadcrumb ul li.rl-breadcrumb-sep' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Show this section?
	wp.customize( 'kira_lite_services_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.index-head.services' ).addClass( 'customizer-display-none' );
				$( '.index-services' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.index-head.services' ).removeClass( 'customizer-display-none' );
				$( '.index-services' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'kira_lite_services_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.services .section-head.dark-gray-background h3' ).text( newval );
		} );
	} );

	// Button Text
	wp.customize( 'kira_lite_services_general_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.services .button-two' ).text( newval );
		} );
	} );

	// Button URL
	wp.customize( 'kira_lite_services_general_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.services .button-two' ).attr( 'href', newval );
		} );
	} );

	// Show this section?
	wp.customize( 'kira_lite_works_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.index-head.works' ).addClass( 'customizer-display-none' );
				$( '.index-works' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.index-head.works' ).removeClass( 'customizer-display-none' );
				$( '.index-works' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'kira_lite_works_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.works .section-head.dark-gray-background h3' ).text( newval );
		} );
	} );

	// Button Text
	wp.customize( 'kira_lite_works_general_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.works .button-two' ).text( newval );
		} );
	} );

	// Button URL
	wp.customize( 'kira_lite_works_general_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.works .button-two' ).attr( 'href', newval );
		} );
	} );

	// Show this section?
	wp.customize( 'kira_lite_team_general_show', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.index-head.jobs' ).addClass( 'customizer-display-none' );
				$( '.index-team' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.index-head.jobs' ).removeClass( 'customizer-display-none' );
				$( '.index-team' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'kira_lite_team_general_title', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.jobs .section-head.dark-gray-background h3' ).text( newval );
		} );
	} );

	// Button Text
	wp.customize( 'kira_lite_team_general_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.jobs .button-two' ).text( newval );
		} );
	} );

	// Button URL
	wp.customize( 'kira_lite_team_general_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.jobs .button-two' ).attr( 'href', newval );
		} );
	} );

	// Left Title
	wp.customize( 'kira_lite_contact_blog_general_left_title', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-white-background h3.medium' ).text( newval );
		} );
	} );

	// Left Button Text
	wp.customize( 'kira_lite_contact_blog_general_left_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-white-background a.button-two' ).attr( 'title', newval );
			$( '.index-head.details .section-head.dark-white-background a.button-two' ).text( newval );
		} );
	} );

	// Left Button URL
	wp.customize( 'kira_lite_contact_blog_general_left_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-white-background a.button-two' ).attr( 'href', newval );
		} );
	} );

	// Right Title
	wp.customize( 'kira_lite_contact_blog_general_right_title', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-gray-background h3.medium' ).text( newval );
		} );
	} );

	// Right Button Text
	wp.customize( 'kira_lite_contact_blog_general_right_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-gray-background a.button-one' ).attr( 'title', newval );
			$( '.index-head.details .section-head.dark-gray-background a.button-one' ).text( newval );
		} );
	} );

	// Right Button URL
	wp.customize( 'kira_lite_contact_blog_general_right_button_url', function( value ) {
		value.bind( function( newval ) {
			$( '.index-head.details .section-head.dark-gray-background a.button-one' ).attr( 'href', newval );
		} );
	} );
} )( jQuery );