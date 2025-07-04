<?php
include("../PHP/Functions.php");

// Verify cart exists (non-session version)
$cart_query = "SELECT c.*, p.Name, p.Price, p.Image 
               FROM cart c
               JOIN products p ON c.Product_ID = p.Product_ID";
$cart_items = mysqli_query($con, $cart_query);
$cart_count = mysqli_num_rows($cart_items);

if ($cart_count == 0) {
    header("Location: cart.php");
    exit();
}

// Calculate totals
$subtotal = 0;
while ($item = mysqli_fetch_assoc($cart_items)) {
    $subtotal += $item['Price'] * $item['Product_qty'];
}
$shipping = 5.99;
$total = $subtotal + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Velvet Vogue</title>
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" type="png" href="/E-Commerce/Images/Final-Logo.png">
</head>
<body>
    <div class="checkout-container">
        <div class="checkout-header">
            <h1><i class="fas fa-lock"></i> Secure Checkout</h1>
        </div>

        <div class="checkout-grid">
            <!-- Left Column: Shipping/Payment -->
            <div class="checkout-form">
                <form action="../PHP/process_order.php" method="POST" id="checkout-form">
                    <h2><i class="fas fa-truck"></i> Shipping Information</h2>
                    <div class="form-group">
                        <label for="name">Full Name*</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address*</label>
                        <textarea id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City*</label>
                            <input type="text" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">ZIP Code*</label>
                            <input type="text" id="zip" name="zip" required>
                        </div>
                    </div>

                    <h2><i class="fas fa-credit-card"></i> Payment Method</h2>
                    <div class="payment-methods">
                        <label class="payment-method">
                            <input type="radio" name="payment_method" value="credit_card" checked>
                            <i class="far fa-credit-card"></i> Credit Card
                        </label>
                        <label class="payment-method">
                            <input type="radio" name="payment_method" value="paypal">
                            <i class="fab fa-paypal"></i> PayPal
                        </label>
                    </div>

                    <div id="credit-card-fields">
                        <div class="form-group">
                            <label for="card_number">Card Number*</label>
                            <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="expiry">Expiry Date*</label>
                                <input type="text" id="expiry" name="expiry" placeholder="MM/YY">
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV*</label>
                                <input type="text" id="cvv" name="cvv" placeholder="123">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="cart_total" value="<?= $total ?>">
                    <button type="submit" class="place-order-btn">Place Order</button>
                </form>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="order-summary">
                <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                <div class="order-items">
                    <?php 
                    mysqli_data_seek($cart_items, 0); // Reset pointer to re-fetch items
                    while ($item = mysqli_fetch_assoc($cart_items)): 
                    ?>
                        <div class="order-item">
                            <img src="../Product-img/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>">
                            <div class="item-details">
                                <h4><?= $item['Name'] ?></h4>
                                <p><?= $item['Product_qty'] ?> × $<?= number_format($item['Price'], 2) ?></p>
                            </div>
                            <div class="item-total">$<?= number_format($item['Price'] * $item['Product_qty'], 2) ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="order-totals">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span>$<?= number_format($subtotal, 2) ?></span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>$<?= number_format($shipping, 2) ?></span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Total:</span>
                        <span>$<?= number_format($total, 2) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../JavaScript/checkout.js"></script>
</body>
</html>