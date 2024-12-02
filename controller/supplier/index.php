<?php
    require_once '../models/SupplierModel.php';
    require_once '../models/ChefModel.php';

    $supplierModel = new SupplierModel();
    $chefModel = new ChefModel();
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-supplier'])){
                $supplier_city = $_POST['supplier_city'];
                $supplier_name = $_POST['supplier_name'];
                $phone = $_POST['phone'];

                if($supplierModel->insertDataSupplier($supplier_city, $supplier_name, $phone)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/supplier/add-supplier.php');
            break;
        }
        case 'edit':{
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $supplierModel->getSuppliersFromID($id);
                $dataOfChefs = [];
                $dataOfChefs = $chefModel->getAllChefs();

                if(isset($_POST['edit-supplier'])) {
                    $supplier_city = $_POST['supplier_city'];
                    $supplier_name = $_POST['supplier_name'];
                    $phone = $_POST['phone'];
                    $chef_id = $_POST['chef_id'];

                    if($supplierModel->updateSuppliers($id, $supplier_city, $supplier_name, $phone, $chef_id)){
                        header('location: index.php?controller=supplier&action=list');
                    }
                }
            }
            require_once('../views/supplier/edit-supplier.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];;

                if($supplierModel->deleteSupplier($id)) {
                    header('location: index.php?controller=supplier&action=list');
                }
            } else {
                header('location: index.php?controller=supplier&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $supplierModel->getAllSuppliers();
            require_once('../views/supplier/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                
                $dataSearch = [];
                $dataSearch = $supplierModel->searchForSupplier($key);
            }
            require_once('../views/supplier/search-supplier.php');
            break;
        }

        default:{
            require_once('../views/supplier/list.php');
            break;
        }
    }
?>