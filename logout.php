<?php 
session_start();
if(isset($_SESSION['user_id'])){
     session_destroy();
     unset($_SESSION['user_id']);
     unset($_SESSION['user_name']);
     unset($_SESSION['user_email']);
     header('location: index.php');
} else {
    header('location: index.php');
}
?>