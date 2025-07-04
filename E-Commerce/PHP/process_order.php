<?php
include("../PHP/Connection.php");

// Validate form data
$required_fields = ['name', 'email', 'address', 'city', 'zip', 'payment_method'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        die("Error: Missing required field '$field'");
    }
}

// Sanitize inputs
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$zip = mysqli_real_escape_string($con, $_POST['zip']);
$payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
$total = floatval($_POST['cart_total']);

// Start transaction
mysqli_begin_transaction($con);

try {
    // 1. Insert order
    $order_query = "INSERT INTO orders (customer_name, email, address, city, zip, payment_method, total, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, 'processing')";
    $stmt = mysqli_prepare($con, $order_query);
    mysqli_stmt_bind_param($stmt, "ssssssd", $name, $email, $address, $city, $zip, $payment_method, $total);
    mysqli_stmt_execute($stmt);
    $order_id = mysqli_insert_id($con);

    // 2. Insert order items
    $cart_query = "SELECT c.Product_ID, c.Product_qty, p.Price 
                   FROM cart c
                   JOIN products p ON c.Product_ID = p.Product_ID";
    $cart_items = mysqli_query($con, $cart_query);

    $order_items_query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt_items = mysqli_prepare($con, $order_items_query);

    while ($item = mysqli_fetch_assoc($cart_items)) {
        mysqli_stmt_bind_param($stmt_items, "iiid", $order_id, $item['Product_ID'], $item['Product_qty'], $item['Price']);
        mysqli_stmt_execute($stmt_items);
    }

    // 3. Clear cart
    mysqli_query($con, "DELETE FROM cart");

    // Commit transaction
    mysqli_commit($con);

    echo "<script>
    window.location.href = '../PHP/thank_you.php?order_id=$order_id';
    </script>";

    // // Redirect to thank you page
    // header("Location: ../HTML/thank_you.php?order_id=$order_id");
    exit();

} catch (Exception $e) {
    // Rollback on error
    mysqli_rollback($con);
    die("Error processing order: " . $e->getMessage());
}
?>