<?php
    include '../models/Database.php';

    $db = new Database;
    $connection = $db->connect();

    if ($connection === null) {
        die("Database connection failed. Please check your configuration.");
    }

    if (isset($_GET['controller'])){
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    switch($controller) {
        case 'admin':{
            require_once('../controller/admin/index.php');
            break;
        }
        case 'chef':{
            require_once('../controller/chefs/index.php');
            break;
        }
        case 'food':{
            require_once('../controller/food/index.php');
            break;
        }
        case 'orders':{
            require_once('../controller/orders/index.php');
            break;
        }
        case 'customer':{
            require_once('../controller/customer/index.php');
            break;
        }
        default:{
            require_once('../controller/home/index.php');
            break;
        }
    }
?>
