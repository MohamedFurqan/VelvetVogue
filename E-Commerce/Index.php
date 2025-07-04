<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velvet Vogue</title>
    <link rel="stylesheet" href="/E-Commerce/CSS/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="icon" type="png" href="/E-commerce/Images/Final-Logo.png">
</head>
<body>
    <header>
        <nav>
            <div class="logo-div">
                <a href="../Index.php"><img src="/E-Commerce/Images/Final-Logo.png" alt="Company Logo"></a> 
                <span>Velvet Vogue</span>
                <div class="hamburger" id="hamburger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>

            <div class="nav-tabs" id="navTabs">
                <div class="dropdown">
                    <a href="#" class="dropdown-btn">Products Category <img src="/E-Commerce/Images/Drop Down.png" class="dropbutton"></a>
                    <div class="dropdown-content">
                        <a href="/E-Commerce/HTML/Men_s page.php">Men's Wear</a>
                        <a href="/E-Commerce//HTML/Women's page.php">Women's Wear</a>
                        <a href="/E-Commerce/HTML/Accessories.php">Accessories</a>
                    </div>
                </div>
                <a href="/E-Commerce//HTML/About us.php">About Page</a>
                <a href="/E-Commerce/HTML/Registration.php">Registration</a>
                <div class="nav-icons">
                    <div class="CS">
                        <a href="/E-Commerce//HTML/customer-support.php"><img src="/E-Commerce/Images/support customer.png" alt="Customer Support"></a>
                    </div>
                    <div class="shopping-cart">
                        <a href="/E-Commerce/HTML/Cart.php"><img src="/E-Commerce/Images/shopping_cart_icon.png" alt="Shopping Cart"></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="Hero">
        <div class="hero-body">
            <div class="hero-text">
                <span id="hero-main">Women's Collection</span>
                <span id="hero-sub">Buy the Latest men's clothing</span>
            </div>
            <div class="hero-img">
                <img src="/E-Commerce/Images/Hero mens.png" alt="Men's fashion">
            </div>
        </div>
    </section>

    <main class="product-section">
        <div class="section-header">
            <h2>Latest Arrivals</h2>
            <p>Fresh styles just added to our collection</p>
        </div>

        <div class="product-grid">
            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Men_s Outfit 1.jpeg" alt="Men's Casual Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Premium Casual Set</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Men_s Outfit 2.jpeg" alt="Men's Casual Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Premium Casual Set</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Men_s Outfit 3.jpeg" alt="Men's Casual Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Premium Casual Set</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="product-section">
        <div class="section-header">
            <h2>Hot Deals</h2>
            <p>Some of the most bestselling Products</p>
        </div>

        <div class="product-grid">
            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Women_s Outfit 1.jpeg" alt="Women's Formal Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Women's Formal Fit</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Women_s Outfit 2.jpeg" alt="Women's Casual Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Women's Casual Set</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image-container">
                    <img src="/E-Commerce/Images/Women_s Outfit 3.jpeg" alt="Men's Casual Outfit" class="product-image">
                    <div class="product-badge">New</div>
                </div>
                <div class="product-info">
                    <h3>Smart Casual Set</h3>
                    <div class="price-container">
                        <span class="current-price">$89.99</span>
                        <span class="original-price">$120.00</span>
                    </div>
                    <div class="product-actions">
                        <button class="view-btn">View Details</button>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="end-section">
        <div class="end-section-content">
            <span class="trending-text">Trending Now - Stay Ahead in Style!</span>
            <span class="discover-text">Discover what's hot and trending right now. These pieces are flying off the shelves!</span>
            <div class="end-section-btn">
                <button>Customer Support</button>
                <button>Register</button>
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
    <script src="/E-Commerce/JavaScript/functions.js"></script>
</body>
</html>