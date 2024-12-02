<?php
    require_once '../models/TableModel.php';

    $tableModel = new TableModel();
    
    
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch($action) {
        case 'add':{
            if(isset($_POST['add-table'])){
                $table_number = $_POST['table_number'];
                $capacity = $_POST['capacity'];
                //$password = $_POST['password'];

                if($tableModel->insertDataTable($table_number, $capacity)) {
                    $success[] = 'add-success';
                }
            }
            require_once('../views/table/add-table.php');
            break;
        }
        case 'edit':{
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $dataOnId = [];
                $dataOnId = $tableModel->getTableFromID($id);

                if(isset($_POST['edit-table'])) {
                    $table_number = $_POST['table_number'];
                    $capacity = $_POST['capacity'];
                    $status = $_POST['status'];

                    if($tableModel->updateDataTable($id, $table_number, $capacity, $status)){
                        header('location: index.php?controller=table&action=list');
                    }
                }
            }
            require_once('../views/table/edit-table.php');
            break;
        }
        case 'delete':{
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if($tableModel->deleteDinningTable($id)) {
                    header('location: index.php?controller=table&action=list');
                }
            } else {
                header('location: index.php?controller=table&action=list');
            }
            break;
        }

        case 'list':{
            $data = [];
            $data = $tableModel->getAllDinningTables();
            require_once('../views/table/list.php');
            break;  
        }
        
        case 'search':{
            if (isset($_GET['number'])) {
                $key = $_GET['number'];
                
                $dataSearch = [];
                $dataSearch = $tableModel->searchForTable($key);
            }
            require_once('../views/table/search-table.php');
            break;
        }

        default:{
            require_once('../views/table/list.php');
            break;
        }
    }
?>