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
                <h3 class="text-center">View All Products</h3>
                <table class="table table-primary table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="white-space:nowrap">Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th style="white-space:nowrap">Product Code</th>
                            <th><span class="badge rounded-pill bg-danger">Edit</span></th>
                            <th><span class="badge rounded-pill bg-danger">Delete</span></th>
                        </tr>
                    </thead>
                    <?php 
include("dbconnect.php");
$query = "select * from products";
$run = mysqli_query($connection,$query);
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$name = $row['name'];
	$price = $row['price'];
	$description = $row['description'];
    $image = $row['image'];
    $product_code = $row['productcode']
?>

                    <tbody>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $name; ?></td>
                            <td><?= $price; ?></td>
                            <td><?= substr($description,0,100); ?>...</td>
                            <td><?= $image; ?></td>
                            <td><?= $product_code;?></td>
                            <td><a href="editproduct.php?edit=<?= $id; ?>"><span class="badge rounded-pill bg-danger"><i
                                            class="fas fa-edit"></i>
                                    </span>
                                </a>
                            </td>
                            <td><a href="deleteproduct.php?delete=<?= $id; ?>"><span
                                        class="badge rounded-pill bg-danger"><i class="fas fa-trash-alt"></i>
                                    </span>
                                </a>
                            </td>
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