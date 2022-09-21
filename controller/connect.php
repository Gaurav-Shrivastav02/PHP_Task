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
        $cpass=$_POST['cpass'];
       
        $phn=$_POST['phn'];

         $pic_name=$_FILES['pic']['name'];
         $tmp_loc=$_FILES['pic']['tmp_name'];
         $folder="../image/".$pic_name;
         move_uploaded_file($tmp_loc,$folder);
         
         $ins=new model();
         $u_check=$ins->user_exist($em);
         if($u_check===0){
            if($pass==$cpass){
                if($_FILES['pic']['size']== 0){
                    $folder="../image/default.jpg";
                }
           $res= $ins->insert_user_data($Fn,$ln,$em,$pass, $phn,$folder);
         
            if($res=='Register'){
                session_start();
                $_SESSION['message']='User Registered successfully';
                header("location: ../view/Register.php");
          
           }else{

            header("location: ../view/Register.php");
           
          }
        }else{
            session_start();
            $_SESSION['message']='Password not match';
            header("location: ../view/Register.php");
        }
    }else{
        session_start();
        $_SESSION['message']='Email already Exist';
        header("location: ../view/Register.php");
    }
         
         
}
}


// Function calling for Login user

if (isset($_POST['Login']))
{
    
    $em=$_POST['email'];
    $pas=$_POST['pass'];  
     $ins=new model();
     $u_check=$ins->user_exist($em);
     if($u_check===1){
        $res=$ins->login_user($em);
       
        if($res[0] === $pas){
            session_start();
            $_SESSION["Firstname"] = $res[1];
            $_SESSION["Lastname"] = $res[2];
            $_SESSION["Email"] = $res[3];
            $_SESSION["Phn"] = $res[4];
            $_SESSION["img"] = $res[5];
            $_SESSION['message']='Logged in Successfully.';
             header("location: ../view/Profile.php");  
            }
    else{
        session_start();
        $_SESSION['message']='Password is wrong.';
           header("location: ../view/Login.php");
      
   }
}else{
    session_start();
    $_SESSION['message']='This email is not registered.';
    header("location: ../view/Login.php");
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
        session_start();
        $_SESSION['message']='User Details Update successfully.';
        header("location: ../view/Edit_user_detail.php");
        
    }


  }

  if( isset($_POST["pic_update"])){
    $pic_name=$_FILES['pic']['name'];
    $tmp_loc=$_FILES['pic']['tmp_name'];
    $folder="../image/".$pic_name;
    move_uploaded_file($tmp_loc,$folder);
    session_start();
    $ins=new model(); 
    if($_FILES['pic']['size']== 0){
        header("location: ../view/Profile.php");
    } else{
        $res= $ins->update_img($folder,$_SESSION["Email"]);
    $_SESSION["img"] = $res[5];
    if($res=='no'){
        Echo"Image not Updated";
        
    }else{
        session_start();
        $_SESSION['message']='User Image Update successfully.';
        header("location: ../view/Edit_user_detail.php");
        
    }
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
            session_start();
            $_SESSION['message']='Password Update successfully. Please Login again.';
            header("location: ../view/Login.php");
        }
       
    }else{
        echo"Password not update";
    }
}else{
    session_start();
    $_SESSION['message']='Both Password not matched.';
    header("location: ../view/change_user_password.php");
}
}

if(isset($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("location: ../view/Login.php");
}



?>