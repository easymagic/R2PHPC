<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgzNrN0i8WNwm3bOiWFeXt_bQFy4Vr5Vs&libraries=geometry"></script>
<!-- https://maps.googleapis.com/maps/api/js -->
<!-- AIzaSyDgzNrN0i8WNwm3bOiWFeXt_bQFy4Vr5Vs -->
<!-- &callback=initMap -->
   <script type="text/javascript">
   var markers = [
    
       //      {
       //         "title": 'Alibaug',
       //         "lat": '18.641400',
       //         "lng": '72.872200',
       //         "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
       //     }
    
       // ,
    
            {
               "title": 'Mumbai',
               "lat": '6.492988333333333',
               "lng": '3.599058333333333',
               "description": 'Mumbai formerly Bombay, is the capital city of the Indian state of Maharashtra.'
           }
    
       ,
    
            {
               "title": 'Pune',
               "lat": '6.4531',
               "lng": '3.3958',
               "description": 'Pune is the seventh largest metropolis in India, the second largest in the state of Maharashtra after Mumbai.'
           }
    
   ];

   var styles = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
];

   </script>
   <script type="text/javascript">

    var EventBus = {};

    (function($eb){

      var listeners = {};

       $eb.Subscribe = function(subject,cb){
          if (!listeners[subject]){
             listeners[subject] = [];
          }
          listeners[subject].push(cb);
       };

       $eb.Notify = function(subject,message){
          if (listeners[subject]){
            listeners[subject].forEach(function(v,k){
              v(message);
            });
          }
       };

    })(EventBus);

    var geo = {};
    
    geo.map = null;
    geo.path = null;
    geo.service = null;
    geo.infoWindow = null;
    geo.poly = null;
    geo.markers = [];

    

    ///InitMap
    EventBus.Subscribe('InitMap',function(config){
           var mapOptions = {
               center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
               zoom: 8,
               mapTypeId: google.maps.MapTypeId.ROADMAP,
               styles:styles
           };
           
           geo.path = new google.maps.MVCArray();
           geo.service = new google.maps.DirectionsService();
 
           geo.infoWindow = new google.maps.InfoWindow();
           geo.map = new google.maps.Map(document.getElementById(config.mapId), mapOptions);
           geo.poly = new google.maps.Polyline({ map: geo.map, strokeColor: '#443b31' }); //#FF8200
    });

    //Alias InitMap (ClearMap) 
    EventBus.Subscribe('ClearMap',function(config){
       EventBus.Notify('InitMap',config);
    });


    ////AddMarkers
    EventBus.Subscribe('AddMarkers',function(config){
           var lat_lng = [];


            function pinSymbol(color) {
                return {
                    path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
                    fillColor: color,
                    fillOpacity: 1,
                    strokeColor: '#FFF',
                    strokeWeight: 2,
                    scale: 1,
               };
            }

// var marker = new GMarker(map.getCenter(), {icon: newIcon});

           for (i = 0; i < config.markers.length; i++) {
               var data = config.markers[i]
               var myLatlng = new google.maps.LatLng(data.lat, data.lng);
               lat_lng.push(myLatlng);
               var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: geo.map,
                   title: data.title,
                   icon: pinSymbol("#000")
               });

               geo.markers.push(marker); //cache marker

               // pinSymbol("#FFF")

               (function (marker, data) {
                   google.maps.event.addListener(marker, "click", function (e) {
                       infoWindow.setContent(data.description);
                       infoWindow.open(geo.map, marker);
                   });
               })(marker, data);
           }
    });


    ///DrawPath
    EventBus.Subscribe('DrawPath',function(config){

           var lat_lng = [];
           geo.path.clear(); //clear the path first.

           for (i = 0; i < config.markers.length; i++) {
               var data = config.markers[i]
               var myLatlng = new google.maps.LatLng(data.lat, data.lng);
               lat_lng.push(myLatlng);
           }

           for (var i = 0; i < lat_lng.length; i++) {
               if ((i + 1) < lat_lng.length) {
                   var src = lat_lng[i];
                   var des = lat_lng[i + 1];
                   geo.path.push(src);
                   geo.poly.setPath(geo.path);
                   geo.service.route({
                       origin: src,
                       destination: des,
                       travelMode: google.maps.DirectionsTravelMode.DRIVING
                   }, function (result, status) {
                       if (status == google.maps.DirectionsStatus.OK) {
                           for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                               geo.path.push(result.routes[0].overview_path[i]);
                           }
                       }
                   });
               }
           }

    });


    EventBus.Subscribe('ZoomMap',function(config){
      geo.map.setZoom(config.zoom);
    });

    EventBus.Subscribe('MapComputeDistance',function(config){
      var latLngA = new google.maps.LatLng(config.locationA.lat, config.locationA.lng);
      var latLngB = new google.maps.LatLng(config.locationB.lat, config.locationB.lng);
      var result = (google.maps.geometry.spherical.computeDistanceBetween(latLngA, latLngB) / 1000).toFixed(2);

      console.log('Returns the distance in (KM).');

      EventBus.Notify('MapGetDistance',result);
    });

    EventBus.Subscribe('MapDrawRadiusRange',function(config){

      var marker = new google.maps.Marker({
        map: geo.map,
        position: new google.maps.LatLng(config.lat, config.lng),
        title: 'Some location'
      });

      geo.markers.push(marker); //cache marker

      // Add circle overlay and bind to marker
      var circle = new google.maps.Circle({
        map: geo.map,
        radius: (config.radius * 1000),    // 16093 => 10 miles in metres
        fillColor: '#b8bef0' //'#AA0000'
      });

      circle.bindTo('center', marker, 'position');

    });

    EventBus.Subscribe('MapRemoveMarkers',function(){
      //geo.markers.push(marker); //cache marker
      geo.markers.forEach(function(v,k){
        v.setMap(null);
      });
      geo.markers = [];

    });

    EventBus.Subscribe('MapRemovePolyLines',function(){
      geo.poly.setMap(null);
    });





 
       window.onload = function () {

        EventBus.Notify('InitMap',{
          mapId:"dvMap"
        });

        EventBus.Notify('AddMarkers',{
          markers:markers
        });

        EventBus.Notify('DrawPath',{
          markers:markers
        });

        EventBus.Notify('ZoomMap',{
          zoom:10
        });


        EventBus.Subscribe('MapGetDistance',function(result){
          console.log(result);
        });

        EventBus.Notify('MapComputeDistance',{
          locationA:{
            lat:markers[0]['lat'],
            lng:markers[0]['lng']
          },
          locationB:{
            lat:markers[1]['lat'],
            lng:markers[1]['lng']
          }
        });


        EventBus.Notify('MapDrawRadiusRange',{
          lat:markers[1]['lat'],
          lng:markers[1]['lng'],
          radius:11
        });


       }
   </script>
   <div id="dvMap" style="width: 100%; height: 500px;">
   </div>
