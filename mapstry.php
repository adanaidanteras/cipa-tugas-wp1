<?php

require __DIR__."/layout/header.php";

function getMetaTitle(){
    echo "Home";
}

?>

<div class="container py-3">
    <div class="row">
      <div class="col-lg-12"> 
            <div id="mapid" class="maps-lg"></div>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    // initialize the map on the "map" div with a given center and zoom
    var myLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-self.png',

        iconSize:     [40, 40],
    });
    var parkingLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-parking.png',

        iconSize:     [40, 40],
    });

	var mymap = L.map('mapid').setView([-6.1795, 106.8287], 12);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

  var getLocationOptions = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };

  function getLocationSuccess(pos) {
    var crd = pos.coords;

    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);
    
    L.marker([crd.latitude, crd.longitude], {icon: myLocationIcon}).addTo(mymap)
      .bindPopup("<b>Your Location</b><br />in here.").openPopup();
  }

  function getLocationError(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }

  navigator.geolocation.getCurrentPosition(getLocationSuccess, getLocationError, getLocationOptions);

    let locations = [
            {
                lat:-6.182156,
                lng:106.840324
            },
            {
                lat:-6.193718,
                lng:106.829939
            },
            {
                lat:-6.173068,
                lng:106.831741
            }
    ]

    locations.forEach((item) => {
        L.marker([item.lat, item.lng], {icon: parkingLocationIcon}).addTo(mymap)
    })

	// L.circle([51.508, -0.11], 500, {
	// 	color: 'red',
	// 	fillColor: '#f03',
	// 	fillOpacity: 0.5
	// }).addTo(mymap).bindPopup("I am a circle.");

	// L.polygon([
	// 	[51.509, -0.08],
	// 	[51.503, -0.06],
	// 	[51.51, -0.047]
	// ]).addTo(mymap).bindPopup("I am a polygon.");

    var routeControl = L.Routing.control({
        waypoints: [
            L.latLng(-6.182156, 106.840324),
            L.latLng(-6.173068, 106.831741)
        ],
        createMarker: function(i, waypoints, n) {
            if (i == 0) {
                marker_icon = myLocationIcon
            } else if (i > 0 && i < n - 1) {
                marker_icon = parkingLocationIcon
            } else if (i == n - 1) {
                marker_icon = parkingLocationIcon
            }
            var marker = L.marker(waypoints.latLng, {
                draggable: false,
                bounceOnAdd: false,
                bounceOnAddOptions: {
                    duration: 1000,
                    height: 800,
                    function() {
                        (bindPopup(myPopup).openOn(mymap))
                    }
                },
                icon: marker_icon
            })
            return marker
        },
        lineOptions: {
            styles: [{color: '#0062D6', opacity: .7, weight: 9}]
        },
    }).addTo(mymap);

    routeControl.on('routesfound', function(e) {
        var routes = e.routes;
        var summary = routes[0].summary;
        // alert distance and time in km and minutes
        alert('Total distance is ' + summary.totalDistance / 1000 + ' km and total time is ' + Math.round(summary.totalTime % 3600 / 60) + ' minutes');
    });
    

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
      // console.log(e)
      console.log(e.latlng.lat+", "+e.latlng.lng)
	}

	mymap.on('click', onMapClick);
</script>

<?php

require __DIR__."/layout/footer.php";

?>