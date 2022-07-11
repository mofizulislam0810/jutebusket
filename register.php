<?php
session_start();
require('dbconnect.php');
require('header.php');
if(isset($_POST['signUp'])){
    $date = date('m-d-y');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['cpassword']);
    $role = 'user';
    $user_email = mysqli_query($connection,"SELECT email FROM users WHERE email='$email'");
    if($password !== $confirmPassword){
        $password_error = "Password and Confirm Password doesn't match";
    }
    else if(mysqli_fetch_array($user_email)>0){
        $email_error = "Email eddress already exits!";
    }
    else{
      $query = mysqli_query($connection,"INSERT INTO users(date,name,email,password,role) VALUES ('$date','$name','$email','$password','$role')");
      if($query){
          $success = "Successsfully Registered! Please login.";
      }
    } 
}
?>
<div class="container my-5 py-5">
    <div class="row my-2">
        <?php if(isset($success)) echo '<span class="alert alert-success" role="alert">'.$success.'</span>'?>
        <?php if(isset($email_error)) echo '<span class="alert alert-danger" role="alert">'.$email_error.'</span>'?>
        <?php if(isset($password_error)) echo '<span class="alert alert-danger" role="alert">'.$password_error.'</span>'?>
        <div class="col-md-4 offset-md-4">
            <div class="bg-light mt-4 p-4">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="row g-3">
                    <h4 class="text-center">Welcome To Register</h4>
                    <div class="col-12 my-3">
                        <input type="text" name="name" class="form-control" placeholder="Name" required />
                    </div>
                    <div class="col-12 my-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="col-12 my-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="col-12 my-3">
                        <input type="password" name="cpassword" class="form-control" placeholder="Retype Password"
                            required />
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-outline-primary float-end w-100" name="signUp">
                            Register
                        </button>
                    </div>
                </form>
                <hr class="mt-4" />
                <div class="col-12">
                    <p class="text-center mb-0">
                        Already Register?
                        <a href="login" class="text-primary">
                            Login
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