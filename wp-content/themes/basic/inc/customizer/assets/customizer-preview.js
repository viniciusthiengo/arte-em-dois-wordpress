jQuery(document).ready(function ($) {

	// live style update
	var basic_style = $('#basic-customizer-css'),
	 	basic_custom_style = $('#basic-custom-css');

	window.basic_style = basic_style;
	window.basic_custom_style = basic_custom_style;


	if ( !$(basic_style).length ) {
		basic_style = $('head')
			.append('<style type="text/css" id="basic-customizer-css">')
			.find('#basic-customizer-css');
	}

	if ( !$(basic_custom_style).length ) {
		basic_custom_style = $('head')
			.append('<style type="text/css" id="basic-custom-css">')
			.find('#basic-custom-css');
	}


	/*----------  H E A D E R  ----------*/

	var $logo = $('#logo'),
		$description = $('.sitedescription');

	// title position
	wp.customize( 'display_logo_and_title', function (value) {
		value.bind(function (to) {

			if ( '' == wp.customize.instance('custom_logo').get() ){
				return false;
			}

			var $custom_logo = $('.custom-logo'),
				classes = 'custom-logo-left custom-logo-right custom-logo-top custom-logo-bottom';

			$custom_logo.removeClass(classes);

			if ( 'image' == to ){
				$custom_logo.prependTo(".logo");
				$('#logo').hide();
			} else {

				$('#logo').show();
				$custom_logo.addClass( 'custom-logo-' + to );

				if ( 'bottom' == to ) {
					$custom_logo.appendTo("#logo");
				} else {
					$custom_logo.prependTo("#logo");
				}
			}

		});
	});



	// site title
	wp.customize( 'blogname', function (value) {
		value.bind(function (to) {
			$logo.attr('title', to).html(to);
		});
	});

	// site title COLOR
	wp.customize( 'header_textcolor', function (value) {
		value.bind(function (to) {
			//$logo.css('title', to).html(to);
			basic_update_style( '#logo{color:', to, '}' );
		});
	});


	// title position
	wp.customize( optname+'[title_position]', function (value) {
		value.bind(function (to) {
			var $sitetitle = $('.sitetitle');
			$sitetitle.removeClass('left center right');
			$sitetitle.addClass(to);
		});
	});

	// site descripton
	wp.customize( 'blogdescription', function (value) {
		value.bind(function (to) {
			if (!$description.length) {
				$logo.append('<p class="sitedescription"></p>');
			}
			$description.html(to);
		});
	});


	// hide/show descripton
	if ( ! wp.customize.instance(optname + '[showsitedesc]').get() ) {
		$description.hide();
	}
	wp.customize( optname + '[showsitedesc]', function (value) {
		value.bind(function (to) {
			if (!$description.length) {
				$logo.append('<p class="sitedescription"></p>');
			}
			false === to
				? $description.hide()
				: $description.show();
		});
	});


	// fit header height as background image
	wp.customize( optname+'[fix_header_height]', function (value) {
		value.bind(function (to) {
			if ( false === to ) {
				basic_update_style( '@media screen and (min-width:1024px){.sitetitle{height:', 'auto', '}}' );
			} else {
				var h = wp.customize._value.header_image_data().height;
				//var h = wp.customize.value('header_image_data').height;
				basic_update_style( '@media screen and (min-width:1024px){.sitetitle{height:', h + 'px', '}}' );
			}
		});
	});

	// header_image_repeat
	wp.customize( optname + '[header_image_repeat]', function (value) {
		value.bind(function (to) {
			basic_update_style( '#header{background-repeat:', to, '}' );
		});
	});


	// main color change
	wp.customize( optname + '[maincolor]', function (value) {
		value.bind(function (to) {
			console.log( to );
			basic_update_style( 'a#logo{color:', to, '}' );
			basic_update_style( 'a:hover,#logo,.bx-controls a:hover .fa{color:', to, '}' );
			basic_update_style( 'a:hover{color:', to, '}' );
			basic_update_style( 'blockquote,q,input:focus,textarea:focus,select:focus{border-color:', to, '}' );
			basic_update_style( 'input[type=submit],input[type=button],button,.submit,.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,#mobile-menu,.top-menu,.top-menu .sub-menu,.top-menu .children,.more-link,.nav-links a:hover,.nav-links .current,#footer{background-color:', to, '}' );
		});
	});

	// show_mobile_thumb
	wp.customize( 'show_mobile_thumb', function (value) {
		value.bind(function (to) {
			var $images = $('.post .anons-thumbnail');
			false === to
				? $images.removeClass('show')
				: $images.addClass('show');
		});
	});

	// show_sidebar
	var $sidebar = $('#sidebar');
	// if ( ! wp.customize.instance(optname + '[show_sidebar]').get() ) {
	// 	$sidebar.hide();
	// }
	wp.customize( optname + '[show_sidebar]', function (value) {
		value.bind(function (to) {
			false === to
				? $sidebar.removeClass('block')
				: $sidebar.addClass('block');
		});
	});

	// layout_home
	wp.customize( optname + '[layout_home]', function (value) {
		value.bind(function (to) {
			$('body').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});

	// layout_post
	wp.customize( optname + '[layout_post]', function (value) {
		value.bind(function (to) {
			$('body').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});

	// layout_page
	wp.customize( optname + '[layout_page]', function (value) {
		value.bind(function (to) {
			$('body').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});

	// layout_default
	wp.customize( optname + '[layout_default]', function (value) {
		value.bind(function (to) {
			// console.log(to);
			$('body').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});


	// layout_page
	wp.customize( 'layout_shop', function (value) {
		value.bind(function (to) {
			// console.log(to);
			$('body').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});


	// layout_page
	wp.customize( 'layout_search', function (value) {
		value.bind(function (to) {
			$('body.search').removeClass('layout-rightbar layout-leftbar layout-full layout-center')
				.addClass( 'layout-' + to );
		});
	});

	// postmeta_list
	wp.customize( 'postmeta_list', function (value) {
		value.bind(function (to) {
			// console.log( to );
			$('.meta').find('span').addClass('hide');

			var arr = to.split('_');
			arr.forEach(function( item, i, arr ) {
				$('.meta').find( '.'+item ).removeClass('hide');
			});
		});
	});

	// title_before_socshare
	wp.customize( optname + '[title_before_socshare]', function (value) {
		value.bind(function (to) {
			var $block = $('.socshare-title');
			if (!$block.length) {
				$('social_share').prepend('<p class="socshare-title"></p>');
			}
			$block.text(to);
		});
	});


	// custom html before_content
	wp.customize( optname + '[before_content]', function (value) {
		value.bind(function (to) {
			var $block = $('.html-before-content');
			if ( ! $block.length ) {
				$('.entry').append('<div class="html-before-content"></div>');
			}
			$block.html( to );
		});
	});

	// custom html after_content
	wp.customize( optname + '[after_content]', function (value) {
		value.bind(function (to) {
			var $block = $('.html-after-content');
			if ( ! $block.length ) {
				$('.entry').append('<div class="html-after-content"></div>');
			}
			$block.html( to );
		});
	});

	// custom_styles
	wp.customize( optname + '[custom_styles]', function (value) {
		value.bind(function (to) {
			$(basic_custom_style).text( to );
		});
	});

	// copyright_text
	wp.customize( optname + '[copyright_text]', function (value) {
		value.bind(function (to) {
			$('.copyright-text').text( to );
		});
	});

	// footer_counters
	wp.customize( optname + '[footer_counters]', function (value) {
		value.bind(function (to) {
			$('.footer-counter').html( to );
		});
	});



	// -----------------------------------------------------------------------
	function basic_update_style( before, new_value, after ){
		var style_now = $( window.basic_style ).text();
		var pos = style_now.search( before );
		if ( pos == -1 )
			$(window.basic_style).append( before + new_value + after );
		else{
			var before_reg = before,
				after_reg = after;
			before_reg.replace('}', '\}')
				.replace('@', '\@')
				.replace('.', '\.')
				.replace('(', '\(')
				.replace(')', '\)')
				.replace('>', '\>');
			after_reg.replace('}', '\}')
				.replace('@', '\@')
				.replace('.', '\.')
				.replace('(', '\(')
				.replace(')', '\)');
			var reg_str = new RegExp( before_reg + '(.*?)' + after_reg );
			$( window.basic_style ).text( style_now.replace( reg_str, before + new_value + after ) );

		}
	}
	window.basic_update_style = basic_update_style;

	// -----------------------------------------------------------------------

});