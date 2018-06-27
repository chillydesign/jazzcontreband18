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






        // MEMBERS MAP
        if (typeof $member_locations != 'undefined') {


            // fix bug where map doesnt render sometimes
            setTimeout( function(){
                var map_theme = [{"featureType":"all","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":-30}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#353535"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#656565"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"lightness":"-31"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#505050"},{"lightness":"-14"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#808080"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#454545"}]},{"featureType":"transit","elementType":"labels","stylers":[{"saturation":100},{"lightness":-40},{"invert_lightness":true},{"gamma":1.5},{"color":"#000000"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#fcea1d"}]}];

                var map_options = {
                    zoom: 13,
                    mapTypeControl: true,
                    scrollwheel: false,
                    draggable: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: map_theme
                };


                var member_map_container = $('#member_map_container');
                member_map_container.css({
                    width : '100%',
                    //height: 560
                })

                var member_map = new google.maps.Map(member_map_container.get(0), map_options);
                var member_bounds = new google.maps.LatLngBounds();
                var member_infowindow = new google.maps.InfoWindow({content: '...'});
                var member_markers = [];

                for (var  i = 0;  i < $member_locations.length ;i++) {
                    var member_location = $member_locations[i];
                    if (member_location != null  ) {
                        addPointToMap(member_map, member_location, member_bounds, member_infowindow, member_markers);
                    }

                }

                // This is needed to set the zoom after fitbounds,
                google.maps.event.addListener(member_map, 'zoom_changed', function() {
                    if (this.getZoom() > 16 && this.initialZoom == true) {
                        // Change max/min zoom here
                        this.setZoom(16);
                        this.initialZoom = false;
                    }

                });
                member_map.initialZoom = true;
                member_map.fitBounds(member_bounds);

                google.maps.event.trigger(member_map, 'resize');
            }, 1000)

            // if ($member_locations.length == 1) {
            //     var member_location = $member_locations[0];
            //     console.log(member_location.lat, member_location.lng);
            //     member_map.setCenter(new google.maps.LatLng(member_location.lat, member_location.lng));
            // }


        };
        // END OF MAP
        // END OF MAP




	});

})(jQuery, this);


function addPointToMap(map,  location, bounds, infowindow, markers ) {
	var latitude = location.lat;
	var longitude = location.lng;

	if ( typeof latitude != 'undefined'  && typeof longitude != 'undefined'){
		console.log(latitude);


		var customMarker = {
			url: 'https://jazzcontreband.com/wp-content/themes/jazzcontreband/img/marker.svg',
			size: new google.maps.Size(14, 20),
			origin: new google.maps.Point(0, 0),
		//	anchor: new google.maps.Point(15, 22)
			anchor: new google.maps.Point(0, 0)
		};

		var latlng = new google.maps.LatLng(  latitude , longitude);


		var marker = new google.maps.Marker({
			map: map,
			position: latlng,
			title: location.title,
			url: location.url,
			id: location.id,
			icon: customMarker
		});


		marker.addListener('click', function() {
			infowindow.setContent('<a class="map_link" href="'  + this.url + '">' + this.title + '</a>'  );
			infowindow.open(map, this);
		});

		markers.push(marker);

		bounds.extend(latlng);

	}

};
