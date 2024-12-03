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
        case 'waiter':{
            require_once('../controller/waiter/index.php');
            break;
        }
        case 'table':{
            require_once('../controller/table/index.php');
            break;
        }
        case 'supplier':{
            require_once('../controller/supplier/index.php');
            break;
        }
        case 'ingredient':{
            require_once('../controller/ingredient/index.php');
            break;
        }
        case 'provide':{
            require_once('../controller/provide/index.php');
            break;
        }
        case 'account':{
            require_once('../controller/account/index.php');
            break;
        }
        default:{
            require_once('../controller/home/index.php');
            break;
        }
    }
?>
