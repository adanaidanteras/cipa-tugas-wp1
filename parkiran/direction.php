<?php

require __DIR__."/../layout/header.php";

function getMetaTitle(){
    echo "Diretion Ke Tempat Parkir";
}

require __DIR__."/../layout/nav.php";

?>
<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0">
          <div class="card-body">
        
            <?php

                $sql = "SELECT * FROM parkirans";

                if(isset($_GET["id"])){
                    $sql .= " WHERE parkirans.id = '{$_GET["id"]}'";
                }else{
                    exit();
                }

                $hasil = mysqli_query($kon, $sql);
                
                $no=0;

                $maps_location = "";
                $maps_location_lng = "";

                while($data = mysqli_fetch_array($hasil)){
                    $no++;
                    $maps_location = $data['latitude'].", ".$data['longitude'];
                    $maps_location_lng = $data['longitude'];

            ?>
            
            <div class="card-title mb-4">
                <h3 class="m-0">Direction Ke Tempat Parkir</h3>
            </div> 
            <div class="card-title mb-4">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-warehouse fa-fw fa-2x parking-icon"></i>
                    </div>
                    <div class="col">
                        <h4 class=""><?=$data['nama_tempat']?></h4> 
                        <p class="m-0 mt-2 text-gray-500 small">
                            <?=$data['detail_alamat']?>
                        </p>
                        <p class="m-0 mt-2">
                            <span id="jarak"></span> &middot; <span id="waktu"></span>
                        </p>
                    </div>
                </div>
            </div> 
            <div class="row mt-3">
                <div class="col-sm-12 text-gray-500">
                    <p class="font-weight-normal">Maps Location</p>
                    <div id="mapid" class="maps-md"></div>
                  
                </div>
            </div>
            
            <?php
            
                }

            ?>
            
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    // initialize the map on the "map" div with a given center and zoom

    navigator.geolocation.getCurrentPosition(getLocationSuccess, getLocationError, getLocationOptions);

    var myLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-self.png',
        iconSize:     [40, 40],
    
    });
    var parkingLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-parking.png',
        iconSize:     [40, 40],
    });
    
	var mymap;

  var getLocationOptions = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };

  function getLocationSuccess(pos) {
    var crd = pos.coords;

    // console.log('Your current position is:');
    // console.log(`Latitude : ${crd.latitude}`);
    // console.log(`Longitude: ${crd.longitude}`);
    // console.log(`More or less ${crd.accuracy} meters.`);

    mymap = L.map('mapid').setView([crd.latitude, crd.longitude], 16);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(mymap);
    
    var routeControl = L.Routing.control({
        waypoints: [
            L.latLng(crd.latitude, crd.longitude),
            L.latLng(<?=$maps_location?>)
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
        // alert('Total distance is ' + summary.totalDistance / 1000 + ' km and total time is ' + Math.round(summary.totalTime % 3600 / 60) + ' minutes');
        $('#jarak').html((summary.totalDistance / 1000).toFixed(1)+ ' Km')
        $('#waktu').html(Math.round(summary.totalTime % 3600 / 60) + ' minutes')
    });

  }

  function getLocationError(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }

</script>
<?php

require __DIR__."/../layout/footer.php";

?>