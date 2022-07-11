<?php
session_start();
include('dbconnect.php');
include('header.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header('location: login.php');
}else{
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM products where id = '$id'");
    if($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image'];
        $product_code = $row['productcode'];
    }
?>
<div class="container my-5 py-5">
    <div id="message"></div>
    <div class="row alin-item-center m-5">
        <div class="col-md-5 col-12 ">
            <div class="d-flex justify-content-center">
                <img class="mx-auto img-fluid mb-3" src="images/<?= $image;?>" alt="..." />
            </div>
        </div>
        <div class="col-md-7 col-12 my-auto shadow p-5 bg-white rounded">
            <div class="p-0">
                <h3 class="fw-bold mb-3">
                    <b>Cactus Name: <?= $name;?></b>
                </h3>
                <p class="m-3">
                    <b>Description:</b> <?= $description;?>
                </p>
                <h3 class="fw-bold m-3">Price: &#2547; <?= $price;?></h3>
                <?php } ?>
                <?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM products where id = '$id'");
    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image'];
        $product_code = $row['productcode'];
	?>
                <?php if (isset($_SESSION['user_name'])) { ?>
                <form action="" class="form-submit">
                    <fieldset>
                        <input type="hidden" class="p_id" value="<?= $id; ?>" />
                        <input type="hidden" class="p_name" value="<?= $name; ?>" />
                        <input type="hidden" class="p_price" value="<?= $price;?>" />
                        <input type="hidden" class="p_image" value="<?= $image; ?>" />
                        <input type="hidden" class="p_code" value="<?= $product_code; ?>" />
                        <input type="hidden" class="user_name" value="<?= $_SESSION['user_name']; ?>" />
                        <input type="hidden" class="user_email" value="<?= $_SESSION['user_email']; ?>" />
                        <input type="submit" name="submit" value="Add to cart"
                            class="btn btn-outline-primary addItemBtn" />
                        <?php }}} ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
}
?>