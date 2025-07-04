<?php
include("../PHP/Connection.php");

if(isset($_POST['Add-to-cart-btn'])) {
    $product_id = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    
    $product_query = "SELECT * FROM products WHERE Product_ID = ? AND Availability = 'Available'";
    $stmt = $con->prepare($product_query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product_result = $stmt->get_result();
    
    if($product_result->num_rows > 0) {
        $cart_query = "SELECT * FROM cart WHERE Product_ID = ?";
        $stmt = $con->prepare($cart_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $cart_result = $stmt->get_result();
        
        if($cart_result->num_rows > 0) {
            $update_query = "UPDATE cart SET Product_qty = Product_qty + 1 WHERE Product_ID = ?";
        } else {
            $update_query = "INSERT INTO cart (Product_ID, Product_qty) VALUES (?, 1)";
        }
        
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("i", $product_id);
        
        if($stmt->execute()) {
            echo "<script>
            alert('Product Added to Cart Successfully');
            window.location.href = '../HTML/Men\\'s page.php';
            </script>";
        } else {
            echo "<script>
            alert('Something Went Wrong!');
            window.location.href = '../HTML/Men\\'s page.php';
            </script>";
        }
        exit();
    } else {
        echo "<script>
        alert('Sorry this product is not available right now!');
        window.location.href = '../HTML/Men\\'s page.php';
        </script>";
        exit();
    }
}

if(isset($_POST['Add-to-cart-btn-Women'])) {
    $product_id = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    
    $product_query = "SELECT * FROM products WHERE Product_ID = ? AND Availability = 'Available'";
    $stmt = $con->prepare($product_query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product_result = $stmt->get_result();
    
    if($product_result->num_rows > 0) {
        $cart_query = "SELECT * FROM cart WHERE Product_ID = ?";
        $stmt = $con->prepare($cart_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $cart_result = $stmt->get_result();
        
        if($cart_result->num_rows > 0) {
            $update_query = "UPDATE cart SET Product_qty = Product_qty + 1 WHERE Product_ID = ?";
        } else {
            $update_query = "INSERT INTO cart (Product_ID, Product_qty) VALUES (?, 1)";
        }
        
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("i", $product_id);
        
        if($stmt->execute()) {
            echo "<script>
            alert('Product Added to Cart Successfully');
            window.location.href = '../HTML/Women\\'s page.php';
            </script>";
        } else {
            echo "<script>
            alert('Something Went Wrong!');
            window.location.href = '../HTML/Women\\'s page.php';
            </script>";
        }
        exit();
    } else {
        echo "<script>
        alert('Sorry this product is not available right now!');
        window.location.href = '../HTML/Women\\'s page.php';
        </script>";
        exit();
    }
}

if(isset($_POST['Add-to-cart-btn-Accessories'])) {
    $product_id = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    
    $product_query = "SELECT * FROM products WHERE Product_ID = ? AND Availability = 'Available'";
    $stmt = $con->prepare($product_query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product_result = $stmt->get_result();
    
    if($product_result->num_rows > 0) {
        $cart_query = "SELECT * FROM cart WHERE Product_ID = ?";
        $stmt = $con->prepare($cart_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $cart_result = $stmt->get_result();
        
        if($cart_result->num_rows > 0) {
            $update_query = "UPDATE cart SET Product_qty = Product_qty + 1 WHERE Product_ID = ?";
        } else {
            $update_query = "INSERT INTO cart (Product_ID, Product_qty) VALUES (?, 1)";
        }
        
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("i", $product_id);
        
        if($stmt->execute()) {
            echo "<script>
            alert('Product Added to Cart Successfully');
            window.location.href = '../HTML/Accessories.php';
            </script>";
        } else {
            echo "<script>
            alert('Something Went Wrong!');
            window.location.href = '../HTML/Accessories.php';
            </script>";
        }
        exit();
    } else {
        echo "<script>
        alert('Sorry this product is not available right now!');
        window.location.href = '../HTML/Accessories.php';
        </script>";
        exit();
    }
}
exit();
?>