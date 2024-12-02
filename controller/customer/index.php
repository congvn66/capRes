<?php
    //include "models/configDB.php";
    

    require_once '../models/CustomerModel.php';
    require_once '../models/WaiterModel.php';

    $customerModel = new CustomerModel();
    $waiterModel = new WaiterModel();
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            //$tbl = "chef";
            $dataOfWaiters = [];
            $dataOfWaiters = $waiterModel->getAllWaiters();
            if(isset($_POST['add-customer'])){
                $customer_name = $_POST['customer_name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                if($customerModel->insertDataCustomer($customer_name, $address, $phone, $email)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/customer/add-customer.php');
            break;
        }
        case 'edit':{
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $customerModel->getCustomerFromID($id);
                //$tbl = "chef";
                $dataOfWaiters = [];
                $dataOfWaiters = $waiterModel->getAllWaiters();

                if(isset($_POST['edit-customer'])) {
                    $customer_name = $_POST['customer_name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $waiter_id = $_POST['waiter_id'];

                    if($customerModel->updateCustomer($id, $customer_name, $address, $waiter_id ,$phone, $email)){
                        header('location: index.php?controller=customer&action=list');
                    }
                }
            }
            require_once('../views/customer/edit-customer.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];;

                if($customerModel->deleteCustomer($id)) {
                    header('location: index.php?controller=customer&action=list');
                }
            } else {
                header('location: index.php?controller=customer&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $customerModel->getAllCustomers();
            require_once('../views/customer/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                
                $dataSearch = [];
                $dataSearch = $customerModel->searchForCustomer($key);
            }
            require_once('../views/customer/search-customer.php');
            break;
        }

        default:{
            require_once('../views/customer/list.php');
            break;
        }
    }
?>