<?php
     if (isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    switch($action) {
        default:{
            require_once('views/home/dashboard.php');
            break;
        }
    }
?>