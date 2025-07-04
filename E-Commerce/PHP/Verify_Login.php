<?php
    // Connection
    include("../PHP/Connection.php");

    // Login
    if (isset($_POST['Login_btn'])) {
        
        $username = mysqli_real_escape_string($con, $_POST['Username']);
        $password = mysqli_real_escape_string($con, $_POST['Password']);

        $Login_admin = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
        $result = mysqli_query($con, $Login_admin);

        if (mysqli_num_rows($result) > 0) { 
            
            echo "<script>
            alert('Login Successful, Welcome $username');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        }
        else
        {
            $Login_user = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
            $result = mysqli_query($con, $Login_user);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>
                alert('Login Successful, Welcome $username');
                window.location.href = '../Index.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Invalid Username or Password');
                window.location.href = '../HTML/Login.php';
                </script>";
            }
        }
    }

    // Registration
    if (isset($_POST['Register_btn'])) {
        
        $username = mysqli_real_escape_string($con, $_POST['Username']);
        $Contact = mysqli_real_escape_string($con, $_POST['Contact']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $password = mysqli_real_escape_string($con, $_POST['Password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['CPassword']);

        if ($password == $cpassword) {
            $insert = "INSERT INTO users (Username, Email, Contact, Password) VALUES('$username', '$Email', '$Contact', '$password')";
            $result = mysqli_query($con, $insert);

            if ($result) {
                echo "<script>
                alert('Registred Successfully');
                window.location.href = '../HTML/Login.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Oops! Something went wrong! Please try again');
                window.location.href = '../HTML/Registration.php';
                </script>";
            }
        }
        else 
        {
            echo "<script>
                alert('Password does not match');
                window.location.href = '../HTML/Registration.php';
                </script>";
        }

    }

    // Admin Dashboard Registration
    if (isset($_POST['dash_register_btn'])) {
        $username = mysqli_real_escape_string($con, $_POST['Username']);
        $Contact = mysqli_real_escape_string($con, $_POST['Contact']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $password = mysqli_real_escape_string($con, $_POST['Password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['CPassword']);
        $radio_admin = mysqli_real_escape_string($con, $_POST['ac-type']);

        if ($password == $cpassword) {
            if (isset($_POST['ac-type'])) {
                $selectedradio = $_POST['ac-type'];

                if ($selectedradio == "Admin") {
                    $insert = "INSERT INTO admin (Username, Email, Contact, Password) VALUES('$username', '$Email', '$Contact', '$password')";

                    $result = mysqli_query($con, $insert);

                    if ($result) {
                        echo "<script>
                        alert('Registred Successfully');
                        window.location.href = '../HTML/Dashboard.php';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                        alert('Oops! Something went wrong! Please try again');
                        window.location.href = '../HTML/Dashboard.php';
                        </script>";
                    }
                }
                else if ($selectedradio == "User")
                {
                    $insert = "INSERT INTO users (Username, Email, Contact, Password) VALUES('$username', '$Email', '$Contact', '$password')";

                    $result = mysqli_query($con, $insert);

                    if ($result) {
                        echo "<script>
                        alert('Registred Successfully');
                        window.location.href = '../HTML/Dashboard.php';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                        alert('Oops! Something went wrong! Please try again');
                        window.location.href = '../HTML/Dashboard.php';
                        </script>";
                    }
                }
                else 
                {
                    echo "<script>
                    alert('Please Select the User type and try again!');
                    window.location.href = '../HTML/Dashboard.php';
                    </script>";
                }
            }
        }
        else 
        {
            echo "<script>
            alert('Password does not match');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        }
    }

    // Admin Dash user edit
    if (isset($_POST['dash_edit_user'])) {
        
        $username = mysqli_real_escape_string($con, $_POST['Username']);
        $Contact = mysqli_real_escape_string($con, $_POST['Contact']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $password = mysqli_real_escape_string($con, $_POST['Password']);
        $user_id = mysqli_real_escape_string($con, $_POST['user_ID']);

        
        $insert = "UPDATE users SET Username='$username', Email='$Email', Contact='$Contact', Password='$password' WHERE UserID='$user_id'";
        $result = mysqli_query($con, $insert);

        if ($result) {
            echo "<script>
            alert('Updated User Successfully');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Oops! Something went wrong! Please try again');
            window.location.href = '../HTML/Dashboard.php';
            </script>";
        }
    

    }

    // Admin Dash user Delete
    if (isset($_POST['Delete-user-btn'])) {
        $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    
    
        $delete = "DELETE FROM users WHERE UserID = '$user_id'";
        $result = mysqli_query($con, $delete);
    
        if ($result) {
            echo "<script>
            alert('User Deleted successfully');
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