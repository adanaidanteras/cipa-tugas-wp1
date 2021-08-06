
    <?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "Adan123";
    $db_name ="cipa";


    $kon = mysqli_connect($db_host,$db_user, $db_pass, $db_name);

    if(!$kon){
        die("Koneksi Gagal : ".mysqli_connect_error());
    }


    