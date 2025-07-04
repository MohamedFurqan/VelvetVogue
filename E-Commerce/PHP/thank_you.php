<?php
include("../PHP/Functions.php");

// Get order ID from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

// Fetch order details
$order_query = "SELECT * FROM orders WHERE order_id = ?";
$stmt = mysqli_prepare($con, $order_query);
mysqli_stmt_bind_param($stmt, "i", $order_id);
mysqli_stmt_execute($stmt);
$order = mysqli_stmt_get_result($stmt)->fetch_assoc();

// Fetch order items
$items_query = "SELECT oi.*, p.Name, p.Image 
                FROM order_items oi
                JOIN products p ON oi.product_id = p.Product_ID
                WHERE oi.order_id = ?";
$stmt_items = mysqli_prepare($con, $items_query);
mysqli_stmt_bind_param($stmt_items, "i", $order_id);
mysqli_stmt_execute($stmt_items);
$order_items = mysqli_stmt_get_result($stmt_items);

// Calculate item count and total
$item_count = mysqli_num_rows($order_items);
$order_total = $order['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | Your Store</title>
    <link rel="stylesheet" href="../CSS/thank_you.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" type="png" href="/E-Commerce/Images/Final-Logo.png">
</head>
<body>
    <div class="thank-you-container">
        <div class="confirmation-box">
            <div class="confirmation-header">
                <i class="fas fa-check-circle"></i>
                <h1>Thank You for Your Order!</h1>
                <p>Your order #<?= $order_id ?> has been placed successfully.</p>
            </div>

            <div class="order-details">
                <div class="detail-row">
                    <span>Order Number:</span>
                    <strong>#<?= $order_id ?></strong>
                </div>
                <div class="detail-row">
                    <span>Date:</span>
                    <strong><?= date('F j, Y', strtotime($order['created_at'])) ?></strong>
                </div>
                <div class="detail-row">
                    <span>Total:</span>
                    <strong>$<?= number_format($order_total, 2) ?></strong>
                </div>
                <div class="detail-row">
                    <span>Payment Method:</span>
                    <strong>
                        <?= ucfirst($order['payment_method']) ?>
                        <?php if ($order['payment_method'] === 'credit_card'): ?>
                            (•••• •••• •••• 4242)
                        <?php endif; ?>
                    </strong>
                </div>
            </div>

            <div class="shipping-info">
                <h2><i class="fas fa-truck"></i> Shipping Information</h2>
                <p><?= htmlspecialchars($order['customer_name']) ?></p>
                <p><?= htmlspecialchars($order['address']) ?></p>
                <p><?= htmlspecialchars($order['city']) ?>, <?= htmlspecialchars($order['zip']) ?></p>
            </div>

            <div class="order-items">
                <h2><i class="fas fa-receipt"></i> Order Summary (<?= $item_count ?> item<?= $item_count !== 1 ? 's' : '' ?>)</h2>
                <?php while ($item = mysqli_fetch_assoc($order_items)): ?>
                    <div class="order-item">
                        <img src="../Product-img/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>">
                        <div class="item-info">
                            <h3><?= $item['Name'] ?></h3>
                            <p>Quantity: <?= $item['quantity'] ?></p>
                        </div>
                        <div class="item-price">$<?= number_format($item['price'] * $item['quantity'], 2) ?></div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="order-totals">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span>$<?= number_format($order_total - 5.99, 2) ?></span>
                </div>
                <div class="total-row">
                    <span>Shipping:</span>
                    <span>$5.99</span>
                </div>
                <div class="total-row grand-total">
                    <span>Total:</span>
                    <span>$<?= number_format($order_total, 2) ?></span>
                </div>
            </div>

            <div class="action-buttons">
                <a href="../HTML/Men's page.php" class="continue-shopping">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
                <a href="#>" class="track-order">
                    <i class="fas fa-map-marker-alt"></i> Track Your Order
                </a>
            </div>
        </div>
    </div>
</body>
</html>