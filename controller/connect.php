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

         $pic_name=$_FILES['pic']['name'];
         $tmp_loc=$_FILES['pic']['tmp_name'];
         $folder="../image/".$pic_name;
         move_uploaded_file($tmp_loc,$folder);

         $ins=new model();
         $u_check=$ins->user_exist($em);
         if($u_check===0){
           $res= $ins->insert_user_data($Fn,$ln,$em,$pass, $phn,$folder);
         
            if($res=='Register'){
          header("location: ../view/Login.php");
           }else{
            header("location: ../view/welcome.php");
          }
    }else{
        exit('User already exist');
    }
         
         
}
}


// Function calling for Login user

if (isset($_POST['Login']))
{
    session_start();
    $em=$_POST['email'];
    $pas=$_POST['pass'];  
     $ins=new model();
     $u_check=$ins->user_exist($em);
     if($u_check===1){
        $res=$ins->login_user($em);
        $_SESSION["Firstname"] = $res[1];
        $_SESSION["Lastname"] = $res[2];
        $_SESSION["Email"] = $res[3];
        $_SESSION["Phn"] = $res[4];
        $_SESSION["img"] = $res[5];
        if($res[0]===$pas){
           header("location: ../view/Profile.php");  
    }
    else{
    echo "Password is wrong";
   }
}else{
    exit('This email is not registered.');
}
    
}

// Function calling for User data update

if( isset($_POST["profile_update"])){
    $Fn=$_POST['F_name'];
    $ln=$_POST['L_name'];
    $phn=$_POST['phn'];
    session_start();
    $ins=new model();   
    $res= $ins->update_data($Fn,$ln, $phn,$_SESSION["Email"]);
    $_SESSION["Firstname"] = $res[1];
    $_SESSION["Lastname"] = $res[2];
    $_SESSION["Phn"] = $res[4];
    if($res=='no'){
        Echo"Data not Updated";
        
    }else{
        header("location: ../view/Profile.php");
        
    }


  }

  if( isset($_POST["pic_update"])){
    $pic_name=$_FILES['pic']['name'];
    $tmp_loc=$_FILES['pic']['tmp_name'];
    $folder="../image/".$pic_name;
    move_uploaded_file($tmp_loc,$folder);
    session_start();
    $ins=new model();   
    $res= $ins->update_img($folder,$_SESSION["Email"]);
    $_SESSION["img"] = $res[5];
    if($res=='no'){
        Echo"Image not Updated";
        
    }else{
        header("location: ../view/Profile.php");
        
    }


}

//Function calling for user password update 

  if( isset($_POST["Update_pass"])){
    $pass=$_POST['pass'];
    $cpass=$_POST['pass1'];
    // echo "$pass ";
    session_start();
    $ins=new model();
    if($pass==$cpass){
    $res=$ins->update_password($pass,$_SESSION["Email"]);
    session_unset();
    session_destroy();
    if($res=='update'){
        
        if(!isset($_SESSION['Email'])){
            header("location: ../view/Login.php");
        }
       
    }else{
        echo"Password not update";
    }
}else{
    exit('Password not match');
}
}



?>