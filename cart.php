<?php
session_start();
include('dbconnect.php');
include('header.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header('location: login.php');
}else{
?>
<div class="container my-5">
    <!-- tittle heading -->
    <h3 class="text-center my-3">
        <span>C</span>art Page
    </h3>
    <!-- //tittle heading -->
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4 class="mb-sm-4 mb-3">
                <div style="display:<?php if(isset($_SESSION['showAlert'])){
                echo $_SESSION['showAlert'];
            }else{
                echo 'none';
            }
            unset($_SESSION['showAlert']);?>" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
            } unset($_SESSION['showAlert']);?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </h4>
            <div class="table-responsive">
                <table class="table table-primary table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th><a href="action.php?clear=all" class="badge bg-danger text-white p2"
                                    onclick="return confirm('Are you sure want to clear your cart?');"
                                    style="text-decoration:none">
                                    <i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //mysql query
require ("dbconnect.php");
$grand_total=0;
$user_email = $_SESSION['user_email'];
$stmt = "SELECT * FROM carts WHERE user_email='$user_email'";
$results = mysqli_query($connection,$stmt);	
while($row=mysqli_fetch_array($results)){
		$id=$row["id"];
		$name=$row["product_title"];
        $image=$row["product_image"];
        $price=$row["product_price"];
        $quantity=$row["qty"];
		$total_price=$row["total_price"];
		$product_code=$row["product_code"];
?>

                        <tr>
                            <td><?php echo $product_code;?></td>
                            <input type="hidden" class="pid" value="<?php echo $id;?>" />
                            <td><?php echo $name;?></td>
                            <td>
                                <img src="images/<?php echo $image;?>" alt=" " style="width: 70px;height: 70px;">

                            </td>
                            <td><?php echo number_format($price,2);?></td>
                            <input type="hidden" class="pprice" value="<?php echo  $price;?>" />
                            <td>
                                <input type="number" class="form-control itemQty" value="<?php echo $quantity;?>">
                            </td>
                            <td><?php echo number_format($total_price,2);?></td>
                            <td>
                                <a href="action.php?remove=<?php echo $id;?>" class="badge bg-danger text-white"
                                    onclick="return confirm('Are you sure want to delete item?');">
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $grand_total += $total_price;?>
                        <?php } ?>
                        <tr>
                            <td colspan='3'>
                                <a href="index.php" class="btn btn-primary"><i
                                        class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                            </td>
                            <td colspan='2'><b>Grand Total</b></td>
                            <td><b><?php echo number_format($grand_total,2);?></b></td>
                            <td><a href="checkout.php"
                                    class="btn btn-primary <?php echo ($grand_total>1)?"":"disabled";?>"><i
                                        class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';
}
?>