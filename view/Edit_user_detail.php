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
    <title>Edit Detail</title>
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

  $_SESSION['message']=NULL;
}

?>
<div class="text-center border bg-light  p-5 col-6 offset-3 mt-1" style="border-radius:20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;" >
<p class="h3 mb-4 bg-info text-white pt-1 pb-1">Update User Details</p>
<form action="../controller/connect.php" method="post" enctype="multipart/form-data">
<!-- Profile photo -->
<img src="<?php echo $_SESSION["img"] ;?>" alt="Please upload img" height='100px' width='100px'><br>
<input type="file" name="pic" id="defaultRegisterFormLastName" class=" mt-3 ml-5 "> <br>
<button type="submit" name="pic_update" class="btn btn-danger mt-2 mb-3  ">UPLOAD</button>
</form>

<form  action="../controller/connect.php" method="post"  >

<!-- First name -->
<input type="text"  name="F_name" id="defaultRegisterFormFirstName" class="form-control mt-3 " placeholder="First Name" value="<?php echo $_SESSION["Firstname"];?>">
    
<!-- Last name -->
<input type="text" name="L_name" id="defaultRegisterFormLastName" class="form-control mt-3 " placeholder="Last Name" value="<?php echo $_SESSION["Lastname"];?>">

<!-- Phone number -->
<input type="text" name="phn" pattern="[0-9]{10}" title="It must be integer and exact 10 digit." maxlength="10"id="defaultRegisterPhonePassword" class="form-control  mt-3 mb-4" placeholder="Phone No" value="<?php echo $_SESSION["Phn"];?>">

<!-- update button -->
<button class="btn btn-info  btn-block" type="submit" name="profile_update">Update</button>

</form>
</div>
 
</body>
</html>

