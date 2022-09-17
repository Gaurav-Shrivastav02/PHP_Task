<?php
echo "<h1>Welcome to the Login Page</h1";


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<form action="../controller/connect.php" method='post'>
 Email: <input type="email" name="email">
 pass: <input type="pass" name="pass">   
 <button type="submit" name="Login">Login</button>
 

</form>
<button><a href="welcome.php" style=" text-decoration:none;">Register</a></button>
    
</body>
</html>