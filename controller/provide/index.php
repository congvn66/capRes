<?php
    require_once '../models/ProvideModel.php';
    require_once '../models/SupplierModel.php';
    require_once '../models/IngredientModel.php';

    $provideModel = new ProvideModel();
    $supplierModel = new SupplierModel();
    $ingredientModel = new IngredientModel();
    
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            $dataOfSuppliers = [];
            $dataOfSuppliers = $supplierModel->getAllSuppliers();
            $dataOfIngredients = [];
            $dataOfIngredients = $ingredientModel->getAllIngredients();
            if(isset($_POST['add-provide'])){
                $supplier_id = $_POST['supplier_id'];
                $ingredient_id = $_POST['ingredient_id'];
                //$phone = $_POST['phone'];

                if($provideModel->insertDataProvide($supplier_id, $ingredient_id)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/provide/add-provide.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $provideModel->getProvideFromID($id);
                $dataOfSuppliers = [];
                $dataOfSuppliers = $supplierModel->getAllSuppliers();
                $dataOfIngredients = [];
                $dataOfIngredients = $ingredientModel->getAllIngredients();

                if(isset($_POST['edit-provide'])) {
                    $supplier_id = $_POST['supplier_id'];
                    $ingredient_id = $_POST['ingredient_id'];

                    if($provideModel->updateProvides($id, $supplier_id, $ingredient_id)){
                        header('location: index.php?controller=provide&action=list');
                    }
                }
            }
            require_once('../views/provide/edit-provide.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];;

                if($provideModel->deleteProvide($id)) {
                    header('location: index.php?controller=provide&action=list');
                }
            } else {
                header('location: index.php?controller=provide&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $provideModel->getAllProvides();
            require_once('../views/provide/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                
                $dataSearch = [];
                $dataSearch = $provideModel->searchForProvide($key);
            }
            require_once('../views/provide/search-provide.php');
            break;
        }

        default:{
            require_once('../views/provide/list.php');
            break;
        }
    }
?>