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
    <div class="login">
    <form action="../controller/connect.php" method="post" enctype="multipart/form-data" >
        <h3 class="rg">Update Data</h3>
    <img src="<?php echo $_SESSION["img"] ;?>" alt="Please upload img" height='80px' width='80px'><br>

    <input type="file" name="pic" style="margin-left:0px;"> <br>
 
    <button type="submit" name="pic_update">Upload</button><br>
    </form>
    <form action="../controller/connect.php" method="post">
     First Name: <input type="text" name="F_name" value="<?php echo $_SESSION["Firstname"];?>"> <br>
     Last Name: <input type="text" name="L_name" value="<?php echo $_SESSION["Lastname"];?>"> <br>

     Phone no: <input type="text" maxlength="10" name="phn" value="<?php echo $_SESSION["Phn"];?>"> <br>
     <button type="submit" name="profile_update">Update</button>
    </form>

 </div>
 


    
</body>
</html>