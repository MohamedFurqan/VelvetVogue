<?php
include("../PHP/Connection.php");

// Registers a product
if (isset($_POST["dash_register_product"])) {
    $name = mysqli_real_escape_string($con, $_POST['Product-Name']);
    $product_Dis = mysqli_real_escape_string($con, $_POST['Product-Dis']);
    $price = floatval($_POST['Price']);
    $Availability = mysqli_real_escape_string($con, $_POST['Availability']);
    $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
    
    $productImage = $_FILES['Image']['name'];
    $path = '../Product-img/';
    $image_ext = pathinfo($productImage, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    $target_file = $path . $filename;

    if (!move_uploaded_file($_FILES['Image']['tmp_name'], $target_file)) {
        echo "<script>
        alert('File upload failed');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
        exit();
    }

    if (isset($_POST['product-type'])) {
        $selectedradio = $_POST['product-type'];
        $category_ID = 0;

        switch($selectedradio) {
            case "Men":
                $category_ID = 1;
                break;
            case "Female":
                $category_ID = 2;
                break;
            case "Accessories":
                $category_ID = 3;
                break;
            default:
                echo "<script>
                alert('Invalid product type selected');
                window.location.href = '../HTML/Dashboard.php';
                </script>";
                exit();
        }

        $stmt = $con->prepare("INSERT INTO products (Image, Name, `Product-Dis`, Price, Availability, Gender, Category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdssi", $filename, $name, $product_Dis, $price, $Availability, $Gender, $category_ID);
        
        if ($stmt->execute()) {
            echo "<script>
            alert('Product Registered Successfully');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        } else {
            unlink($target_file);
            echo "<script>
            alert('Database error: ".addslashes($stmt->error)."');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
        alert('No product type selected');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
    }
}
else if (isset($_POST["dash_edit_product"])) {
    $name = mysqli_real_escape_string($con, $_POST['Product-Name']);
    $product_Dis = mysqli_real_escape_string($con, $_POST['Product-Dis']);
    $price = floatval($_POST['Price']);
    $Availability = mysqli_real_escape_string($con, $_POST['Availability']);
    $Gender = mysqli_real_escape_string($con, $_POST['Gender']);
    $product_id = mysqli_real_escape_string($con, $_POST['Product_ID']);
    
    $old_image = $_POST["old-image"];
    $update_Image = $old_image; 

    if (!empty($_FILES['Image']['name'])) {
        $productImage = $_FILES['Image']['name'];
        $temp_name = $_FILES['Image']['tmp_name'];
        $path = '../Product-img/';
        
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($productImage, PATHINFO_EXTENSION));
        
        if (!in_array($file_extension, $allowed_types)) {
            echo "<script>
            alert('Only JPG, JPEG, PNG & GIF files are allowed');
            window.location.href = '../HTML/Dashboard.php?Product_ID=$product_id';
            </script>";
            exit();
        }
        
        $update_Image = time().'_'.uniqid().'.'.$file_extension;
        
        if (move_uploaded_file($temp_name, $path.$update_Image)) {
            if (!empty($old_image) && file_exists($path.$old_image) && $old_image != $update_Image) {
                unlink($path.$old_image);
            }
        } else {
            echo "<script>
            alert('Failed to upload image');
            window.location.href = '../HTML/Dashboard.php?Product_ID=$product_id';
            </script>";
            exit();
        }
    }

    if (!isset($_POST['product-type'])) {
        echo "<script>
        alert('Please select a product type');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
        exit();
    }

    $selectedradio = $_POST['product-type'];
    $category_ID = 0;

    switch($selectedradio) {
        case "Men":
            $category_ID = 1;
            break;
        case "Female":
            $category_ID = 2;
            break;
        case "Accessories":
            $category_ID = 3;
            break;
        default:
            echo "<script>
            alert('Invalid product type selected');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
            exit();
    }

    $update_code = "UPDATE products SET 
        Image = '$update_Image', 
        Name = '$name', 
        `Product-Dis` = '$product_Dis', 
        Price = '$price', 
        Availability = '$Availability', 
        Gender = '$Gender', 
        Category_id = '$category_ID' 
        WHERE Product_ID = '$product_id'";

    $result = mysqli_query($con, $update_code);

    if ($result) {
        echo "<script>
        alert('Product updated successfully');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
    } else {
        if (isset($productImage) && $update_Image != $old_image && file_exists($path.$update_Image)) {
            unlink($path.$update_Image);
        }
        
        echo "<script>
        alert('Error updating product: ".mysqli_error($con)."');
        window.location.href = '../HTML/Dashboard.php?Product_ID=$product_id';
        </script>";
    }
}
else if (isset($_POST['Delete-btn'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $select_image = "SELECT * FROM products WHERE Product_ID = '$product_id'";
    $select_image_run = mysqli_query($con, $select_image);
    $Image_data = mysqli_fetch_array($select_image_run);
    $image = $Image_data['Image'];

    $delete = "DELETE FROM products WHERE Product_ID = '$product_id'";
    $result = mysqli_query($con, $delete);

    if ($result) {
        if (file_exists("../Product-img/".$image)) {
            unlink("../Product-img/".$image);
        }

        echo "<script>
        alert('Product Deleted successfully');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Something went wrong!');
        window.location.href = '../HTML/Dashboard.php';
        </script>";
    }

}
?>