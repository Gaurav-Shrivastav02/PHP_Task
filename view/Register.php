<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- <h2>Welcome</h2> -->

<form action="../controller/connect.php" method="post" class="register">
   <h3 class="rg">Register</h3>
 First Name: <input type="text" name="F_name"> <br>
 Last Name: <input type="text" name="L_name"> <br>
 Email: <input type="email" name="email"> <br>
 Password: <input type="password" name="pass"> <br>
 Phone no: <input type="text" name="phn"> <br> 
 <!-- Profile Photo: <input type="file" name="pic"> <br> -->

 <button type="submit" name="submit">Register</button>
 <button type="submit" ><a href="Login.php" style=" text-decoration:none;color:black;">Login</a></button><br>
</form>
    
</body>
</html>