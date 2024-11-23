<?php
    include 'db-connect-front.php';

    // Fetch all chefs
    $foodsFoods = $db->getAllData('food');
?>
