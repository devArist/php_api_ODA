<?php
include('db_config/Database.php');
require_once('actions/create.php');
require_once('actions/read.php');

$request_method = $_SERVER['REQUEST_METHOD'];

switch($request_method){
    case 'GET': 
        getRegistrations();
        break;
    case 'POST':
        doRegistration();
        break;
    default:
        header('HTTP/1.0 405 Méthode non permise !');
        break;
}

?>