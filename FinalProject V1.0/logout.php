<?
	setcookie('strUsername',$username,time()-3600*24*365);
	setcookie('strPassword',$password,time()-3600*24*365);
	setcookie('strName',$name,time()-3600*24*365);
	setcookie('strLastname',$lastname,time()-3600*24*365);
	setcookie('strType',$type,time()-3600*24*365);
	header('location:index.php');
?>