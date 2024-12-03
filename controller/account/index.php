<?php
    require_once '../models/AccountModel.php';
    require_once '../models/CustomerModel.php';

    $customerModel = new CustomerModel();
    $accountModel = new AccountModel();

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            $dataOfCustomers = [];
            $dataOfCustomers = $customerModel->getAllCustomers();

            if(isset($_POST['add-account'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $customer_id = $_POST['customer_id'];

                if($accountModel->insertDataAccount($username, $password, $customer_id)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/account/add-account.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $accountModel->getAccountsFromID($id);
                $dataOfCustomers = [];
                $dataOfCustomers = $customerModel->getAllCustomers();

                if(isset($_POST['edit-account'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $customer_id = $_POST['customer_id'];

                    if($accountModel->updateAccounts($id, $username, $password, $customer_id)){
                        header('location: index.php?controller=account&action=list');
                    }
                }
            }
            require_once('../views/account/edit-account.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];;

                if($accountModel->deleteAccount($id)) {
                    header('location: index.php?controller=account&action=list');
                }
            } else {
                header('location: index.php?controller=account&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $accountModel->getAllAccounts();
            require_once('../views/account/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                
                $dataSearch = [];
                $dataSearch = $accountModel->searchForAccount($key);
            }
            require_once('../views/account/search-account.php');
            break;
        }

        default:{
            require_once('../views/account/list.php');
            break;
        }
    }
?>