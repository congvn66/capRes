<?php
    require_once '../models/WaiterModel.php';

    $waiterModel = new WaiterModel();
    
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-waiter'])){
                $waiter_name = $_POST['waiter_name'];
                $salary = $_POST['salary'];
                $phone = $_POST['phone'];

                if($waiterModel->insertDataWaiter($waiter_name, $salary, $phone)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/waiter/add-waiter.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $waiterModel->getWaiterFromID($id);

                if(isset($_POST['edit-waiter'])) {
                    $waiter_name = $_POST['waiter_name'];
                    $salary = $_POST['salary'];
                    $phone = $_POST['phone'];

                    if($waiterModel->updateDataWaiter($id, $waiter_name, $salary, $phone)){
                        header('location: index.php?controller=waiter&action=list');
                    }
                }
            }
            require_once('../views/waiter/edit-waiter.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if($waiterModel->deleteWaiter($id)) {
                    header('location: index.php?controller=waiter&action=list');
                }
            } else {
                header('location: index.php?controller=waiter&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $waiterModel->getAllWaiters();
            require_once('../views/waiter/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                //$tbl = "admin";
                
                $dataSearch = [];
                $dataSearch = $waiterModel->searchForWaiter($key);
            }
            require_once('../views/waiter/search-waiter.php');
            break;
        }

        default:{
            require_once('../views/waiter/list.php');
            break;
        }
    }
?>