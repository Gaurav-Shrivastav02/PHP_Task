<?php
class model{
private $host='localhost';
private $user='gaurav';
private $password='password';
private $db_name='db1';


function db_conn()
{
    $conn=new mysqli($this ->host,$this ->user,$this ->password,$this ->db_name);
        if($conn){
            echo"Connection success.<br>";
            return $conn;
        }

}
function insert_user_data($Fn,$ln,$em,$pass,$phn)
{ 
    $conn=$this->db_conn();
    $sql="INSERT INTO `userlogin` (`F_name`, `L_name`, `Email`, `pass`, `phn`) VALUES ( '$Fn', '$ln', '$em', '$pass', '$phn')";
    if(mysqli_query($conn,$sql)==TRUE){
        mysqli_close($conn);
        return 'login';
    }else{
       echo "Error".mysqli_error($conn);
       mysqli_close($conn);
     }

}


function fun1($em)
{ 
    $conn=$this->db_conn();
    $sql= "SELECT * FROM  `userlogin` WHERE `Email`='$em' ";
    // $result = $conn->query($sql);
    // $num=$result->num_rows;
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    //echo"$num <br>";
    
    if($num==1){
        $row = $result->fetch_assoc();
       //echo $row["F_name"].$row["pass"];
        // return $row['pass','F_name'];
        $arr=array($row["pass"],$row["F_name"],$row["L_name"],$row['Email'],$row['phn']);
        //print_r($arr);
        mysqli_close($conn);
        return $arr;
         
     }
     mysqli_close($conn);
    return 'no';   
}


function update_data($Fn,$ln,$em,$phn){
    $conn=$this->db_conn();
    $sql="UPDATE `userlogin` SET `F_name`='$Fn',`L_name`='$ln',`Email`='$em',`phn`='$phn' WHERE `Email`='$em'";
    $result=mysqli_query($conn,$sql);
    //die("connection failed".$conn->connect_error);
    // $num=mysqli_num_rows($result);
    // //echo"$num <br>";
    
    // if($num==1){
    //     $row = $result->fetch_assoc();
    //    //echo $row["F_name"].$row["pass"];
    //     // return $row['pass','F_name'];
    //     $arr=array($row["F_name"],$row["L_name"],$row['Email'],$row['phn']);
    //     //print_r($arr);
    //     mysqli_close($conn);
    //     return $arr;
         
    //  }
    //  mysqli_close($conn);
    // return 'no';
    if($result==TRUE){
        // die("connection failed".$conn->connect_error);
       $res=$this->fun1($em);
        // die("connection failed".$conn->connect_error);
        mysqli_close($conn);
        return $res;
    }else{
        echo "sdfghj";
        die("connection failed".$conn->connect_error);
        //return 'no';
       
    }
}



}
 


?>