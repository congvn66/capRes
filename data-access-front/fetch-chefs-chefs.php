<?php
    include 'db-connect-front.php';

    // Fetch all chefs
    $chefsChefs = $db->getAllData('chef');
?>
