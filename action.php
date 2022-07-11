<?php
session_start();
include_once("dbconnect.php");
if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		$pcode = $_POST['pcode'];
		$username = $_POST['username'];
		$useremail = $_POST['useremail'];
		$pqty = 1;
		$stmt = "SELECT product_code,user_email FROM carts where product_code='$pcode' AND user_email='$useremail'";
		$result=mysqli_query($connection,$stmt);
		$row = mysqli_fetch_assoc($result);
		$code = $row['product_code'];
		$email = $row['user_email'];
		if($email != $useremail){
			$code = 0;
		}
		
		if(!$code){
			$query = "INSERT INTO carts(product_title,product_price,product_image,product_code,qty,total_price,user_name,user_email) VALUES('$pname','$pprice','$pimage','$pcode','$pqty','$pprice','$username','$useremail')";
			mysqli_query($connection,$query);
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Item</strong> added to your cart!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
		}
		else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Item</strong> already added to your cart!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
		}
}

if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
	$user_name = $_SESSION['user_name'];
	$user_email = $_SESSION['user_email'];
	$query = "SELECT * FROM carts where user_name='$user_name' AND user_email='$user_email'";
	$result = mysqli_query($connection,$query);
	$rows = mysqli_num_rows($result);
	echo $rows;
}

if(isset($_POST['qty'])){
	$pid = $_POST['p_id'];
	$pprice = $_POST['pprice'];
	$qty = $_POST['qty'];
	$tprice = $qty*$pprice;
	$stmt = "UPDATE carts SET qty='$qty',total_price='$tprice' where id='$pid'";
	$result = mysqli_query($connection,$stmt); 
}

if(isset($_GET['remove'])){
	$id = $_GET['remove'];
	$stmt = "DELETE FROM carts where id='$id'";
	$result = mysqli_query($connection,$stmt);
	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'Item removed from the cart';
	header("location:cart.php");
}

if(isset($_GET['clear'])){
	$stmt = "DELETE FROM carts";
	$result = mysqli_query($connection,$stmt);
	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'All Items removed from the cart';
	header("location:cart.php");
}

if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$products = $_POST['products'];
	$grand_total= $_POST['grand_total'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];
	$pmode= $_POST['payment_mode'];
	$pstatus = 'unpaid';
	$deliverystatus = 'pendding';
	$data = '';
	$date = date('m-d-y');
	$stmt = "INSERT INTO orders (date,products,grand_total,payment_mode,name,email,phone,address,payment_status,delivery_status) VALUES ('$date','$products','$grand_total','$pmode','$name','$email','$phone','$address','$pstatus','$deliverystatus')";
	$result = mysqli_query($connection,$stmt);
	$clearcart = "DELETE from carts where user_email='$email'";
	mysqli_query($connection,$clearcart);
	echo "<script>alert('Order Successfully')</script>";
	echo "<script>window.open('cart.php','_self')</script>";
}

?>