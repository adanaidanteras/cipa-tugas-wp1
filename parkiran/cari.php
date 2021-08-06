<?php

require __DIR__."/../layout/header.php";

function getMetaTitle(){
    echo "Cari Tempat Parkir";
}


require __DIR__."/../layout/nav.php";


?>

<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0">
          <div class="card-body">
            <h3 class="card-title mb-4">Tempat Parkir</h3>
            
            <div class="row">
              <div class="col mb-4 col-list-parkiran">
                <?php
                  
                    if(isset($_GET["search"])){
                ?>
                    <div class="mb-2 small text-gray-500">Hasil Pencarian : <?=$_GET["search"]?></div>
                <?php
                    }
                ?>
                <div class="row-list-parkiran">
                  <?php
                    $sql = "SELECT * FROM parkirans";

                    if(isset($_GET["search"])){
                      $sql .= " WHERE parkirans.nama_tempat LIKE '%{$_GET["search"]}%'";
                    }

                    $hasil = mysqli_query($kon, $sql);
                    

                    $no=0;
                    while($data = mysqli_fetch_array($hasil)){
                        $no++;
 
                  ?>
                  
                  <a href="<?=$base_url?>parkiran/detail.php?id=<?=$data['id']?>" class="link-list h-100">
                    <div class="text-left list-parkiran">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <i class="fas fa-warehouse fa-fw parking-icon"></i>
                        </div>
                        <div class="col">
                          <p class=""><?=$data["nama_tempat"]?></p>
                          <p class="m-0 text-gray-500 small">
                            <?=substr($data["detail_alamat"],0,60)?>...
                          </p>
                        </div>
                      </div>
                    </div>
                  </a>

                  <?php
                    }
                  ?>
                  
                  
                </div>
              </div>
              <div class="col-lg-8 col-sm-12">
                <div id="mapid" class="maps-lg"></div>
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>

<script>
  
  navigator.geolocation.getCurrentPosition(getLocationSuccess, getLocationError, getLocationOptions);


  // initialize the map on the "map" div with a given center and zoom
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

    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);

    mymap = L.map('mapid').setView([crd.latitude, crd.longitude], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(mymap);

    L.marker([crd.latitude, crd.longitude], {icon: myLocationIcon}).addTo(mymap)
      // .bindPopup("<b>Your Location</b><br />in here.").openPopup();

      

    let locations = [
      <?php

        $hasil = mysqli_query($kon, $sql);

        while($data = mysqli_fetch_array($hasil)){
          echo "
            {
              id:'{$data['id']}',
              nama_tempat:'{$data['nama_tempat']}',
              lat:{$data['latitude']},
              lng:{$data['longitude']}
            },
          ";
        }
      ?>
      
    ]

    locations.forEach((item) => {
      L.marker([item.lat, item.lng], {icon: parkingLocationIcon}).addTo(mymap).bindPopup("<b><i class='fas fa-warehouse fa-fw parking-icon-sm mr-2'></i>"+item.nama_tempat+"</b><br /><div class='mt-1 w-100 text-center'><a href='<?=$base_url?>parkiran/detail.php?id="+item.id+"'>Go to Place</a></div>")
    })
    

  }

  function getLocationError(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }

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


	// var popup = L.popup();

	// function onMapClick(e) {
	// 	popup
	// 		.setLatLng(e.latlng)
	// 		.setContent("You clicked the map at " + e.latlng.toString())
	// 		.openOn(mymap);
  //     // console.log(e)
  //     console.log(e.latlng.lat+", "+e.latlng.lng)
	// }

	// mymap.on('click', onMapClick);
</script>
<?php

require __DIR__."/../layout/footer.php";

?>