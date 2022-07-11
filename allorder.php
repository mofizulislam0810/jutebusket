<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
include("dbconnect.php"); 
include("header.php");
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-3 col-12">
            <?php include 'dashboardnav.php';?>
        </div>
        <div class="col-lg-9 col-12 my-3 ax-auto">
            <div class="table-responsive">
                <h3 class="text-center">All Orders</h3>
                <table class="table table-primary table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Products</th>
                            <th style="white-space:nowrap">Total Amount</th>
                            <th style="white-space:nowrap">Payment Method</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th style="white-space:nowrap">Payment_Status</th>
                            <th style="white-space:nowrap">Delivary_Status</th>
                        </tr>
                    </thead>
                    <?php 
include("dbconnect.php");
$query = "select * from orders";
$run = mysqli_query($connection,$query);
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$date = $row['date'];
	$products = $row['products'];
	$total = $row['grand_total'];
	$payment_mode = $row['payment_mode'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $payment_status = $row['payment_status'];
    $delivery_status = $row['delivery_status'];
?>

                    <tbody>
                        <tr>
                            <td style="white-space:nowrap"><small><?= $id; ?></small></td>
                            <td style="white-space:nowrap"><small><?= $date; ?></small></td>
                            <td style="white-space:nowrap">
                                <small class="badge rounded-pill bg-danger"><strong><?= $products; ?></strong></small>
                            </td>
                            <td style="white-space:nowrap"><small><?= $total; ?></small></td>
                            <td style="white-space:nowrap"><small><?= $payment_mode; ?></small></td>
                            <td style="white-space:nowrap"><small><?= $name;?></small></td>
                            <td style="white-space:nowrap"><small><?= $email;?></small></td>
                            <td style="white-space:nowrap"><small><?= $phone;?></small></td>
                            <td style="white-space:nowrap"><small><?= $address;?></small></td>
                            <td style="white-space:nowrap"><small
                                    class="badge rounded-pill bg-danger"><?= $payment_status;?></small></td>
                            <td style="white-space:nowrap"><small
                                    class="badge rounded-pill bg-danger"><?= $delivery_status;?></small></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<?php } else { 
    header("location: index.php");
    }
?>