// import moment from '../node_modules/moment/moment.js';

(function ($, root, undefined) {

	$(function () {

		'use strict';


		var $menu_navigation = $('#menu_navigation');
		var $menu_button = $('#menu_button');

		$menu_button.on('click', function(e){
            console.log(e);
			$menu_navigation.toggleClass('show_menu');

		});

		// if press escape key, hide menu
		$(document).on('keydown', function(e){

			if(e.keyCode == 27 ){
				$menu_navigation.removeClass('show_menu');

				$('.search_box').removeClass('visible');
			}

		})







	});

})(jQuery, this);
