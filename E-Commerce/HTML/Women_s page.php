<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Clothing</title>

    <link rel="stylesheet" href="/E-Commerce/CSS/Mens page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

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

    <section class="view-mens-products">
        <div class="price-filter">
            <h3>Filter by Price</h3>
            <form method="GET" action="">
                <div class="filter-options">
                    <select name="price_range" class="filter-select">
                        <option value="">All Prices</option>
                        <option value="0-1000">Under Rs. 1000</option>
                        <option value="1000-3000">Rs. 1000 - 3000</option>
                        <option value="3000-5000">Rs. 3000 - 5000</option>
                        <option value="5000+">Rs. 5000+</option>
                    </select>
                    <button type="submit" class="filter-btn">Apply Filter</button>
                </div>
            </form>
        </div>

        <div class="products">

            <div class="products-body">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Discription</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Order Now!</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        include("../PHP/Functions.php");

                        // Get the selected price range from the URL
                        $price_range = isset($_GET['price_range']) ? $_GET['price_range'] : '';

                        // Base query with category filter
                        $where_clause = "Category_id = 2";

                        // Add price filter if selected
                        if ($price_range) {
                            if ($price_range === '0-1000') {
                                $where_clause .= " AND Price < 1000";
                            } elseif ($price_range === '1000-3000') {
                                $where_clause .= " AND Price BETWEEN 1000 AND 3000";
                            } elseif ($price_range === '3000-5000') {
                                $where_clause .= " AND Price BETWEEN 3000 AND 5000";
                            } elseif ($price_range === '5000+') {
                                $where_clause .= " AND Price > 5000";
                            }
                        }

                        // Get filtered products
                        $category = getwomensbyid("products", $where_clause);

                        if ($category && mysqli_num_rows($category) > 0) {
                            foreach($category as $item) {  
                        ?>
                                <tr>
                                    <td><?= $item['Name'] ?></td>
                                    <td><?= $item['Product-Dis'] ?></td>
                                    <td><img src="../Product-img/<?= $item['Image'] ?>" width="90rem" alt="<?= $item['Name'] ?>"></td>
                                    <td><?= $item['Availability'] ?></td>
                                    <td>Rs. <?= $item['Price'] ?></td>
                                    <td class="btn">
                                        <form action="../PHP/cart_handler.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $item['Product_ID'] ?>">
                                            <button type="submit" class="order-btn" name="Add-to-cart-btn">Add to Cart!</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No products found matching your criteria.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

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




    <script src="/E-Commerce/JavaScript/Home.js"></script>
</body>
</html>