<?php
//include '.\controller\connect.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/TASK/controller/connect.php');
session_start();
if(!isset($_SESSION['Email'])){
    header('location:Login.php');
}
?>

<html lang="en">
<head>

  <title>User Profile </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .main{
        
    }
  .container {
    padding: 20px 120px;
   
    
  }
  .xtz{
    padding: 0px 0px 10px;

  }
 
  
   .bg-1 {
    
    background: #2d2d30;
    color: #bdbdbd;
  }
 
  .bg-1 p {font-style: italic;}
  li{
    color: #000;
  }


</style>
</head>
<body>
<div class="main">
<div class="bg-1" >
  <div class="container">
    <?php
  if(isset($_SESSION['message'])){
    $mes=$_SESSION['message'];
    echo"  <div class='alert col-6 offset-3 alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>success!</strong> $mes
  </div>";

  $_SESSION['message']=NULL;
}
?>
    <h3 class="text-center text-primary font-weight-bold">PROFILE DETAIL</h3>
    <p class="text-center">Hii <strong class="font-weight-bold text-success"> <?php echo $_SESSION['Firstname'];?></strong>, welcome to your profile page .<br> Here below find your profile details!</p>
    
    <div class="text-center xtz">
    <span class="rounded">
      <img src="<?php echo $_SESSION['img'];?>" class="rounded-circle   text-center" style="width:160px;height:170px;" alt="">
      </span>
    </div>
    <ul class="list-group">
      <li class="list-group-item">You have loged in into system on <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-y h:i:s');?></li>
      <li class="list-group-item">Name:- <?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname'];?></li>
      <li class="list-group-item"> Email Id:- <?php echo $_SESSION["Email"] ;?></li>
      <li class="list-group-item">Phone No :- <?php echo $_SESSION['Phn'];?></li>
      <li class="list-group-item">
      <form method= "post"  action="../controller/connect.php" >
      <button type="submit" name="logout" class="btn btn-primary">Logout</button>
      <a class="btn btn-primary" href="Edit_user_detail.php" role="button">Edit Profile</a>
      <a class="btn btn-primary" href="change_user_password.php" role="button">Reset-Password</a>
      </form>

</li> 

    </ul>
  </div>
</div>
</div>

</body>
</html>