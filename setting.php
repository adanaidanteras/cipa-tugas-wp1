

<p style='margin-bottom:10px'><h3>Database Configuration - By Adan Aidan Teras</h3></p>
<style>
    .table tr {
        vertical-align:top;
        margin-bottom: 5px;
    }
    input{
        padding: 8px 5px 8px 5px;
        border:1px solid #bfbfbf;
        border-radius: .55rem;
        width: 200px;
    }
    input:focus{
        box-shadow: none;
        outline: none;
    }
    table tr td{
        vertical-align: middle;
    }
    .btn{
        background-color: #476bed;
        border: 1px solid #476bed;
        color: #fff;
        cursor: pointer;
        padding: 8px 8px 8px 8px; 
        border-radius: .55rem;
        width: 200px;
        text-decoration: none;
    }
    .btn:hover{
        background-color: #3658d1;
        text-decoration: none;
    }
</style>
<?php
 

$fileName = "database.php";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $file = fopen($fileName,"w");
    
    fwrite($file,'
    <?php

    $db_host = "'.$_POST["host"].'";
    $db_user = "'.$_POST["uname"].'";
    $db_pass = "'.$_POST["pass"].'";
    $db_name ="'.$_POST["db"].'";


    $kon = mysqli_connect($db_host,$db_user, $db_pass, $db_name);

    if(!$kon){
        die("Koneksi Gagal : ".mysqli_connect_error());
    }


    ');

    fclose($file); 

    echo "Success, Go To : <a href='migration.php' class='btn'>Migration</a>";
}else{
?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <table cellspacing='0' cellpadding='10px' class='table'>
        <tr>
            <td>DB Host </td>
            <td>:</td>
            <td>
                <input type="text" value="localhost" name="host" required>
            </td>
        </tr>
        <tr>
            <td>DB Name </td>
            <td>:</td>
            <td>
                <input type="text" value="cipa" name="db">
            </td>
        </tr>
        <tr>
            <td>DB Username </td>
            <td>:</td>
            <td>
                <input type="text" value="root" name="uname" required>
            </td>
        </tr>
        <tr>
            <td>DB Password </td>
            <td>:</td>
            <td>
                <input type="password" value="" name="pass">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" value="Save Configuration" class="btn">
            </td>
        </tr>
    </table>
</form>
<?php
}
?>