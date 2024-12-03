<?php
    require_once '../models/IngredientModel.php';
    require_once '../models/FoodModel.php';

    $ingredientModel = new IngredientModel();
    $foodModel = new FoodModel();
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-ingredient'])){
                $ingredient_name = $_POST['ingredient_name'];
                $description = $_POST['description'];

                if($ingredientModel->insertDataIngredient($ingredient_name, $description)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/ingredient/add-ingredient.php');
            break;
        }
        case 'edit':{
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $ingredientModel->getIngredientsFromID($id);
                $dataOfFoods = [];
                $dataOfFoods = $foodModel->getAllFoods();

                if(isset($_POST['edit-ingredient'])) {
                    $ingredient_name = $_POST['ingredient_name'];
                    $description = $_POST['description'];
                    $food_id = $_POST['food_id'];

                    if($ingredientModel->updateIngredients($id, $ingredient_name, $description, $food_id)){
                        header('location: index.php?controller=ingredient&action=list');
                    }
                }
            }
            require_once('../views/ingredient/edit-ingredient.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];;

                if($ingredientModel->deleteIngredient($id)) {
                    header('location: index.php?controller=ingredient&action=list');
                }
            } else {
                header('location: index.php?controller=ingredient&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $ingredientModel->getAllIngredients();
            require_once('../views/ingredient/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['name'])) {
                $key = $_GET['name'];
                
                $dataSearch = [];
                $dataSearch = $ingredientModel->searchForIngredient($key);
            }
            require_once('../views/ingredient/search-ingredient.php');
            break;
        }

        default:{
            require_once('../views/ingredient/list.php');
            break;
        }
    }
?>