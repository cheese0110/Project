<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];

	if($_SESSION['strQty'][$Line] > 1) {
		$_SESSION["strQty"][$Line] = $_SESSION["strQty"][$Line] - 1;
	} else {
		$_SESSION["strProductID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}
	
	header("location:index.php");
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>