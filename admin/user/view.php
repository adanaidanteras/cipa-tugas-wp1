<?php

require __DIR__."/../../layout/header.php";

function getMetaTitle(){
    echo "Data Administrator";
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
                        <h3 class="">Data Administrator</h3>
                      </div>
                      <div class="col mb-3">
                        <form class="form-inline navbar-search-sm" action="<?=$base_url?>admin/user/view.php" method="GET" >
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0 bg-light">
                                        <i class="fas fa-search fa-fw"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-0 bg-light" placeholder="Cari administrator" name="search" <?=(isset($_GET["search"])) ? "value='".$_GET["search"]."'" : ""?>>
                            </div>
                        </form>
                      </div>
                      <div class="col text-right mb-3">
                        <a href="<?=$base_url?>admin/user/add.php" class="btn btn-success pl-3 pr-3">Add New</a>
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
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM users";

                                if(isset($_GET["search"])){
                                $sql .= " WHERE users.nama_lengkap LIKE '%{$_GET["search"]}%'";
                                }

                                $hasil = mysqli_query($kon, $sql);
                                

                                $no=0;
                                while($data = mysqli_fetch_array($hasil)){
                                    $no++;
                                ?>
                                <tr>
                                    <th scope="row"><?=$no?></th>
                                    <td style="max-width: 200px;">
                                        <b><?=$data['nama_lengkap']?></b>
                                    </td>
                                    <td style="max-width: 200px;">
                                        <p><?=$data['email']?></p>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=$base_url?>admin/user/edit.php?id=<?=$data['id']?>"  class="btn btn-primary btn-action">Edit</a>
                                            <button class="btn btn-danger btn-action" onclick="delete_list('<?=$base_url?>admin/user/delete.php?id=<?=$data['id']?>','<?=$data['nama_lengkap']?>')">Delete</button>
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
    function delete_list(url, nama_lengkap){
        Swal.fire({
        title: 'Hapus Data Administrator ?',
        html: '<br><br><div class="row justify-content-center"><div class="col-auto"><i class="fas fa-user fa-fw parking-icon mr-2"></i></div><div class="col-auto text-left"> '+nama_lengkap+' <br><small class="text-gray-500"></small></div></div><br><br>',
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