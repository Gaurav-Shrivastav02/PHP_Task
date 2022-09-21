
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
    <title>Register User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">
<div class="container">

<?php
if(isset($_SESSION['message'])){
    $mes=$_SESSION['message'];
    echo"  <div class='alert col-6 offset-3 alert-info alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Info!</strong> $mes
  </div>";
    session_unset();
    session_destroy();
}

?>


<form class="text-center border bg-light  p-5 col-6 offset-3 mt-1" action="../controller/connect.php" method="post" enctype="multipart/form-data" style="border-radius:20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">

<p class="h3 mb-4 bg-info text-white pt-1 pb-1">Register</p>

<div class="form-row mb-4">
    <div class="col">
        <!-- First name -->
        <input type="text"  name="F_name" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text" name="L_name" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
    </div>
</div>

<!-- E-mail -->
<input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" required>

<!-- Password -->
<input type="password" name="pass" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Password" required>

<input type="password"  name="cpass"id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Confirm Password" required>

<!-- Phone number -->
<input type="text" name="phn" maxlength="10" id="defaultRegisterPhonePassword" pattern="[0-9]{10}" title="It must be integer and exact 10 digit." class="form-control mb-4" placeholder="Phone number">

<!-- Prodile pic -->
<input type="file" name="pic" id="defaultRegisterPhonePassword" class="form-control mb-4" >

<!-- Sign up button -->
<button class="btn btn-info  btn-block" type="submit" name="submit">Register</button>
<p class="mt-4">If you a already registered.<a href="Login.php" class="text-primary h5 p-2">LOGIN</a></p>

</form>
<!-- Default form register -->

 
</body>
</html>


