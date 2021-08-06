<?php

require __DIR__."/../layout/header.php";

function getMetaTitle(){
    echo "Home";
}

$error_login = '';
session_start();


if($method === 'POST'){
    if(isset($_POST['email']) && isset($_POST['email'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";

        $hasil = mysqli_query($kon, $sql);
        $result = mysqli_fetch_array($hasil);
        if($result){
            $_SESSION["id"] = $result["id"];
            $_SESSION["email"] = $email;
            header('Location: '.$base_url.'admin/parkiran/view.php');

        }else{
            $error_login = '
            <div class="alert alert-danger" role="alert">
                Email atau Password salah !
            </div>';
        }
    }      
}


?>
<div class="container py-5">
    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-lg-12 text-center">
            <img src="<?=$base_url?>assets/img/logocipa.png" alt="" width="128px" class="mb-4">
        </div>
        <div class="col-lg-4 mt-3">
            <form method="POST">
                <?= $error_login ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" require>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
        </div>
    </div>
</div>

<?php

require __DIR__."/../layout/footer.php";

?>