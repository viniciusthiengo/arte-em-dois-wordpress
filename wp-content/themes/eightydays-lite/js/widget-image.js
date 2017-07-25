/* global EightyDaysWidgetImage */

/**
 * Insert image into widget.
 * @package EightyDays
 * @author GretaThemes
 */
jQuery( document ).ready( function ( $ )
{
	var frame = wp.media( {
		title   : EightyDaysWidgetImage.title,
		multiple: false,
		library : { type: 'image' },
		button  : { text: EightyDaysWidgetImage.button }
	} );

	$( 'body' )
	// Select image
		.on( 'click', '.eightydays-widget-image__select', function ( e )
		{
			e.preventDefault();
			var $this = $( this ),
				$input = $this.siblings( 'input' ),
				$image = $this.siblings( 'img' );

			frame.off( 'select' )
				.on( 'select', function ()
				{
					var url = frame.state().get( 'selection' ).toJSON()[0].url;
					$input.val( url );
					$image.attr( 'src', url ).removeClass( 'hidden' );
				} )
				.open();
		} )
		// Change image URL
		.on( 'change', '.eightydays-widget-image__input', function ( e )
		{
			e.preventDefault();
			var $this = $( this ),
				url = $this.val(),
				$image = $this.siblings( 'img' );
			$image.attr( 'src', url )[url ? 'removeClass' : 'addClass']( 'hidden' );
		} );
} );
