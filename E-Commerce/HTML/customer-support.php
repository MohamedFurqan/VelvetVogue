<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support - Velvet Vogue</title>
    <link rel="stylesheet" href="../CSS/customer-support.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="png" href="../Images/Final-Logo.png">
</head>
<body>
    <header>
        <nav>
            <div class="logo-div">
                <a href="../Index.php/"><img src="../Images/Final-Logo.png" alt="Company Logo"></a> 
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

    <main class="support-container">
        <section class="support-hero">
            <h1>How Can We Help You?</h1>
            <p>We're here to assist you with any questions or concerns about our products and services.</p>
            <div class="search-container">
                <input type="text" placeholder="Search help articles...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </section>

        <section class="support-options">
            <div class="option-card">
                <div class="icon-circle">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h3>Order Assistance</h3>
                <p>Track your order, request a return, or get help with your purchase.</p>
                <a href="#" class="support-link">Get Help <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="option-card">
                <div class="icon-circle">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h3>Returns & Exchanges</h3>
                <p>Learn about our return policy or start a return process.</p>
                <a href="#" class="support-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="option-card">
                <div class="icon-circle">
                    <i class="fas fa-truck"></i>
                </div>
                <h3>Shipping Info</h3>
                <p>Find shipping rates, delivery times, and tracking information.</p>
                <a href="#" class="support-link">View Details <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="option-card">
                <div class="icon-circle">
                    <i class="fas fa-tshirt"></i>
                </div>
                <h3>Product Questions</h3>
                <p>Get information about sizing, materials, and care instructions.</p>
                <a href="#" class="support-link">Find Answers <i class="fas fa-arrow-right"></i></a>
            </div>
        </section>

        <section class="contact-section">
            <div class="contact-info">
                <h2>Contact Our Support Team</h2>
                <p>Can't find what you're looking for? Our customer service team is available to help.</p>
                
                <div class="contact-method">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 (800) 123-4567</p>
                        <p class="hours">Monday-Friday, 9am-6pm EST</p>
                    </div>
                </div>

                <div class="contact-method">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>support@velvetvogue.com</p>
                        <p class="hours">Typically respond within 24 hours</p>
                    </div>
                </div>

                <div class="contact-method">
                    <i class="fas fa-comment-dots"></i>
                    <div>
                        <h3>Live Chat</h3>
                        <p>Available during business hours</p>
                        <button class="chat-btn">Start Chat</button>
                    </div>
                </div>
            </div>

            <div class="faq-section">
                <h2>Frequently Asked Questions</h2>
                
                <div class="faq-item">
                    <button class="faq-question">
                        What is your return policy?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>We accept returns within 30 days of purchase. Items must be unworn, unwashed, and with original tags attached. Sale items are final sale and cannot be returned.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How long does shipping take?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Standard shipping typically takes 3-5 business days within the continental US. Expedited shipping options are available at checkout for faster delivery.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Do you offer international shipping?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Yes, we ship to most countries worldwide. International shipping rates and delivery times vary by destination. Additional customs fees may apply.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        How do I track my order?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Once your order has shipped, you'll receive a tracking number via email. You can track your package using the link provided or through our Order Status page.</p>
                    </div>
                </div>
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
            <p>&copy; 2025 Velvet Vogue. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const hamburger = document.getElementById('hamburger');
        const navTabs = document.getElementById('navTabs');
        
        hamburger.addEventListener('click', () => {
            navTabs.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // FAQ accordion functionality
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                // Toggle answer visibility
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                
                // Rotate icon
                icon.style.transform = icon.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
                
                // Close other open FAQs
                faqQuestions.forEach(q => {
                    if (q !== question) {
                        q.nextElementSibling.style.display = 'none';
                        q.querySelector('i').style.transform = 'rotate(0deg)';
                    }
                });
            });
        });
    </script>
</body>
</html>