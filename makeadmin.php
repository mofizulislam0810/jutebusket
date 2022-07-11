<?php 
session_start();
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
include("dbconnect.php"); 
include("header.php"); 
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_email = $_SESSION['user_email'];
    $query = mysqli_query($connection,"SELECT * FROM users where email='$user_email'");
    if($row = mysqli_fetch_array($query)){
        $role = $row['role'];
        if($role=='admin'){
            mysqli_query($connection,"UPDATE users SET role='admin' WHERE email='$email'");
            echo "<script>alert('Admin created Successfully')</script>";
		    echo "<script>window.open('makeadmin.php','_self')</script>";
        }
        else{
            echo "<script>alert('You have no permission for this.')</script>";
            echo "<script>window.open('makeadmin.php','_self')</script>";
        }
    }
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-3 col-12">
            <?php include 'dashboardnav.php';?>
        </div>
        <div class="col-lg-9 col-12 my-3 ax-auto">
            <h3 class="text-center">Make Admin Form</h3>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Enter Email Address:</label>
                    <div class="col-sm-12 col-12">
                        <input type="email" class="form-control" id="inputEmail3" name="email"
                            placeholder="Please enter email" required>
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