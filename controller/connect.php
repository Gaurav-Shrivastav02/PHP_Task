<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/TASK/model/db_connect.php');
?>


<?php

// Relocate to Register Page 
class controller
{
    function invoke()
    {
        header("location: ./view/Register.php");
    }
}

// Function calling for registering user
if($_SERVER["REQUEST_METHOD"] == "POST"){
   

    if (isset($_POST['submit']))
    {   
        
        $Fn=$_POST['F_name'];
        $ln=$_POST['L_name'];
        $em=$_POST['email'];
        $pass=$_POST['pass'];
        $phn=$_POST['phn'];

         $ins=new model();
         $res= $ins->insert_user_data($Fn,$ln,$em,$pass, $phn);
         
        if($res=='login'){
          header("location: ../view/Login.php");
        }else{
            header("location: ../view/welcome.php");
        }
}else{
    Echo"Plese enter data.";
}
}

// Function calling for Login user

if (isset($_POST['Login']))
{
    session_start();
    $em=$_POST['email'];
    $pas=$_POST['pass'];  
     $ins=new model();
     $res=$ins->login_user($em);
     $_SESSION["Firstname"] = $res[1];
     $_SESSION["Lastname"] = $res[2];
     $_SESSION["Email"] = $res[3];
     $_SESSION["Phn"] = $res[4];
     if($res[0]===$pas){
        header("location: ../view/Profile.php");  
 }
 else{
 echo "Password is wrong";
}
}

// Function calling for User data update

if( isset($_POST["profile_update"])){
    $Fn=$_POST['F_name'];
    $ln=$_POST['L_name'];
    $em=$_POST['email'];
    $phn=$_POST['phn'];
    session_start();

    $ins=new model();
    $res= $ins->update_data($Fn,$ln,$em, $phn,$_SESSION["Email"] );
    $_SESSION["Firstname"] = $res[1];
    $_SESSION["Lastname"] = $res[2];
    $_SESSION["Email"] = $res[3];
    $_SESSION["Phn"] = $res[4];
    if($res=='no'){
        Echo"Data not Updated";
        
    }else{
        header("location: ../view/Profile.php");
    }
  }

//Function calling for user password update 

  if( isset($_POST["Update_pass"])){
    $pass=$_POST['pass'];
    echo "$pass ";
    session_start();
    $ins=new model();
    $res=$ins->update_password($pass,$_SESSION["Email"]);
    if($res=='update'){
        session_destroy();
        header("location: ../view/Login.php");
    }else{
        echo"Password not update";
    }
  }








?>