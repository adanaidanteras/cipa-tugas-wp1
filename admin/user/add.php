<?php

require __DIR__."/../../layout/header.php";

function getMetaTitle(){
    echo "Tambah Data Administrator";
}


require __DIR__."/../../layout/navadmin.php";

function input ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($method === 'POST'){
        
    $nama_lengkap = input($_POST["nama_lengkap"]);
    $email = input($_POST["email"]);
    $password = md5($_POST["password"]);
        
    $sql = "INSERT INTO users (nama_lengkap, email, password) values('$nama_lengkap', '$email', '$password')";

    $hasil = mysqli_query($kon, $sql);

    if($hasil == 1)
    {    
        echo "
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil disimpan',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace('{$base_url}admin/user/view.php')
                    } 
                });

            </script>
        ";
    }else{

        echo "
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Data gagal disimpan',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace('{$base_url}admin/user/view.php')
                    } 
                });
            </script>
        ";
    }

}


?>

<div class="container py-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="card border-0" style="min-height: 500px;">
          <div class="card-body">
            <div class="card-title mb-5 ">
                <h3 class="">Tambah - Data Administrator</h3>
            </div>
            
            
            <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                    </div>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</div>

<?php

require __DIR__."/../../layout/footer.php";

?>