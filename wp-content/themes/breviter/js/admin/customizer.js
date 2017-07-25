(function ($) {
	'use strict';

	$(document).ready(function () {

		// Custom Social contorl for Customizer
		var socialPicker = $('.social-picker');
		if(socialPicker.length) {
			var socialControl = {
				holder: $('.social-picker > ul'),
				socialInput: $('.social-input'),
				obj: $('.social-input').val() ? JSON.parse( $('.social-input').val() ) : {}
			};

			if( !$.isEmptyObject( socialControl.obj ) ) {
				for( var item in socialControl.obj ) {
					if( $( '.social-picker-item i' ).hasClass( item ) ) {
						$( '.' + item ).parent().addClass( 'social-filed' );
					}
				};
			}

			socialPicker.on( 'click', '.social-picker-item', function( e ) {
				e.preventDefault();
				var icon = $( this ).find( 'i' ).attr( 'class' );

				$( '.social-item-input' ).show();

				$( '.social-picker-item' ).removeClass( 'active-social' );
				$( this ).addClass( 'active-social' );

				if( socialControl.obj[ icon ] === undefined ) {
					$('.social-item-input input').val( '' );
				} else {
					$('.social-item-input input').val( socialControl.obj[ icon ] );
				}

			} );

			$('.social-item-input').on( 'keyup', 'input', function () {
				var icon = $('.active-social i').attr( 'class' );

				socialControl.obj[ icon ] = $( this ).val();

				if( $( this ).val() ) {
					$( '.active-social' ).addClass( 'social-filed' );
				} else {
					$( '.active-social' ).removeClass( 'social-filed' );
					delete socialControl.obj[ icon ];
				}
				socialControl.socialInput.val( JSON.stringify( socialControl.obj ) );
				socialControl.socialInput.trigger('keyup');
			});
		}
	});
})(jQuery);

// Pro Section
( function( api ) {
	// Extends our custom "breviter_pro" section.
	api.sectionConstructor['breviter_pro'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );