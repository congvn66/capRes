<?php
    require_once '../models/OrderModel.php';

    $orderModel = new OrderModel();

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                //$tbl = "orders";
                $dataOnId = [];
                $dataOnId = $orderModel->getOrderFromID($id);

               if (isset($_POST['edit-orders'])) {
                    $id = $_POST['id'];
                    $qty = $_POST['qty'];
                    $status = $_POST['status'];
                    if ($orderModel->updateDataOrder($qty, $status, $id)) {
                        header('location: index.php?controller=orders&action=list');
                    }
               }
            }
            require_once('../views/orders/edit-orders.php');
            break; 
        }
        case 'delete':{
            //require_once('views/admin/delete-admin.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                //$tbl = "chef";

                if($orderModel->deleteOrder($id)) {
                    header('location: index.php?controller=orders&action=list');
                }
            } else {
                header('location: index.php?controller=orders&action=list');
            }
            break;
        }
        case 'list':{
            //$tbl = "orders";
            $data = [];
            $data = $orderModel->getAllOrders();
            require_once('../views/orders/list.php');
            break; 
        }
        case 'search':{
            if (isset($_GET['cus_name'])) {
                $cus_name = $_GET['cus_name'];
                //$tbl = "orders";
                
                $dataSearch = [];
                $dataSearch = $orderModel->searchOrders($cus_name);
            }
            require_once('../views/orders/search-orders.php');
            break;
        }
    }
?>