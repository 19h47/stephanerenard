var map = {
    _options: {
        styles: [
            {
                featureType: "administrative",
                elementType: "labels.text.fill",
                stylers: [
                    {
                        color: "#737373"
                    }
                ]
            },
            {
                featureType: "administrative.country",
                elementType: "labels",
                stylers: [
                    {
                        visibility: "on"
                    },
                    {
                        color: "#d79d8a"
                    }
                ]
            },
            {
                featureType: "administrative.country",
                elementType: "labels.text.stroke",
                stylers: [
                    {
                        gamma: "5.10"
                    },
                    {
                        invert_lightness: true
                    }
                ]
            },
            {
                featureType: "landscape",
                elementType: "all",
                stylers: [
                    {
                        color: "#cfcfcf"
                    },
                    {
                        lightness: "87"
                    }
                ]
            },
            {
                featureType: "poi",
                elementType: "all",
                stylers: [
                    {
                        visibility: "on"
                    }
                ]
            },
            {
                featureType: "road",
                elementType: "all",
                stylers: [
                    {
                        saturation: -50
                    },
                    {
                        lightness: 45
                    }
                ]
            },
            {
                featureType: "road.highway",
                elementType: "all",
                stylers: [
                    {
                        visibility: "simplified"
                    }
                ]
            },
            {
                featureType: "road.highway",
                elementType: "geometry.fill",
                stylers: [
                    {
                        color: "#a6a6a0"
                    }
                ]
            },
            {
                featureType: "road.arterial",
                elementType: "labels.icon",
                stylers: [
                    {
                        visibility: "on"
                    }
                ]
            },
            {
                featureType: "transit",
                elementType: "all",
                stylers: [
                    {
                        visibility: "on"
                    }
                ]
            },
            {
                featureType: "water",
                elementType: "all",
                stylers: [
                    {
                        color: "#8ac4d7"
                    },
                    {
                        visibility: "on"
                    },
                    {
                        lightness: "75"
                    }
                ]
            }
        ]
    },
    _icon: null,

    _instance: null,
    _el: null,

    _locations: [],
    _marker: null,

    _bounds: null,

    init: function() {
        console.log('map.init');

        this._el = document.getElementById('map');

        this._bounds = new google.maps.LatLngBounds();

        if (typeof(this._el) === 'undefined' || this._el === null) return;

        if (wp.map_lat_01 && wp.map_lng_01 || wp.map_title_01 ) {
            // console.log( 'Coordonnées 01 = ' + wp.map_lat_01  + ' ' + wp.map_lng_01);
            var location_01 = [wp.map_lat_01, wp.map_lng_01, wp.map_title_01];
            // console.log(location_01);

            this._locations.push(location_01);
        }

        if (wp.map_lat_02 && wp.map_lng_02 || wp.map_title_02) {
            // console.log( 'Coordonnées 02 = ' + wp.map_lat_02  + ' ' + wp.map_lng_02);
            var location_02 = [wp.map_lat_02, wp.map_lng_02, wp.map_title_02];
            // console.log(location_02);

            this._locations.push(location_02);
        }

        if (!this._locations) {
            return false;
        }

        // console.log(this._locations);

        this._options = $.extend(this._options, {
            zoom: Number(wp.map_zoom),
            maxZoom: Number(wp.map_zoom),
            center: {
                lat: 47.21837,
                lng: -1.55362
            },
            disableDefaultUI: true,
            backgroundColor: '#fff',
            streetViewControl: false,
            mapTypeControl: false,
            scrollwheel: false,
            draggable: true,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            }
        });

        this._instance = new google.maps.Map(this._el, this._options);

        this._icon = {
            url: wp.template_directory_uri + '/img/svg/stephanerenard_marker.svg',
        };

        for (i = 0; i < this._locations.length; i++) {
            // console.log(this._locations[i][0], this._locations[i][1])
            this.marker = new google.maps.Marker({
                position: new google.maps.LatLng(this._locations[i][0], this._locations[i][1]),
                icon: this._icon,
                animation: google.maps.Animation.DROP,
                map: this._instance,
            });


            if (!this._locations[i][2]) {
                this.marker.title = this._locations[i][2];
            }

            this._bounds.extend(this.marker.position);
        };

        this._instance.fitBounds(this._bounds);

        // this._instance.setCenter(this.marker.getPosition());

        this._initEvents();
    },


    _initEvents: function() {
        var _this = this;

        // google.maps.event.addListener(_this._instance, 'click', function() {
        //     _this.allowMouseWheelScrolling(true);
        // });
    },


    allowMouseWheelScrolling: function(allow) {
        var _this = this;

        this._instance.setOptions({
            scrollwheel: !!allow,
            draggable: !!allow
        });

        if (!!allow) {

            $(window).on('scroll.outside.map', function() {
                _this.allowMouseWheelScrolling(false);
            });

            $('body').on('click.map', function(e) {
                var clickedInsideMap = $(e.target).parents('#map').length > 0;

                if (!clickedInsideMap) {
                    _this.allowMouseWheelScrolling(false);
                }
            });

        } else {

            $(window).off('scroll.outside.map');
            $('body').off('click.map');
        }
    }
};