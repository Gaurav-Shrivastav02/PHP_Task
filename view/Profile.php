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
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
   
    <table class="profile">
    <tr><td colspan="4"><h3>welcome to the User Profile.</h3></td></tr>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION["Firstname"];?></td>
            <td><?php echo $_SESSION["Lastname"];?></td>
            <td><?php echo $_SESSION["Email"] ;?></td>
            <td><?php echo $_SESSION["Phn"] ;?></td>
        </tr>
        <tr>
    
                <td><button><a href="Edit_user_detail.php" style=" text-decoration:none;">Edit</a></button></td>
                <td colspan="2"><button><a href="change_user_password.php" style=" text-decoration:none;">Change Password</a></button></td>
                <td><button><a href="logout.php" style=" text-decoration:none;">Logout</a></button></td>

        </tr>
    </table>

    
    
    



</body>
</html>