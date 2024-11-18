<?php
    include 'db-connect-front.php';

    // Fetch all chefs
    $foods = $db->getAllDataForFrontFood('food');
?>
