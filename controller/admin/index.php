<?php
    //include "models/configDB.php";
    $data = [];
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

                if($db->insertDataAdmin($full_name, $username, $password)) {
                    $success[] = 'add-success';
                }
            }
            require_once('views/admin/add-admin.php');
            break;
        }
        case 'edit':{
            require_once('views/admin/edit-admin.php');
            break;
        }
        case 'delete':{
            require_once('views/admin/delete-admin.php');
            break;
        }
        case 'list':{
            $tbl = "admin";
            $data = $db->getAllData($tbl);
            require_once('views/admin/list.php');
            break;  
        }
        default:{
            require_once('views/admin/list.php');
            break;
        }
    }
?>