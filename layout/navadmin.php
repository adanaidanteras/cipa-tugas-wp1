
<style>
  body{
    background-color: #F5F5F5;
  }
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="<?=$base_url?>admin/index.php">
      <img src="<?=$base_url?>assets/img/logocipa.png" height="46" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<?php

session_start();
 
if(!isset($_SESSION["email"])){  
  header('Location: '.$base_url.'admin/login.php');
}

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?=($uri_segments[3] == 'parkiran')? 'active':''?>">
                <a class="nav-link pl-3 pr-3" href="<?=$base_url?>admin/parkiran/view.php">Data Tempat Parkir</a>
            </li>
            <li class="nav-item <?=($uri_segments[3] == 'user')? 'active':''?>">
                <a class="nav-link pl-3 pr-3" href="<?=$base_url?>admin/user/view.php">Data Administrator</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pl-3 pr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=$base_url?>admin/logout.php">
                        <i class="fas fa-sign-out-alt fa-fw"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
  </div>
</nav>