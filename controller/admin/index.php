<?php
    require_once '../models/AdminModel.php';

    $adminModel = new AdminModel();
    
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-admin'])){
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                if($adminModel->insertDataAdmin($full_name, $username, $password)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/admin/add-admin.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                //$tbl = "admin";
                $dataOnId = [];
                $dataOnId = $adminModel->getAdminFromID($id);

                if(isset($_POST['edit-admin'])) {
                    $full_name = $_POST['full_name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if($adminModel->updateDataAdmin($id, $full_name, $username, $password)){
                        header('location: index.php?controller=admin&action=list');
                    }
                }
            }
            require_once('../views/admin/edit-admin.php');
            break;
        }
        case 'delete':{
            //require_once('views/admin/delete-admin.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                //$tbl = "admin";

                if($adminModel->deleteAdmin($id)) {
                    header('location: index.php?controller=admin&action=list');
                }
            } else {
                header('location: index.php?controller=admin&action=list');
            }
            break;
        }

        case 'list':{
            //$tbl = "admin";
            $data = [];
            $data = $adminModel->getAllData(AdminModel::TABLE);
            require_once('../views/admin/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                $tbl = "admin";
                
                $dataSearch = [];
                $dataSearch = $adminModel->searchAdmin($tbl, $key);
            }
            require_once('../views/admin/search-admin.php');
            break;
        }

        default:{
            require_once('../views/admin/list.php');
            break;
        }
    }
?>