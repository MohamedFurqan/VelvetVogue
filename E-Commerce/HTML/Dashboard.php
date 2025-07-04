<?php
    include("../PHP/Functions.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../CSS/Dashboard.css">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <link rel="icon" type="png" href="/E-Commerce/Images/Final-Logo.png">
</head>
<body>
    <Header>
            <nav>
                <div class="logo-div">
                    <img src="/E-Commerce/Images/Final-Logo.png" alt="Company Logo"> <span>Velvet Vogue</span>
                </div>

                <div class="nav-tabs">
                    <a href="#">Products Category <img src="/E-Commerce/Images/Drop Down.png" class="dropbutton" ></a>

                    <div class="dropdown-content">
                        <a href="/E-Commerce/HTML/Men's page.php">Men's Wear</a>
                        <a href="../HTML/Women's page.php">Women's Wear</a>
                    </div>


                    <a href="/E-Commerce/HTML/About us.php">About Page</a>
                    <a href="#" id="logoutLink">Log out</a>

                    <!-- Javascript code for log out link -->
                    <script>
                        document.getElementById('logoutLink').addEventListener('click', function(event) {
                            event.preventDefault(); 

                            const confirmLogout = confirm('Are you sure you want to log out?');

                            if (confirmLogout) {
                                window.location.href = '../HTML/Login.php';
                            }
                        });
                     </script>
                     <!-- Javascript code for log out link END -->

                    <div class="nav-icons">
                        <div class="CS">
                            <img src="/E-Commerce/Images/support customer.png">
                        </div>

                        <div class="shopping-cart">
                            <img src="/E-Commerce/Images/shopping_cart_icon.png">
                        </div>
                    </div>
                </div>
            </nav>
    </Header>


    <section class="user-reg">

        <form action="../PHP/Verify_Login.php" method="POST">
            <div class="login-page">
                <div class="heading">
                    <span>Register</span>
                </div>

                <div class="inputs">
                    <input type="text" name="Username" id="Username" placeholder="Username" required>

                    <input type="email" name="Email" id="Email" placeholder="Email" required>

                    <input type="number" name="Contact" id="Contact" placeholder="Phone Number" required>

                    <input type="password" name="Password" id="Password" placeholder="Password" required>

                    <input type="password" name="CPassword" id="CPassword" placeholder="Confirm Password" required>
                </div>

                <div class="show-pass">
                    <input type="checkbox" name="ShowPass" id="ShowPass">
                    <label for="ShowPass">Show Password</label>


                    <!-- JavaScript code to show/hide password -->
                    <script>
                        const passwordinput = document.getElementById('Password');
                        const cpasswordinput = document.getElementById('CPassword');
                        const showPassword = document.getElementById('ShowPass');

                        showPassword.addEventListener('change', function() {
                            if (this.checked) {
                                passwordinput.type = 'text';
                                cpasswordinput.type = 'text';
                            } else {
                                passwordinput.type = 'password';
                                cpasswordinput.type = 'password';
                            }
                        });
                    </script>
                    <!-- JavaScript Code END -->
                </div>

                <div class="gender-opt">
                    <label>
                    <input type="radio" name="ac-type" value="User"> User
                    </label>
                    
                    <label>
                        <input type="radio" name="ac-type" value="Admin"> Admin
                    </label>
                </div>

                <div class="btn">
                    <input type="submit" name="dash_register_btn" value="Register">
                </div>
            </div>
        </form>

        <div class="products view-all-users">
            <div class="products-header">
                <span>Users</span>
            </div>

            <div class="products-body">
                <table class="product-table user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        $category = getusersbyid("users");

                        if (mysqli_num_rows($category) > 0) {
                            foreach($category as $item) 
                            {  
                                ?>
                                    <tr>
                                        <td><?= $item['UserID'] ?></td>

                                        <td><?= $item['Username'] ?></td>

                                        <td><?= $item['Email'] ?></td>

                                        <td><?= $item['Contact'] ?></td>

                                        <td class="btn"><a href="../PHP/Edit-user.php?UserID=<?= $item['UserID'] ?>" class="edit-btn">Edit</a>

                                             <form action="../PHP/Verify_Login.php" method="POST">
                                                <input type="hidden" name="user_id"  value="<?= $item['UserID'] ?>">

                                                <button type="submit" class="Delete-btn" name="Delete-user-btn">Delete</button>
                                             </form>
                                        </td>

                                    </tr>
                                <?php
                            }
                        }
                        else {                                      
                            echo "No Records Found";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="product-reg">
        
        <h2>Product Registration</h2>
        
        <form action="../PHP/Product-reg.php" method="POST" enctype="multipart/form-data">
            <div class="product-form">
                <div class="heading">
                    <span>Register a Product</span>
                </div>

                <div class="inputs">
                    <label for="Image">Product Image:</label>
                    <input type="file" name="Image" id="Image" required>

                    <input type="text" name="Product-Name" placeholder="Product Name" id="product-name" required>

                    <input type="text" name="Product-Dis" placeholder="Product Discryption" id="product-dis" required>

                    <input type="text" name="Price" placeholder="Price" id="price" required>

                    <input type="text" name="Availability" placeholder="Availability" id="Availability" required>

                    <input type="text" name="Gender" placeholder="Gender" id="gender">
                    <label for="Gender" id="gender-label">*Above Field Only Applies if The Product is an Assessory</label>
                </div>

                <div class="product-type">
                    <label>
                    <input type="radio" name="product-type" value="Men" required>Men's
                    </label>
                    
                    <label>
                        <input type="radio" name="product-type" value="Female">Female's
                    </label>

                    <label>
                        <input type="radio" name="product-type" value="Accessories">Accessories
                    </label>
                </div>

                <div class="btn">
                    <input type="submit" name="dash_register_product" value="Register Product">
                </div>
            </div>
        </form>
    </section>

    <section class="view-all-products">
        <div class="products">
            <div class="products-header">
                <span>Products</span>
            </div>

            <div class="products-body">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                     
                        $category = getall("products");

                        if (mysqli_num_rows($category) > 0) {
                            foreach($category as $item) 
                            {  
                                ?>
                                    <tr>
                                        <td><?= $item['Product_ID'] ?></td>

                                        <td><?= $item['Name'] ?></td>

                                        <td><img src="../Product-img/<?= $item['Image'] ?>" width="90rem" alt="<?= $item['Name'] ?>"></td>

                                        <td><?= $item['Availability'] ?></td>

                                        <td class="btn"><a href="../PHP/Edit-product.php?Product_ID=<?= $item['Product_ID'] ?>" class="edit-btn">Edit</a>

                                             <form action="../PHP/Product-reg.php" method="POST">
                                                 <input type="hidden" name="product_id"  value="<?= $item['Product_ID'] ?>">

                                                <button type="submit" class="Delete-btn" name="Delete-btn">Delete</button>
                                             </form>
                                        </td>

                                    </tr>
                                <?php
                            }
                        }
                        else {                                      
                            echo "No Records Found";
                        }
                        
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    
</body>
</html>