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
        case 'chef':{
            require_once('controller/chefs/index.php');
            break;
        }
        case 'food':{
            require_once('controller/food/index.php');
            break;
        }
        default:{
            require_once('controller/home/index.php');
            break;
        }
    }
?>
