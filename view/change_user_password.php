<?php
session_start();
if(!isset($_SESSION['Email'])){
    header('location:Login.php');
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="../controller/connect.php" method="post" class="login">
        <h3 class="lg">Change password</h3>
        Enter New password: <input type="password" name="pass"  required> <br>
        Confirm password:<input type="password" name="pass1"  required> <br>
        <input type="submit" name="Update_pass" value="Update Password" >
    </form>
    
</body>
</html>