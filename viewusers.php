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
                <h3 class="text-center">All Users</h3>
                <table class="table table-primary table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <?php 
include("dbconnect.php");
$query = "select * from users";
$run = mysqli_query($connection,$query);
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$date = $row['date'];
	$fullname = $row['name'];
	$email = $row['email'];
	$password = $row['password'];
    $role = $row['role']
?>

                    <tbody>
                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $date; ?></td>
                            <td><?= $fullname; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $password; ?></td>
                            <td><?= $role;?></td>
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