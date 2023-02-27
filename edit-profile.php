<?php
include 'includes/autoloader.inc.php';
Session::sessionStart();
Session::userNotLogged();

$obj = new EditProfile();
$obj->publicInfoForm($_SESSION['user_email']);

if(isset($_POST['save'])){

    $avatar = $_FILES['avatar'];
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $obj->editPublicInfo($avatar, $fullName, $username);


}

Session::logout();
?>