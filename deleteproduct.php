<?php
session_start();
include 'dbconnect.php';
if(!isset($_SESSION['user_email'])){
    header('location:index.php');
}
elseif(isset($_SESSION['admin'])){
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM products WHERE id='$id'";
        $result = mysqli_query($connection,$query);
        echo "<script>alert('Product Deleted successfully')</script>";
        echo "<script>window.open('viewallproduct.php','_self')</script>";
    }
}
?>