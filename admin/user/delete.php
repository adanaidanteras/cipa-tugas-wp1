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

    if(isset($_GET["id"])){
        $id = input($_GET["id"]);

        $sql = "DELETE FROM users WHERE id='$id'";
    
        $hasil = mysqli_query($kon, $sql);


        if($hasil == 1)
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
                        text: 'Data gagal dihapus',
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
}
?>