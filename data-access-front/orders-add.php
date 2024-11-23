<?php
    include 'db-connect-front.php';
    $inserted = false;
    if(isset($_POST['submit'])) {
        $fid = $_POST['fid'];
        $qty = $_POST['qty'];
        $order_date = date("Y-m-d h:i:sa");
        $status = "ordered";
        $customer_name = $_POST['full-name'];

        // for later.
        $customer_contact = $_POST['contact']; // phone
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];
        

        $customerList = $db->searchCustomerByPhone($customer_contact);
        if ($customerList == 0) {
            $customerId = $db->insertDataCustomer($customer_name, $customer_address, $customer_contact, $customer_email);
            $inserted = $db->insertDataOrder($fid, $qty, $order_date, $status, $customerId);
            header('Location: http://localhost/capy-restaurant/');
        } else {
            $customerId = $customerList[0]['customer_id'];
            $inserted = $db->insertDataOrder($fid, $qty, $order_date, $status, $customerId);
            header('Location: http://localhost/capy-restaurant/');
        }
    }
?>
