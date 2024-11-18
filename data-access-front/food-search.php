<?php
    include 'db-connect-front.php';

    $searchKey = $_POST['search'];

    $searches = $db->searchFood('food', $searchKey);
?>
