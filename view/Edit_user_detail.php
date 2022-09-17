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
<form action="" method="post">
 First Name: <input type="text" name="F_name" value="<?php echo $_SESSION["Firstname"];?>"> <br>
 Last Name: <input type="text" name="L_name" value="<?php echo $_SESSION["Lastname"];?>"> <br>
 Email: <input type="email" name="email" value="<?php echo $_SESSION["Email"];?>"> <br>
 Phone no: <input type="text" name="phn" value="<?php echo $_SESSION["Phn"];?>"> <br> 
 <!-- Profile Photo: <input type="file" name="pic"> <br> -->

 <button type="submit" name="submit">Register</button><br>
 
</form>
<?php
if( isset($_POST["submit"])){
    $Fn=$_POST['F_name'];
    $ln=$_POST['L_name'];
    $em=$_POST['email'];
    $phn=$_POST['phn'];

    echo "$Fn->";
    echo "$ln->";
    echo "$em->";
    echo "$phn";
  

}

?>
    
</body>
</html>