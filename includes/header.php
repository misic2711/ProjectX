<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>.</title>
</head>
<body>
<div class="header">
  <a href="default" class="logo">ProjectX</a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a class="active" href="register.php">Register</a>
    <a class="active-b" href="login.php">Log in</a>
    <a href="logged_in.php">All users</a>
    <a href="contact.php">Contact us</a>
    <a href="login.php"><?php Session::logout(); ?></a>
    
  </div>
</div>
