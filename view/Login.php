<?php
session_start();
if(isset($_SESSION['Email'])){
  header("location:Profile.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container text-center">
      <?php
    if(isset($_SESSION['message'])){
    $mes=$_SESSION['message'];
    echo"  <div class='alert col-6 offset-3 alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Danger!</strong> $mes
  </div>";
    session_unset();
    session_destroy();
}
?>
<form class="col-6  bg-light  mt-5 offset-3 p-5 " action="../controller/connect.php" name="login" method="post" style="border-radius:20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
<p class="h3 mb-4 bg-info text-white pt-1 pb-1">LOGIN</p>  
<div class="form-group mt-4 ">
    <label for="exampleInputEmail1" class="h6">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group mt-5" >
    <label for="exampleInputPassword1"class="h6">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" >
  </div>
  <button type="submit" name="Login" class="btn btn-primary mt-2 mb-3  ">Login</button>
  <p class="mt-4">Not a member?<a href="Register.php" class="text-primary h5 p-2">Register</a></p>
</form>
</div>
<script>
     $(login).validate({
        rules: {
      email: {
        required: true,
        email: true
      },      
      pass: {
        required: true,
      },
    },
    messages: {                
     email: {
      required: "Please enter email address",
      email: "Please enter a valid email address.",
     },
    },
  

   
});
</script>
</body>   
</html>