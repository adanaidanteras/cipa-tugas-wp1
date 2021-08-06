<?php

$base_url = "https://".$_SERVER["HTTP_HOST"].'/cipa/';

if(!isset($_SERVER['HTTPS'])) {
    header('Location:'.$base_url);
}

$method = $_SERVER['REQUEST_METHOD'];