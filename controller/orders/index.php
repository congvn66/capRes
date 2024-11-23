<?php
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $tbl = "orders";
                $dataOnId = [];
                $dataOnId = $db->getDataFromID($tbl, $id);

               if (isset($_POST['edit-orders'])) {
                    $id = $_POST['id'];
                    $qty = $_POST['qty'];
                    $status = $_POST['status'];
                    if ($db->updateDataOrder($qty, $status, $id)) {
                        header('location: index.php?controller=orders&action=list');
                    }
               }
            }
            require_once('../views/orders/edit-orders.php');
            break; 
        }
        case 'list':{
            $tbl = "orders";
            $data = [];
            $data = $db->getAllData($tbl);
            require_once('../views/orders/list.php');
            break; 
        }
        case 'search':{
            if (isset($_GET['cus_id'])) {
                $cus_id = $_GET['cus_id'];
                $tbl = "orders";
                
                $dataSearch = [];
                $dataSearch = $db->searchCustomerOrders($tbl, $cus_id);
            }
            require_once('../views/orders/search-orders.php');
            break;
        }
    }
?>