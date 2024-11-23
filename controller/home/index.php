<?php
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    switch($action) {
        default:{
            $admin = $db->cntTblRow('admin');
            $food = $db->cntTblRow('food');
            $chef = $db->cntTblRow('chef');
            $order = $db->cntTblRow('orders');
            require_once('../views/home/dashboard.php');
            break;
        }
    }
?>