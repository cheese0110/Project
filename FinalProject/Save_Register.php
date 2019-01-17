<?php
include "db2.php";

if(trim($_POST["Username"]) == "")

{

echo "Please input Username!";

exit();

}

 

if(trim($_POST["Password"]) == "")

{

echo "Please input Password!";

exit();

}  
if(trim($_POST["ConfirmPassword"]) == "")

{

echo "Please input Password!";

exit();

}  
 

if($_POST["Password"] != $_POST["ConfirmPassword"])

{

echo "Password not Match!";

exit();

}

if(trim($_POST["Tel"]) == "")

{

echo "Please input Tel!";

exit();

}
 

$strSQL = "SELECT * FROM Register WHERE Username = '".trim($_POST['Username'])."' ";

$objQuery = mysql_query($strSQL);

$objResult = mysql_fetch_array($objQuery);

if($objResult)

{

echo "Username already exists!";

}

else

{  
$strSQL = "INSERT INTO Register (Username,Password,ConfirmPassword,Tel,Area) VALUES ('".$_POST["Username"]."',

'".$_POST["Password"]."','".$_POST["ConfirmPassword"]."','".$_POST["Tel"]."','".$_POST["Area"]."')";

$objQuery = mysql_query($strSQL);

 

echo "Register Completed!<br>";      

echo "<br> Go to <a href='index.php'>Login page</a>";
}
mysql_close();
?>