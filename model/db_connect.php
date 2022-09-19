<?php
class model{
private $host='localhost';
private $user='gaurav';
private $password='password';
private $db_name='db1';

//Function for connection

function db_conn()
{
    $conn=new mysqli($this ->host,$this ->user,$this ->password,$this ->db_name);
        if($conn){
            //echo"Connection success.<br>";
            return $conn;
        }

}


//function for existing user
function user_exist($em){
    $conn=$this->db_conn();
    $sql= "SELECT * FROM  `userlogin` WHERE `Email`='$em' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    mysqli_close($conn);
         return $num; 
}

//Function for inserting data

function insert_user_data($Fn,$ln,$em,$pass,$phn,$fld)
{ 
    $conn=$this->db_conn();
    $sql="INSERT INTO `userlogin` (`F_name`, `L_name`, `Email`, `pass`, `phn`,`img`) VALUES ( '$Fn', '$ln', '$em', '$pass', '$phn','$fld')";
    if(mysqli_query($conn,$sql)==TRUE){
        mysqli_close($conn);
        return 'Register';
    }else{
       echo "Error".mysqli_error($conn);
       mysqli_close($conn);
     }

}

//Function for login

function login_user($em)
{ 
    $conn=$this->db_conn();
    $sql= "SELECT * FROM  `userlogin` WHERE `Email`='$em' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
      if($num==1){
        $row = $result->fetch_assoc();
        $arr=array($row["pass"],$row["F_name"],$row["L_name"],$row['Email'],$row['phn'],$row['img']);
        mysqli_close($conn);
        return $arr;
         
     }
     mysqli_close($conn);
    return 'no';   
}

//Function for updating user data

function update_data($Fn,$ln,$phn,$em){
    // echo "$fld";
    $conn=$this->db_conn();
    $sql="UPDATE `userlogin` SET `F_name`='$Fn',`L_name`='$ln',`phn`='$phn' WHERE `Email`='$em'";
    $result=mysqli_query($conn,$sql);
    if($result==TRUE){
      
       $res=$this->login_user($em);
        mysqli_close($conn);
        return $res;
    }else{
        die("connection failed".$conn->connect_error);
        mysqli_close($conn);
        return 'no';
       
    }
}

function update_img($fld,$em){
    // echo "$fld";
    $conn=$this->db_conn();
    $sql="UPDATE `userlogin` SET `img`='$fld' WHERE `Email`='$em'";
    $result=mysqli_query($conn,$sql);
    if($result==TRUE){
      
       $res=$this->login_user($em);
        mysqli_close($conn);
        return $res;
    }else{
        die("connection failed".$conn->connect_error);
        mysqli_close($conn);
        return 'no';
       
    }
}

//Function for updating password

function update_password($pass,$email){
    $conn=$this->db_conn();
    $sql="UPDATE `userlogin` SET `pass`='$pass' WHERE `Email`='$email'";
    $result=mysqli_query($conn,$sql);
    if($result==TRUE){
        mysqli_close($conn);
        return 'update';
    }else{
        mysqli_close($conn);
        return 'no';
    }
}



}
 


?>