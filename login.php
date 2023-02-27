<link rel="stylesheet" href="assets/css/login-form.css">
<?php
include 'includes/autoloader.inc.php';

Session::sessionStart();

Session::userLogged();

$user_obj = new User();

?>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="images/placeholder.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>E-mail</b></label>
    <input type="text" placeholder="Enter E-mail" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">If you do not have and account, please <a href="register.php">Register</a></button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

<?php
//$user_obj->defineLoginForm();
//echo $user_obj->loginForm;

if(isset($_POST['login'])) {
    $login_cred = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];

    $user_obj->loginUser($login_cred);
}

?>