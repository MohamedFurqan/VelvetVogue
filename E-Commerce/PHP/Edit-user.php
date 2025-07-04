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

            if (isset($_GET['UserID'])) {

                $user_id = $_GET['UserID'];
                $users = getuserbyid("users", $user_id);

                if (mysqli_num_rows($users) > 0) {
                    $dataset = mysqli_fetch_array($users)

                    ?>
                        <h2>Edit User</h2>
                        
                        <form action="../PHP/Verify_Login.php" method="POST">
                            <div class="product-form">
                                <div class="heading">
                                    <span>Edit Product</span>
                                </div>

                                <div class="inputs">
                                   
                                    <input type="text" name="Username" value="<?= $dataset['Username'] ?>" placeholder="Username" id="product-name username" required>

                                    <input type="hidden" name="user_ID" value="<?= $dataset['UserID'] ?>">

                                    <input type="text" name="Email" placeholder="Email" value="<?= $dataset['Email'] ?>"id="product-dis email" required>

                                    <input type="text" name="Contact" value="<?= $dataset['Contact'] ?>" placeholder="Contact" id="price contact" required>

                                    <input type="text" name="Password" value="<?= $dataset['Password'] ?>" placeholder="Password" id="Availability password" required>
                                </div>

                                <div class="btn">
                                    <input type="submit" name="dash_edit_user" value="Update User">
                                </div>
                            </div>
                        </form>
                    <?php
                }
                else {
                    echo "User not found!";
                }
            }  
            else 
            {
                echo "Error: It seems like the product ID was not in the URL";
            }
                ?>
    </section>
</body>