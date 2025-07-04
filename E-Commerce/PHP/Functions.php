<?php

include("../PHP/Connection.php");

function getall($table) {
    global $con;
    $select_query = "SELECT * FROM $table";
    return $result = mysqli_query($con, $select_query);
}

function getbyid($table) {
    global $con;
    global $product_id;
    $select_query = "SELECT * FROM $table WHERE Product_ID = $product_id";
    return $result = mysqli_query($con, $select_query);
}

function getmensbyid($table, $where = "Category_id = 1") {
    global $con;
    $query = "SELECT * FROM $table WHERE $where";
    $result = mysqli_query($con, $query);
    
    return $result;
}

function getwomensbyid($table, $where = "Category_id = 2") {
    global $con;
    $query = "SELECT * FROM $table WHERE $where";
    $result = mysqli_query($con, $query);
    
    return $result;
}

function getaccessoriesbyid($table, $where = "Category_id = 3") {
    global $con;
    $query = "SELECT * FROM $table WHERE $where";
    $result = mysqli_query($con, $query);
    
    return $result;
}

function formatCurrency($amount) {
    return '$' . number_format($amount, 2, '.', ',');
}

function getusersbyid($table) {
    global $con;
    $select_query = "SELECT * FROM $table";
    return $result = mysqli_query($con, $select_query);
}

function getuserbyid($table) {
    global $con;
    global $user_id;
    $select_query = "SELECT * FROM $table WHERE UserID = $user_id";
    return $result = mysqli_query($con, $select_query);
}
?>