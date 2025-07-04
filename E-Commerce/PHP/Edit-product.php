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
    <section class="product-reg">
        <?php

            include("../PHP/Functions.php");

            if (isset($_GET['Product_ID'])) {

                $product_id = $_GET['Product_ID'];
                $products = getbyid("products", $product_id);

                if (mysqli_num_rows($products) > 0) {
                    $dataset = mysqli_fetch_array($products)

                    ?>
                        <h2>Edit Product</h2>
                        
                        <form action="../PHP/Product-reg.php"   method="POST" enctype="multipart/form-data">
                            <div class="product-form">
                                <div class="heading">
                                    <span>Edit Product</span>
                                </div>

                                <div class="inputs">
                                    <label for="Image">Product Image:</label>
                                    <input type="file" name="Image" id="Image">
                                    <input type="hidden" name="old-image" value="<?= $dataset['Image'] ?>">
                                    <img src="../Product-img/<?= $dataset['Image'] ?>" width="70rem" alt="">

                                    <input type="text" name="Product-Name" value="<?= $dataset['Name'] ?>" placeholder="Product Name" id="product-name" required>

                                    <input type="hidden" name="Product_ID" value="<?= $dataset['Product_ID'] ?>">

                                    <input type="text" name="Product-Dis" placeholder="Product Discryption" value="<?= $dataset['Product-Dis'] ?>"id="product-dis" required>

                                    <input type="text" name="Price" value="<?= $dataset['Price'] ?>" placeholder="Price" id="price" required>

                                    <input type="text" name="Availability" value="<?= $dataset['Availability'] ?>" placeholder="Availability" id="Availability" required>

                                    <input type="text" name="Gender" placeholder="Gender" id="gender" value="<?= $dataset['Gender'] ?>"
                                    >
                                    <label for="Gender" id="gender-label">*Above Field Only Applies if The Product is an Assessory</label>
                                </div>

                                <div class="product-type">

                                    
                                        
                                    <?php if ($dataset['Category_id'] == 1): ?>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                document.querySelector('input[name="product-type"][value="Men"]').checked = true;
                                            });
                                        </script>
                                        <?php elseif ($dataset['Category_id'] == 2): ?>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.querySelector('input[name="product-type"][value="Female"]').checked = true;
                                                });
                                            </script>

                                        <?php elseif ($dataset['Category_id'] == 3): ?>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    document.querySelector('input[name="product-type"][value="Accessories"]').checked = true;
                                                });
                                            </script>
                                        <?php endif; ?>
                                
                                    

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
                                    <input type="submit" name="dash_edit_product" value="Update Product">
                                </div>
                            </div>
                        </form>
                    <?php
                }
                else {
                    echo "Product not found!";
                }
            }  
            else 
            {
                echo "Error: It seems like the product ID was not in the URL";
            }
                ?>
    </section>
</body>