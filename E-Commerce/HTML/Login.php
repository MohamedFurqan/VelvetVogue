<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Velvet Vogue</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="icon" type="png" href="../Images/Final-Logo.png">
</head>
<body>
    <header>
        <nav>
            <div class="logo-div">
                <a href="../Index.php"><img src="../Images/Final-Logo.png" alt="Company Logo"></a> 
                <span>Velvet Vogue</span>
                <div class="hamburger" id="hamburger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>

            <div class="nav-tabs" id="navTabs">
                <div class="dropdown">
                    <a href="#" class="dropdown-btn">Products Category <img src="../Images/Drop Down.png" class="dropbutton"></a>
                    <div class="dropdown-content">
                        <a href="../HTML/Men's page.php">Men's Wear</a>
                        <a href="../HTML/Women's page.php">Women's Wear</a>
                        <a href="../HTML/Accessories.php">Accessories</a>
                    </div>
                </div>
                <a href="../HTML/About us.php">About Page</a>
                <a href="../HTML/Registration.php">Registration</a>
                <div class="nav-icons">
                    <div class="CS">
                        <img src="../Images/support customer.png" alt="Customer Support">
                    </div>
                    <div class="shopping-cart">
                        <a href="../HTML/Cart.php"><img src="../Images/shopping_cart_icon.png" alt="Shopping Cart"></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="login-main">
        <form action="../PHP/Verify_Login.php" method="POST" class="login-form">
            <h1>Welcome Back!</h1>
            <p>Sign in to access your account and continue your fashion journey with us.</p>
            
            <div class="form-group">
                <input type="text" name="Username" id="Username" placeholder="Username" required>
                <i class="fas fa-user"></i>
            </div>
            
            <div class="form-group">
                <input type="password" name="Password" id="Password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>
            
            <div class="show-pass">
                <input type="checkbox" name="ShowPass" id="ShowPass">
                <label for="ShowPass">Show Password</label>
            </div>
            
            <div class="form-actions">
                <input type="submit" value="Login" name="Login_btn" class="login-btn">
                <input type="button" value="Or Register" onclick="redirectToRegistration()" class="register-btn">
            </div>
        </form>
    </main>

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

    <script>
        // JavaScript code to show/hide password - kept exactly the same
        const passwordinput = document.getElementById('Password');
        const showPassword = document.getElementById('ShowPass');

        showPassword.addEventListener('change', function() {
            if (this.checked) {
                passwordinput.type = 'text';
            } else {
                passwordinput.type = 'password';
            }
        });
    </script>
    <script src="../JavaScript/Home.js"></script>
    <script src="../JavaScript/Redirects.js"></script>
</body>
</html>