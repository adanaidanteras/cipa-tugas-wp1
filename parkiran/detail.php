<?php

require __DIR__."/../layout/header.php";

function getMetaTitle(){
    echo "Detail Tempat Parkir";
}

require __DIR__."/../layout/nav.php";

?>
<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0">
          <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        
                            
                    <?php

                        $sql = "SELECT * FROM parkiran_images";

                        if(isset($_GET["id"])){
                            $sql .= " WHERE parkiran_images.id_parkiran = '{$_GET["id"]}'";
                        }else{
                            exit();
                        }

                        $hasil = mysqli_query($kon, $sql);
                        
                        $no=0;

                        $maps_location = "";
                        $carousel_indicator="";
                        $carousel_item="";
                        while($data = mysqli_fetch_array($hasil)){
                            $active = ($no == 0) ? 'active':'';
                            $carousel_indicator .= '
                            
                                <li data-target="#carouselExampleIndicators" data-slide-to="'.$no.'" class="'.$active.'"></li>
                            ';
                            $carousel_item .= '
                                <div class="carousel-item '.$active.'">
                                    <div class="d-block w-100 img-carousel" style="background-image: url('.$base_url.'assets/img/parkiran/'.$data['src'].')">
                                    </div>
                                </div>
                            ';
                            $no++;
                        }
    
                    ?>

                        <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?=$carousel_indicator?>
                            </ol>
                            <div class="carousel-inner">
                                <?=$carousel_item?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            
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

                        while($data = mysqli_fetch_array($hasil)){
                            $no++;
                            $maps_location = $data['latitude'].", ".$data['longitude']
    
                    ?>
                    
                        <h3 class=""><?=$data['nama_tempat']?></h3>
                        <p class="m-0 text-gray-500 mt-3 mb-5 small">
                            <?=$data['detail_alamat']?>
                        </p>
                        
                        <table class="table-capasity mb-5">
                            <thead>
                                <tr>
                                    <th class="font-weight-normal">Kendaraan</th>
                                    <th>
                                        <div style="width: 50px;"></div>
                                    </th>
                                    <th class="font-weight-normal">Kapasitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fas fa-motorcycle fa-fw fa-kendaraan"></i>
                                    </td>
                                    <td></td>
                                    <td class="text-primary">
                                        <?=$data['kapasitas_motor']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-car-side fa-fw fa-kendaraan"></i>
                                    </td>
                                    <td></td>
                                    <td class="text-primary">
                                        <?=$data['kapasitas_mobil']?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="font-weight-normal">Maps Location</p>
                        <div id="mapid" class="maps-sm mb-5"></div>
                        
                        
                        <a href="<?=$base_url?>parkiran/direction.php?id=<?=$data['id']?>" class="btn btn-primary btn-block mb-5">
                            Direction Ke Parkiran
                        </a>
                        <?php
                            }
                        ?>
                    
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    // initialize the map on the "map" div with a given center and zoom


    var parkingLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-parking.png',

        iconSize:     [40, 40],
    });

	var mymap = L.map('mapid').setView([<?=$maps_location?>], 15);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    
	L.marker([<?=$maps_location?>], {icon: parkingLocationIcon}).addTo(mymap)

</script>
<?php

require __DIR__."/../layout/footer.php";

?>