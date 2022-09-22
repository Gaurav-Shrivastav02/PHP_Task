<?php
session_start();
if(!isset($_SESSION['Email'])){
    header('location:Login.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
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
    echo"  <div class='alert col-6 offset-3 alert-info alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Info!</strong> $mes
  </div>";
  $_SESSION['message']=NULL;
}
    
    ?>
<form class="col-6  bg-light  mt-5 offset-3 p-5 " action="../controller/connect.php" name="editpassword" method="post"  style="border-radius:20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
<p class="h3 mb-4 bg-info text-white pt-1 pb-1">Update User Password</p>  
<div class="form-group mt-4 ">
    <label for="exampleInputEmail1" class="h6">New Password</label>
    <input type="password" name="pass" id="pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password">
  </div>
  <div class="form-group mt-5" >
    <label for="exampleInputPassword1"class="h6">Confirm Password</label>
    <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" placeholder="Enter Again" >
  </div>
  <button type="submit" name="Update_pass" class="btn btn-primary mt-2 mb-3  ">Change Password</button>
 
</form>

<script>
     $(editpassword).validate({
      rules: {
        
      pass: {
        required: true,
        minlength: 2,
      },
      cpass: {
        required: true,
        minlength: 2,
        equalTo: "#pass",
      },
    },
});
</script>
</div>
</body>   
</html>