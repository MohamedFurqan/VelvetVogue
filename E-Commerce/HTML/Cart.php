<?php
include("../PHP/Connection.php"); // Include your database connection
include("../PHP/Functions.php");

// Get all cart items with product details
$cart_query = "SELECT c.Cart_ID, c.Product_ID, c.Product_qty, 
               p.Name, p.Price, p.Image, p.`Product-Dis`
               FROM cart c
               JOIN products p ON c.Product_ID = p.Product_ID";
$cart_items = mysqli_query($con, $cart_query);
$cart_count = mysqli_num_rows($cart_items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../CSS/Cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" type="png" href="/E-Commerce/Images/Final-Logo.png">
</head>
<body>
    <Header>
        <nav>
            <div class="logo-div">
            <a href="../Index.php"><img src="/E-Commerce/Images/Final-Logo.png" alt="Company Logo"></a>  <span>Velvet Vogue</span>
            </div>

            <div class="nav-tabs">
                <a href="#">Products Category <img src="/E-Commerce/Images/Drop Down.png" class="dropbutton" ></a>

                <div class="dropdown-content">
                    <a href="/E-Commerce/HTML/Men's page.php">Men's Wear</a>
                    <a href="../HTML/Women's page.php">Women's Wear</a>
                    <a href="../HTML/Accessories.php">Accessories</a>
                </div>


                <a href="/E-Commerce/HTML/About us.php">About Page</a>
                <a href="/E-Commerce/HTML/Registration.php">Registration</a>

                <div class="nav-icons">
                    <div class="CS">
                        <img src="/E-Commerce/Images/support customer.png">
                    </div>

                    <div class="shopping-cart">
                        <a href="../HTML/Cart.php"><img src="/E-Commerce/Images/shopping_cart_icon.png"></a>
                    </div>
                </div>
            </div>
        </nav>
        
    </Header>

    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
        
        <?php if($cart_count > 0): ?>
            <div class="cart-header">
                <div class="header-item">Product</div>
                <div class="header-item">Price</div>
                <div class="header-item">Quantity</div>
                <div class="header-item">Total</div>
                <div class="header-item">Action</div>
            </div>
            
            <div class="cart-items">
                <?php 
                $subtotal = 0;
                while($item = mysqli_fetch_assoc($cart_items)): 
                    $item_total = $item['Price'] * $item['Product_qty'];
                    $subtotal += $item_total;
                ?>
                    <div class="cart-item" data-cart-id="<?= $item['Cart_ID'] ?>" data-product-id="<?= $item['Product_ID'] ?>">
                        <div class="product-info">
                            <img src="../Product-img/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>" class="product-image">
                            <div class="product-details">
                                <h3 class="product-name"><?= $item['Name'] ?></h3>
                                <p class="product-description"><?= $item['Product-Dis'] ?></p>
                            </div>
                        </div>

                        <div class="product-price"><?= formatCurrency($item['Price']) ?></div>
                        
                        <div class="product-quantity">
                            <button class="quantity-btn minus-btn"><i class="fas fa-minus"></i></button>
                            <input type="number" class="quantity-input" value="<?= $item['Product_qty'] ?>" min="1">
                            <button class="quantity-btn plus-btn"><i class="fas fa-plus"></i></button>
                        </div>
                        
                        <div class="product-total"><?= formatCurrency($item_total) ?></div>
                        
                        <div class="product-actions">
                            <button class="remove-btn"><i class="fas fa-trash"></i> Remove</button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="cart-summary">
                <div class="summary-details">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span class="subtotal"><?= formatCurrency($subtotal) ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span class="shipping">$5.99</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span class="total-price"><?= formatCurrency($subtotal + 5.99) ?></span>
                    </div>
                </div>
                
                <button class="checkout-btn" name="proceed-checkout" onclick="proceedcheckout()">Proceed to Checkout</button>
            </div>
        <?php else: ?>
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Your cart is empty</p>
                <a href="../HTML/Shop.php" class="continue-shopping">Continue Shopping</a>
            </div>
        <?php endif; ?>
    </div>

   <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Velvet Vogue</h3>
                <p>Bringing you the latest fashion trends with style and elegance.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="../Index.php/">Home</a></li>
                    <li><a href="../HTML/Men's page.php">Men's Collection</a></li>
                    <li><a href="../HTML/Women's page.php">Women's Collection</a></li>
                    <li><a href="../HTML/Accessories.php">Accessories</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Customer Service</h3>
                <ul>
                    <li><a href="../HTML/Contact us.php">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Returns & Exchanges</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe to get updates on new arrivals and special offers.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Velvet Vogue. All rights reserved.</p>
        </div>
    </footer>

    <script src="../JavaScript/cart.js"></script>
    <script src="../JavaScript/Redirects.js"></script>
</body>
</html>