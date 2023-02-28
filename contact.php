<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>Contact</title>
</head>
<body>
    <?php  include 'includes/header.php'  ?>

    <div class="container">
  <form action="" method="post">

    <label>First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label>Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    
    <label>Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something..." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="submit">



<?php
    if(isset($_POST['submit'])) {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $subject = $_POST['subject'];


$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'social_network';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error) {
    die('Error connecting with database: ' . $conn->connect_error);
}
        
        

        $contact_query = "INSERT INTO contact(first_name, last_name, subject) VALUES(?, ?, ?)";

        $prep_contact_query = $conn->prepare($contact_query);
        $prep_contact_query->bind_param('sss', $first_name, $last_name, $subject);
        $result = $prep_contact_query->execute();

        if($result) {
            echo 'Successfully sent a message';
        }
        else {
            echo 'Problems while trying to send a message';
        }
    }
?>
  </form>
</div>




    <?php   include 'includes/footer.php' ?>
    
</body>
</html>