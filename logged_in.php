<?php
include 'includes/autoloader.inc.php';
include 'includes/header.php';
Session::sessionStart();
Session::userNotLogged();

$user_obj = new User();
$user_obj->showUsers();

Session::logout();
include 'includes/footer.php';
?>