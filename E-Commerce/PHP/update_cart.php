<?php
include("../PHP/Connection.php"); // Include your database connection

header('Content-Type: application/json');

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id = isset($_POST['cart_id']) ? intval($_POST['cart_id']) : 0;
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    
    if ($cart_id > 0 && $product_id > 0) {
        if ($quantity > 0) {
            // Update quantity
            $update_query = "UPDATE cart SET Product_qty = ? WHERE Cart_ID = ?";
            $stmt = mysqli_prepare($con, $update_query);
            mysqli_stmt_bind_param($stmt, "ii", $quantity, $cart_id);
            
            if (mysqli_stmt_execute($stmt)) {
                $response['success'] = true;
                $response['quantity'] = $quantity;
            } else {
                $response['message'] = "Database update failed";
            }
        } else {
            // Remove item
            $delete_query = "DELETE FROM cart WHERE Cart_ID = ?";
            $stmt = mysqli_prepare($con, $delete_query);
            mysqli_stmt_bind_param($stmt, "i", $cart_id);
            
            if (mysqli_stmt_execute($stmt)) {
                $response['success'] = true;
            } else {
                $response['message'] = "Database delete failed";
            }
        }
    } else {
        $response['message'] = "Invalid cart or product ID";
    }
} else {
    $response['message'] = "Invalid request method";
}

echo json_encode($response);
?>