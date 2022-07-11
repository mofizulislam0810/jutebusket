<?php
session_start();
include_once('dbconnect.php');
include_once('header.php');
if (isset($_POST['login'])) {

  $email =  $_POST['email'];
  $password =  md5($_POST['password']);
  $result = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' and password = '$password'");

  if ($row = mysqli_fetch_array($result)) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_name'] = $row['name'];
      $admin = $row['role'];
      if($admin == 'admin'){
        $_SESSION['admin'] = 'admin';
      }
      if(isset($_SESSION['url'])){
        $url = $_SESSION['url'];
        header("location: $url");
      }
     else{
        header("location: index.php");
      }
  } else {
      $error = "Incorrect Email or Password!!!";
  }
}
?>
<div class="container my-5 py-5">
    <div class="row my-4">
        <?php if(isset($error)) echo '<span class="alert alert-danger" role="alert">'.$error.'</span>'?>
        <div class="col-md-4 offset-md-4">
            <div class="bg-light mt-4 p-4">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="row g-3">
                    <h4 class="text-center">Welcome To Login</h4>
                    <div class="col-12 my-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="col-12 my-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-outline-primary float-end w-100" name="login">
                            Login
                        </button>
                    </div>
                </form>
                <hr class="mt-4" />
                <div class="col-12">
                    <p class="text-center mb-0">
                        Have not account yet?
                        <a href="register.php" class="text-primary">
                            Register
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require ('footer.php');
?>