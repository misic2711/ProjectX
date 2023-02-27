<link rel="stylesheet" href="assets/css/register-form.css">

<?php
include 'includes/autoloader.inc.php';
Session::sessionStart();


Session::userLogged();

$user_obj = new User();
include 'includes/header.php';
?>
<form action="" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="passwo-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>


<?php
if(isset($_POST['register'])) {
    
    $email = $_POST['email'];
   
    $password = $_POST['password'];

    $password_repeat = $_POST['password-repeat'];

    $user_obj->setUser($email, $password, $password_repeat);
}

include "includes/footer.php";
?>