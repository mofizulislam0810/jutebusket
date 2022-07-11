<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_name'])){
header("location: login.php");
}
else if(isset($_SESSION['admin'])){
	include_once 'header.php';
?>
<div class="container my-3">
    <div class="row">
        <div class="col-lg-3 col-12">
            <?php include 'dashboardnav.php';?>
        </div>
        <div class="col-lg-9 col-12 my-5 ax-auto">
            <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
<?php } else { 
    header("location: index.php");
    }
?>