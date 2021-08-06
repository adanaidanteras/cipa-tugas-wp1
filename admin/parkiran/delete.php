<?php

require __DIR__."/../../layout/header.php";

function getMetaTitle(){
    echo "";
}


function input ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($method === 'GET'){
    session_start();

    if(isset($_GET["id"])){
        $id = input($_GET["id"]);

        $id_user = $_SESSION["id"];
            
        $sql = "DELETE FROM parkirans WHERE id_user='$id_user' AND id='$id'";
    
        $hasil = mysqli_query($kon, $sql);

        $sql = "DELETE FROM parkiran_images WHERE id_parkiran = '$id'";
        
        $hasil_delete_images = mysqli_query($kon, $sql);

        if($hasil == 1 && $hasil_delete_images == 1)
        {    
            echo "
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data berhasil dihapus',
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
                        text: 'Data gagal dihapus',
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
}
?>