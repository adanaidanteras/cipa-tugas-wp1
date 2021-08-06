<?php

require __DIR__."/../../layout/header.php";

function getMetaTitle(){
    echo "Data Tempat Parkir";
}


require __DIR__."/../../layout/navadmin.php";

?>

<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0">
          <div class="card-body">
              <div class="card-title mb-4 ">
                  <div class="row">
                      <div class="col mb-3">
                        <h3 class="">Data Tempat Parkir</h3>
                      </div>
                      <div class="col mb-3">
                        <form class="form-inline navbar-search-sm" action="<?=$base_url?>admin/parkiran/view.php" method="GET" >
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0 bg-light">
                                        <i class="fas fa-search fa-fw"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-0 bg-light" placeholder="Cari tempat parkir" name="search" <?= (isset($_GET["search"])) ? "value='".$_GET["search"]."'" : ""?>>
                            </div>
                        </form>
                      </div>
                      <div class="col text-right mb-3">
                        <a href="<?=$base_url?>admin/parkiran/add.php" class="btn btn-success pl-3 pr-3">Add New</a>
                      </div>
                  </div>
              </div>
            
            <div class="row">
                <div class="col-lg-12" style="min-height: 500px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light table-list">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tempat</th>
                                    <th scope="col">Detail Alamat</th>
                                    <th scope="col">Position (Latitude, Longtitude)</th>
                                    <th scope="col">Kapasitas Parkir</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <th scope="row"><?=$no?></th>
                                    <td style="max-width: 200px;">
                                        <b><?=$data['nama_tempat']?></b>
                                    </td>
                                    <td style="max-width: 200px;">
                                        <p><?=$data['detail_alamat']?></p>
                                    </td>
                                    <td>
                                        <?=$data['latitude']?>, <?=$data['longitude']?>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="border-0 pt-0">
                                                    <i class="fas fa-motorcycle fa-fw"></i>
                                                </td>
                                                <td class="border-0 pt-0 text-right">
                                                    <?=$data['kapasitas_motor']?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0 pt-0">
                                                    <i class="fas fa-car-side fa-fw"></i>
                                                </td>
                                                <td class="border-0 pt-0 text-right">
                                                    <?=$data['kapasitas_mobil']?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=$base_url?>admin/parkiran/edit.php?id=<?=$data['id']?>"  class="btn btn-primary btn-action">Edit</a>
                                            <button class="btn btn-danger btn-action" onclick="delete_list('<?=$base_url?>admin/parkiran/delete.php?id=<?=$data['id']?>','<?=$data['nama_tempat']?>','<?=$data['detail_alamat']?>')">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>

<script>
    function delete_list(url, nama_tempat, detail_alamat){
        Swal.fire({
        title: 'Hapus Data Tempat Parkir ?',
        html: '<br><br><div class="row justify-content-center"><div class="col-auto"><i class="fas fa-warehouse fa-fw parking-icon mr-2"></i></div><div class="col-auto text-left" style="max-width:210px"> '+nama_tempat+' <br><small class="text-gray-500"> '+detail_alamat+'</small></div></div><br><br>',
        showCancelButton: true,
        confirmButtonText: `<div style="width:120px">Ya, Hapus</div>`,
        cancelButtonText: `<div style="width:120px">Batal</div>`,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                location.replace(url)
            }
        })
    }
</script>

<?php

require __DIR__."/../../layout/footer.php";

?>