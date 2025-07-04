<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "velvet_vogue";
    $con = new mysqli($servername, $username, $password, $db_name, 3308);
    if($con -> connect_error){
        die("Connection failed".$con -> connect_error);
    }
?>
