<meta charset="UTF-8">
<?
include('db2.php');


$username = $_POST['username'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$address = $_POST['address'];


$sql = "SELECT * FROM register 
        WHERE username='$username'
        And password = '$password'
        ";

$result = $conn->query($sql);
$row = $result->fetch_object();
$num_rows = mysqli_num_rows($result);
$type = $row->type ;

if(empty($num_rows)) 
{
   ?>

<script language="JavaScript">
        alert("Username หรือ password ไม่ถูกต้อง!!!");
        window.location.href = "index.php";
       </script>
<?php
}else{
    setcookie('strName',$row->name,time()+3600*24*365);
    setcookie('strLastname',$row->lastname,time()+3600*24*365);
    setcookie('strUsername',$username,time()+3600*24*365);
    setcookie('strPassword',$password,time()+3600*24*365);
    setcookie('strType',$type,time()+3600*24*365);
    setcookie('strImg',$row->user_img,time()+3600*24*365);
    setcookie('strTel',$row->tel,time()+3600*24*365);
    setcookie('strAddress',$row->address,time()+3600*24*365);
    header("location:index.php");

}


?>
