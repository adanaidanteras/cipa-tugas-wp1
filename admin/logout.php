
<?php
session_start();
session_unset();
session_destroy();


require __DIR__.'/../config.php';
header('Location: '.$base_url.'admin/login.php');

?>