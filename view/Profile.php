<?php
//include '.\controller\connect.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/TASK/controller/connect.php');
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>welcome to the User Profile.</h1>
    <h1>First Name:- <?php echo $_SESSION["Firstname"];?></h1><br>
    <h1> Last Name:- <?php echo $_SESSION["Lastname"];?></h1><br>
    <h1> Email:- <?php echo $_SESSION["Email"] ;?></h1><br>
    <h1> Phone:- <?php echo $_SESSION["Phn"] ;?></h1><br>

    <button><a href="Edit_user_detail.php" style=" text-decoration:none;">Edit</a></button>
    <button><a href="" style=" text-decoration:none;">Change Password</a></button>
    <button><a href="" style=" text-decoration:none;">Logout</a></button>



</body>
</html>