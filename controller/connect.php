<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/TASK/model/db_connect.php');
?>


<?php


class controller
{
    function shailendra()
    {
        header("location: ./view/welcome.php");
    }
}

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
}
else{
    header("location: ../view/Login.php");

}
}

if (isset($_POST['Login']))
{
   
    session_start();
    $em=$_POST['email'];
    $pas=$_POST['pass'];
//    echo "$em"."<br>";
//    echo "$pass"."<br>";
    
  
     $ins=new model();
     $res=$ins->fun1($em);
     $_SESSION["Firstname"] = $res[1];
     $_SESSION["Lastname"] = $res[2];
     $_SESSION["Email"] = $res[3];
     $_SESSION["Phn"] = $res[4];
    
     print_r ($res[1]);
     if($res[0]===$pas){
        header("location: ../view/Profile.php");  
 }
 else{
 echo "Password is wrong";
}
}






?>

