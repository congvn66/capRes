<?php
    //include "models/configDB.php";
    
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            $tbl = "chef";
            $dataOfChefs = [];
            $dataOfChefs = $db->getAllData($tbl);
            if(isset($_POST['add-food'])){
                $title = $_POST['food_name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $chef = $_POST['chef'];
                //$chefId = $chef['chef_id'];
                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "") {
                        $ext_array = explode('.', $image_name);
                        $ext = end($ext_array);
                        $image_name = "food_".rand(0000,9999).'.'.$ext;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . "/capy-restaurant/images/food/" . $image_name;
    
                        $upload = move_uploaded_file($source_path, $destination_path);
    
                        if (!$upload) {
                            echo "<p style='color: red;'>Failed to upload image.</p>";
                            echo "\n";
                            echo $destination_path;
                            error_log("Failed to move uploaded file to {$destination_path}");
                        }
                    }
                } else {
                    $image_name = "";
                }

                if($db->insertDataFood($title, $price, $chef, $image_name, $description)) {
                    $success[] = 'add-success';
                }
            }
            require_once('views/food/add-food.php');
            break;
        }
        case 'edit':{
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $db->getDataFromIdFood($id);
                $tbl = "chef";
                $dataOfChefs = [];
                $dataOfChefs = $db->getAllData($tbl);

                if(isset($_POST['edit-food'])) {
                    $food_name = $_POST['name'];
                    $price = $_POST['price'];
                    $current_image = $_POST['current_image'];
                    $description = $_POST['description'];
                    $chef = $_POST['chef'];

                    if(isset($_FILES['image']['name'])) {
                        $image_name = $_FILES['image']['name'];
                        if($image_name != "") {
                            $ext_array = explode('.', $image_name);
                            $ext = end($ext_array);
                            $image_name = "food_".rand(0000,9999).'.'.$ext;
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = $_SERVER['DOCUMENT_ROOT'] . "/capy-restaurant/images/food/" . $image_name;
        
                            $upload = move_uploaded_file($source_path, $destination_path);
        
                            if (!$upload) {
                                echo "<p style='color: red;'>Failed to upload image.</p>";
                                echo "\n";
                                echo $destination_path;
                                error_log("Failed to move uploaded file to {$destination_path}");
                            }
                            if ($current_image != "") {
                                $remove_path = $_SERVER['DOCUMENT_ROOT'] . "/capy-restaurant/images/food/" . $current_image;
                                $remove = unlink($remove_path);
                            }
                        } else {
                            $image_name = $current_image;
                        }
                    } else {
                        $image_name = $current_image;
                    }


                    if($db->updateDataFood($id, $food_name, $price, $image_name, $chef, $description)){
                        header('location: index.php?controller=food&action=list');
                    }
                }
            }
            require_once('views/food/edit-food.php');
            break;
        }
        case 'delete':{
            //require_once('views/admin/delete-admin.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                //$tbl = "chef";

                if($db->deleteFood($id)) {
                    header('location: index.php?controller=food&action=list');
                }
            } else {
                header('location: index.php?controller=food&action=list');
            }
            break;
        }

        case 'list':{
            $tbl = "food";
            $data = [];
            $data = $db->getAllData($tbl);
            require_once('views/food/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                $tbl = "food";
                
                $dataSearch = [];
                $dataSearch = $db->searchFood($tbl, $key);
            }
            require_once('views/food/search-food.php');
            break;
        }

        default:{
            require_once('views/food/list.php');
            break;
        }
    }
?>