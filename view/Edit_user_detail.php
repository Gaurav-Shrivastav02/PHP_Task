<?php
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
<form action="../controller/connect.php" method="post">
 First Name: <input type="text" name="F_name" value="<?php echo $_SESSION["Firstname"];?>"> <br>
 Last Name: <input type="text" name="L_name" value="<?php echo $_SESSION["Lastname"];?>"> <br>
Email: <input type="email" name="email" value="<?php echo $_SESSION["Email"];?>"> <br>
 Phone no: <input type="text" name="phn" value="<?php echo $_SESSION["Phn"];?>"> <br> 
 <!-- Profile Photo: <input type="file" name="pic"> <br> -->

 <button type="submit" name="profile_update">Update</button><br>
 
</form>
<?php


?>
    
</body>
</html>