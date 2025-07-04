<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Velvet Vogue</title>
    <link rel="stylesheet" href="../CSS/contact us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <main>
        <section class="contact-hero">
            <div class="hero-content">
                <h1>Get in Touch</h1>
                <p>We'd love to hear from you! Whether you have a question about our products, need styling advice, or want to provide feedback, our team is ready to help.</p>
            </div>
        </section>

        <section class="contact-container">
            <div class="contact-info">
                <div class="info-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Phone</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>Mon-Fri: 9am-6pm EST</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Email</h3>
                    <p>support@velvetvogue.com</p>
                    <p>Response within 24 hours</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Store Location</h3>
                    <p>245, 3 De Fonseka Pl</p>
                    <p>Colombo 00400</p>
                </div>
            </div>

            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>

        <section class="map-section">
            <h2>Visit Our Store</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31689.58922207998!2d79.85298280463542!3d6.866782800535554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bc303199601%3A0xae20e31365516d8b!2sESOFT%20Metro%20Campus%20(Head%20Office)!5e0!3m2!1sen!2slk!4v1743449184418!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
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
            <p>&copy; 2023 Velvet Vogue. All rights reserved.</p>
        </div>
    </footer>

    
</body>
</html>