<?php
    include "db2.php";


$strSQL = "SELECT * FROM Register WHERE user_name= '".mysql_real_escape_string($_POST['txtUsername'])."'

and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";

$objQuery = mysql_query($strSQL);

$objResult = mysql_fetch_array($objQuery);

if(!$objResult)

{

echo "Username and Password Incorrect!";

}

else
{

$_SESSION["User_ID"] = $objResult["User_ID"];

$_SESSION["Status"] = $objResult["Status"];

 

session_write_close();

 

if($objResult["Status"] == "ADMIN")

{

header("location:index.php");

}

else

{

header("location:index.php");

}

}

mysql_close();

?>