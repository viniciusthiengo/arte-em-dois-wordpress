;(function($) {
	'use strict';
	
	var nav = $( '.primary-navigation > ul > li > a' );
	nav.each( function( i ) {
		var linkText = nav.eq( i ).text();
		if( linkText[0].length ) {
			nav.eq( i ).parent().append( '<span>' + linkText[0] + '</span>' );
		}
	} );

	window.onbeforeunload = function(e) {
		$( '#page-canvas' ).addClass( 'switch-page' );
	};

	var widgetDropdown = $( 'select[name="archive-dropdown"], select[name="cat"]' );

	if( widgetDropdown.length ) {
		widgetDropdown.parent().addClass( 'dh-widget-dropdown' );
	}

	if( $( '.nav-devices' ).length ) {
		$( document ).on( 'click', function(e) {
			if( $( e.target ).is( '.nav-devices i' ) ) {
				$( '.nav-devices' ).toggleClass( 'active-devices' );
				$( 'body' ).toggleClass( 'no-scroll' );
			} else {
				if( $( 'body' ).hasClass( 'no-scroll' ) ) {
					if( ! $( e.target ).is( '.active-devices + ul, .active-devices + ul li, .active-devices + ul a')) {
						$( '.nav-devices' ).removeClass( 'active-devices' );
						$( 'body' ).removeClass( 'no-scroll' );
					}
				}
			}
		});
	}
})(jQuery);