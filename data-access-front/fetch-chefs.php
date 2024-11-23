<?php
    include 'db-connect-front.php';

    // Fetch all chefs
    $chefs = $db->getAllDataForFrontChef('chef');
?>
