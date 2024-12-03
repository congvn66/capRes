<?php
    include 'db-connect-front.php';

    if (isset($_GET['chef_id'])) {
        $chef_id_cf = $_GET['chef_id'];
        $c_name = $db->getAllDataForFrontCF($chef_id_cf);
        if ($c_name === 0) {
            header('Location: /capy-restaurant/');
        }
        $f_list = $db->searchFoodByChef($chef_id_cf);
    } else {
        header('location:'.'/capy-restaurant/');
    }
?>
