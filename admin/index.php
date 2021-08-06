<?php 

    require __DIR__."/../config.php";
    
    session_start();
    
    if(isset($_SESSION["email"])){
    header('Location: '.$base_url.'admin/parkiran/view.php');
    }else{
    header('Location: '.$base_url.'admin/login.php');
    }
?>