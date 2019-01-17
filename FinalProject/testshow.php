<!DOCTYPE html>
<?php
ob_start();
session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
</head>
<?php
$conn = mysqli_connect("localhost","root","","mydatabase");

$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
?>
<body>

<?php

  $Total = 0;
  $SumTotal = 0;
	$_SESSION["intLine"] = isset($_SESSION["intLine"]) ? $_SESSION["intLine"] : '';
	if($_SESSION["intLine"] != ''){
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if(isset ($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
		$objResult = mysqli_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["Price"];
        $SumTotal = $SumTotal + $Total;
?>

  <ons-toolbar>
    <div class="center">Lists</div>
  </ons-toolbar>

<ons-list>
<ons-list-item>
  <div class="left">
  <img class="list-item__thumbnail" src="img/<?php echo $objResult["Picture"];?>">
  </div>        
  <div class="center">
    <span class="list-item__title"><?php echo $objResult["ProductName"];?></span>
    <span class="list-item__subtitle">ราคา <?php echo $objResult["Price"];?></span>
  </div>
  <div class="right">
    <a href="delete.php?Line=<?=$i;?>"><ons-button>ลบ</ons-button></a>
  </div>
  </ons-list-item>
    </ons-list>
<?php
    }
}
}
?>

Sum Total <?php echo number_format($SumTotal,2);?>
<br><br><a href="index.php">Go to Product</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php">CheckOut</a>
<?php
	}
?>

<?php
mysqli_close($conn);
?>


</body>
</html>


