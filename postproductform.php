<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
include("dbconnect.php"); 
include("header.php"); 
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = mysqli_real_escape_string($connection,$_POST['description']);
    $price = $_POST['price'];
    $product_code = $_POST['productcode'];
    $post_image= $_FILES['image']['name'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $local_image="images/";
    move_uploaded_file($image_tmp,$local_image.$post_image);
    $insert_query = "insert into products (name,image,description,price,productcode) values ('$title','$post_image','$description','$price','$product_code')";
    if(mysqli_query($connection,$insert_query)){
    echo "<script>alert('Product added successfuly')</script>";
    echo "<script>window.open('postproductform.php','_self')</script>";
        }
    }
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-3 col-12">
            <?php include 'dashboardnav.php';?>
        </div>
        <div class="col-lg-9 col-12 my-3 ax-auto">
            <h3 class="text-center">Post Product Form</h3>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Title:</label>
                    <div class="col-sm-12 col-12">
                        <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="Title"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">File input:</label>
                    <div class="col-md-12 col-12">
                        <input type="file" class="btn btn-default" id="exampleInputFile1" name="image" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Description:</label>
                    <div class="col-sm-12 col-12">
                        <textarea class="form-control" placeholder="Textarea" name="description" rows="3"
                            required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Price:</label>
                    <div class="col-sm-12 col-12">
                        <input type="number" class="form-control" placeholder="Enter the amount" name="price" rows="3"
                            required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Code:</label>
                    <div class="col-sm-12 col-12">
                        <input type="text" class="form-control" placeholder="Enter the product code" name="productcode"
                            rows="3" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-12 col-12">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<?php } else { 
    header("location: index.php");
    }
?>