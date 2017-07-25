(function ($) {
	'use strict';

	$(document).ready(function () {

		// Custom Social contorl for Customizer
		var socialPicker = $('.social-picker');
		if(socialPicker.length) {
			var socialControl = {
				holder: $('.social-picker > ul'),
				socialInput: $('.social-input'),
				obj: $('.social-input').val() ? JSON.parse($('.social-input').val())  : []
			};

			socialPicker.on('click', '.add-social', function (e) {
				e.preventDefault();
				var currentItem = $(this).closest('li').get(0).outerHTML;
				console.log($(currentItem).find('input').attr('value', ''));
				socialControl.holder.append(currentItem);

			});

			socialPicker.on('click', '.remove-social', function (e) {
				e.preventDefault();
				var currentItem = $(this).closest('li'),
					index = $('.remove-social').index(this);
				currentItem.remove();
				socialControl.obj.splice(index, 1);
				socialControl.socialInput.val(JSON.stringify(socialControl.obj));
				socialControl.socialInput.trigger('keyup');

			});

			$('.social-picker').on('change', 'select', function () {
				var index = $('.social-picker select').index(this);
				(typeof socialControl.obj[index] === 'object') ?
					socialControl.obj[index]['icon'] = $(this).val() : socialControl.obj[index] = {icon: $(this).val()};
				socialControl.socialInput.val(JSON.stringify(socialControl.obj));
				socialControl.socialInput.trigger('keyup');
			});

			$('.social-picker').on('keyup', 'input', function () {
				var index = $('.social-picker input').index(this);
				(typeof socialControl.obj[index] === 'object') ?
					socialControl.obj[index]['url'] = $(this).val() : socialControl.obj[index] = {url: $(this).val()};
				socialControl.socialInput.val(JSON.stringify(socialControl.obj));
				socialControl.socialInput.trigger('keyup');
			});

			var proVersion = $('<a />')
				.attr('href', 'http://designhooks.com/themes/sentio-pro/')
				.attr('target', '_blank')
				.addClass('dh-pro').append('PRO version available');
			$('#customize-info').after( proVersion );
		}

	});

})(jQuery);