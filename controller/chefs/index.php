<?php
    //include "models/configDB.php";
    
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-chef'])){
                $chef_name = $_POST['chef_name'];
                $salary = $_POST['salary'];
                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];
                    $ext_array = explode('.', $image_name);
                    $ext = end($ext_array);
                    $image_name = "chef_".rand(000,999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = $_SERVER['DOCUMENT_ROOT'] . "/capy-restaurant/images/chef/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        echo "<p style='color: red;'>Failed to upload image.</p>";
                        echo "\n";
                        echo $destination_path;
                        error_log("Failed to move uploaded file to {$destination_path}");
                    }
                    
                } else {
                    $image_name = "";
                }

                if($db->insertDataChef($chef_name, $salary, $image_name)) {
                    $success[] = 'add-success';
                }
            }
            require_once('views/chefs/add-chef.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $tbl = "chef";
                $dataOnId = [];
                $dataOnId = $db->getDataFromID($tbl, $id);

                if(isset($_POST['edit-chef'])) {
                    $chef_name = $_POST['chef_name'];
                    $salary = $_POST['salary'];

                    if($db->updateDataChef($id, $chef_name, $salary)){
                        header('location: index.php?controller=chef&action=list');
                    }
                }
            }
            require_once('views/chefs/edit-chef.php');
            break;
        }
        case 'delete':{
            //require_once('views/admin/delete-admin.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tbl = "chef";

                if($db->delete($id, $tbl)) {
                    header('location: index.php?controller=chef&action=list');
                }
            } else {
                header('location: index.php?controller=chef&action=list');
            }
            break;
        }

        case 'list':{
            $tbl = "chef";
            $data = [];
            $data = $db->getAllData($tbl);
            require_once('views/chefs/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                $tbl = "chef";
                
                $dataSearch = [];
                $dataSearch = $db->searchChef($tbl, $key);
            }
            require_once('views/chefs/search-chef.php');
            break;
        }

        default:{
            require_once('views/chefs/list.php');
            break;
        }
    }
?>