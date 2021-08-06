<?php

require __DIR__."/../../layout/header.php";

function getMetaTitle(){
    echo "Ubah Data Tempat Parkir";
}


require __DIR__."/../../layout/navadmin.php";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function input ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($method === 'POST'){
        
    $id = input($_POST["id"]);
    $nama_tempat = input($_POST["nama_tempat"]);
    $detail_alamat = input($_POST["detail_alamat"]);
    $kapasitas_motor = input($_POST["kapasitas_motor"]);
    $kapasitas_mobil = input($_POST["kapasitas_mobil"]);
    $latitude = input($_POST["latitude"]);
    $longitude = input($_POST["longitude"]);

    $id_user = $_SESSION["id"];
        
    $sql = "UPDATE parkirans SET nama_tempat='$nama_tempat', detail_alamat='$detail_alamat', kapasitas_motor='$kapasitas_motor', kapasitas_mobil='$kapasitas_mobil', latitude='$latitude', longitude='$longitude', id_user='$id_user' WHERE id='$id'";
  
    $hasil = mysqli_query($kon, $sql);

    $target_dir = __DIR__."/../../assets/img/parkiran/";
    
    $total = count($_FILES['foto_parkiran']['name']);
    if($total > 0){
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
            $target_file = $target_dir . basename($_FILES["foto_parkiran"]["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // ambil data file
            $namaFile = $_FILES['foto_parkiran']['name'][$i];
            $namaSementara = $_FILES['foto_parkiran']['tmp_name'][$i];

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                // echo "Sorry, only JPG, JPEG, PNG files are allowed. your file extention : ".$imageFileType ;
                // $uploadOk = 0;
            }else{
                $nama_file = generateRandomString().".".$imageFileType;
                $terupload = move_uploaded_file($namaSementara, $target_dir.$nama_file);

                if ($terupload) {
                    
                    $sql = "SELECT id FROM parkirans WHERE id_user = '{$id_user}' ORDER BY id DESC LIMIT 1";
                    $hasil_id = mysqli_query($kon, $sql);
                    $result = mysqli_fetch_array($hasil_id);

                    if($result){

                        $id_parkiran = $result["id"];

                        $sql = "DELETE FROM parkiran_images WHERE id_parkiran = '$id_parkiran'";
                        
                        $hasil_delete_images = mysqli_query($kon, $sql);

                        $sql = "INSERT INTO parkiran_images (id_parkiran, src) values('$id_parkiran', '$nama_file')";

                        $hasil_save_images = mysqli_query($kon, $sql);
                    }
                }
            }
        }
    }


    if($hasil == 1)
    {    
        echo "
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil diubah',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace('{$base_url}admin/parkiran/view.php')
                    } 
                });

            </script>
        ";
    }else{

        echo "
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Data gagal diubah',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace('{$base_url}admin/parkiran/view.php')
                    } 
                });
            </script>
        ";
    }

}
else if($method === 'GET'){
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM parkirans WHERE id = '{$_GET['id']}'";
        $hasil_id = mysqli_query($kon, $sql);
        $result = mysqli_fetch_array($hasil_id);

        if($result){
            $id = $result["id"];
            $nama_tempat = $result["nama_tempat"];
            $detail_alamat = $result["detail_alamat"];
            $kapasitas_motor = $result["kapasitas_motor"];
            $kapasitas_mobil = $result["kapasitas_mobil"];
            $latitude = $result["latitude"];
            $longitude = $result["longitude"];

?>

<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0">
          <div class="card-body">
            <div class="card-title mb-5 ">
                <h3 class="">Ubah - Data Tempat Parkir</h3>
            </div>
            
            <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" class="form-control" name="id" value="<?=$id?>">
                        <div class="form-group">
                            <label>Nama Tempat</label>
                            <input type="text" class="form-control" name="nama_tempat" value="<?=$nama_tempat?>">
                        </div>
                        <div class="form-group">
                            <label>Detail Alamat</label>
                            <textarea class="form-control" rows=3 name="detail_alamat"><?=$detail_alamat?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-3">Kapasitas Parkir</label>
                            
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="fas fa-motorcycle fa-fw fa-kendaraan-lg"></i>
                                </div>
                                <div class="col">
                                    Motor
                                </div>
                                <div class="col-auto">
                                    <div class="input-group input-counter">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light bg-white border-right-0" type="button" onclick="minus_motor()">
                                                <i class="fas fa-minus-circle fa-fw text-danger"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control text-center" placeholder="0" name="kapasitas_motor" id="kapasitas_motor" value="<?=$kapasitas_motor?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-light bg-white border-left-0" type="button" onclick="plus_motor()">
                                                <i class="fas fa-plus-circle fa-fw text-primary"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="fas fa-car-side fa-fw fa-kendaraan-lg"></i>
                                </div>
                                <div class="col">
                                    Mobil
                                </div>
                                <div class="col-auto">
                                    <div class="input-group input-counter">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light bg-white border-right-0" type="button" onclick="minus_mobil()">
                                                <i class="fas fa-minus-circle fa-fw text-danger"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control text-center" placeholder="0" name="kapasitas_mobil" id="kapasitas_mobil" value="<?=$kapasitas_mobil?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-light bg-white border-left-0" type="button" onclick="plus_mobil()">
                                                <i class="fas fa-plus-circle fa-fw text-primary"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maps Point</label>
                            
                            <div id="mapid" class="maps-md"></div>
                            <input type="hidden" name="latitude" id="latitude" value="<?=$latitude?>">
                            <input type="hidden" name="longitude" id="longitude" value="<?=$longitude?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Foto Parkiran</label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="foto_parkiran">Choose</label>
                                <input type="file" class="custom-file-input" id="foto_parkiran" name="foto_parkiran[]"  multiple="multiple">
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="image_list" class="row">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan Data</button>
                    </div>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</div>

<script>
    
    var parkingLocationIcon = L.icon({
        iconUrl: '<?=$base_url?>assets/img/maps/maps-marker-parking.png',

        iconSize:     [40, 40],
    });

	var mymap = L.map('mapid').setView([<?=$latitude?>,<?=$longitude?>], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    var marker;
    marker = new L.marker([<?=$latitude?>,<?=$longitude?>], {icon: parkingLocationIcon});
    mymap.addLayer(marker);

	function onMapClick(e) {
        if (marker) { // check
            mymap.removeLayer(marker); // remove
        }
        marker = new L.marker([e.latlng.lat, e.latlng.lng], {icon: parkingLocationIcon});
        mymap.addLayer(marker);
        $("#latitude").val(e.latlng.lat)
        $("#longitude").val(e.latlng.lng)
	}
	mymap.on('click', onMapClick);


    function plus_motor(){
        kapasitas = $("#kapasitas_motor").val()
        if(kapasitas == ""){
            kapasitas = 0;
        }
        $("#kapasitas_motor").val(parseInt(kapasitas) + 1)
    }
    function minus_motor(){
        kapasitas = $("#kapasitas_motor").val()
        if(kapasitas == ""){
            kapasitas = 0;
        }
        if(kapasitas > 0){
            $("#kapasitas_motor").val(parseInt(kapasitas) - 1)
        }
    }
    function plus_mobil(){
        kapasitas = $("#kapasitas_mobil").val()
        if(kapasitas == ""){
            kapasitas = 0;
        }
        $("#kapasitas_mobil").val(parseInt(kapasitas) + 1)
    }
    function minus_mobil(){
        kapasitas = $("#kapasitas_mobil").val()
        if(kapasitas == ""){
            kapasitas = 0;
        }
        if(kapasitas > 0){
            $("#kapasitas_mobil").val(parseInt(kapasitas) - 1)
        }
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            for(let i = 0; i < input.files.length; i++){
 
                $("#image_list").append(`
                    <div class="col-sm-6 text-center pb-3" id="div-image-preview-`+i+`">
                        <div id="image-preview-`+i+`" class="image-preview"></div>
                    </div>
                `)

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview-'+i).attr('style', 'background-image:url('+e.target.result+')');
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $("#foto_parkiran").change(function(){
        $("#image_list").html()
        readURL(this);
    });

    function remove_image_preview(id){
        $(id).remove()
    }
</script>
<?php
        }
    }
}

require __DIR__."/../../layout/footer.php";

?>