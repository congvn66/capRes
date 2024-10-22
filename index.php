<?php
    include "models/configDB.php";
    $db = new Database;
    $db->connect();

    if (isset($_GET['controller'])){
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    switch($controller) {
        case 'admin':{
            require_once('controller/admin/index.php');
            break;
        }
        case 'home':{
            require_once('controller/home/index.php');
            break;
        }
    }
?>
