<?php
session_start();
include('dbconnect.php');
include('header.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header('location: login.php');
}else{
$user_email = $_SESSION['user_email'];
$grand_total = 0;
$allItems = '';
$items = array();
$stmt = "SELECT CONCAT('P_Code = ',product_code,',',' P_Name = ',product_title,',',' Qty = ',qty,'') AS ItemQty,total_price FROM carts Where user_email='$user_email'";
$result = mysqli_query($connection,$stmt);
while($row = mysqli_fetch_array($result)){
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(" ; ",$items);
?>
<div class="container">
    <h3 class="text-center mt-2">
        <span>C</span>heckout
    </h3>
    <div class="row">
        <div class="col-lg-12" id="order">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <form action="#" method="post" id="placeorder" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label p-2">All Cart Product:</label>
                    <div class="col-sm-12 col-12">
                        <textarea class="form-control" name="products"><?php echo $allItems;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label p-2">Total Cart:</label>
                    <div class="col-sm-12 col-12">
                        <input type="number" class="form-control" name="grand_total" value="<?php echo $grand_total;?>">
                    </div>
                </div>
                <input type="hidden" name="name" value="<?php echo $_SESSION['user_name'];?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['user_email'];?>">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label p-2">Phone Number:</label>
                    <div class="col-sm-12 col-12">
                        <input type="number" class="form-control" id="inputEmail3" name="phone"
                            placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label p-2">Delivary Address:</label>
                    <div class="col-sm-12 col-12">
                        <textarea class="form-control" type="text" name="address" placeholder="Full Delivery Address"
                            required=""></textarea>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail3" class="col-sm-2 control-label p-2">Selete Payment Type:</label>
                    <select name="payment_mode" class="form-select">
                        <option vlaue="" selected disable>-Select Payment Mode-</option>
                        <option vlaue="cash">Cash On Delivery</option>
                        <option vlaue="cards">Debit/Credit Card</option>
                    </select>
                </div>
                <button class="btn btn-outline-primary w-100 mb-4" name="submit">Confirm Order<span
                        class="far fa-hand-point-right ms-1"></span>
                </button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php';
}
?>