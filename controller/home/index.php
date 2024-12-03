<?php
    require_once '../models/BaseModel.php';

    $baseModel = new BaseModel();

    if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    switch($action) {
        default:{
            $admin = $baseModel->cntTblRow('admin');
            $food = $baseModel->cntTblRow('food');
            $chef = $baseModel->cntTblRow('chef');
            $order = $baseModel->cntTblRow('orders');
            $customer = $baseModel->cntTblRow('customer');
            $diningtbl = $baseModel->cntTblRow('diningtable');
            $provide = $baseModel->cntTblRow('provides');
            $supplier = $baseModel->cntTblRow('supplier');
            $waiter = $baseModel->cntTblRow('waiter');
            $ingredient = $baseModel->cntTblRow('ingredient');
            $account = $baseModel->cntTblRow('account');
            require_once('../views/home/dashboard.php');
            break;
        }
    }
?>