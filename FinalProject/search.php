<meta charset="UTF-8">
<?php
    include "db2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    </head>
</head>
<body>
<ons-navigator id="appNavigator" swipeable swipe-target-width="350px">
            <ons-page>
                <ons-splitter id="appSplitter">
                    <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>

                    <ons-splitter-content page="tabbar.html"></ons-splitter-content>

                </ons-splitter>

            </ons-page>
        </ons-navigator>

        <template id="tabbar.html">
            <ons-page id="tabbar-page">
            <ons-toolbar>
                    <div class="left">
                    <a href="index.php?action=clear">
                        <ons-back-button>Home</ons-back-button>
                    </a>
                    </div>

                    <div class="center">ตรวจสอบเลขที่ใบเสร็จ</div>
                    
                    </div>
                </ons-toolbar>
                <ons-tabbar swipeable id="appTabbar" position="auto">
                    <ons-tab page="home.html" active></ons-tab>
                </ons-tabbar>
            </ons-page>
        </template>
<template id="home.html">
    
                <ons-page>
                    
                    <ons-card>
                    
                    
                            
<? 
    $a = $_GET["search"];
    $total=0;
    $tax=0;

        $sql = "SELECT * FROM order_detail where order_id like\"".$a."\"";
        $query = mysqli_query($conn, $sql);
        $sql2 = "SELECT * FROM orders where order_id like\"".$a."\"";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($query2);
      /*  $sql = "SELECT orders.order_id , order_detail.ord_id , order_detail.order_name FROM orders,order_detail  WHERE orders.order_id=order_detail.ord_id"; */
        
        if($query->num_rows ==0) {
    echo "ไม่มีเลขที่ใบเสร็จนี้";
  } else {
    ?>
    <div align="center">        
       <h5>เลขที่ใบเสร็จ <? echo $a; ?></h5>
    </div>
    <div class="row">
        <div class="col-10">
        <b>เวลาสั่ง : <? echo $row2['date'];?></b>
        </div> 
        <div class="col-2">
        </div>
    </div>
    <div class="row">
        <div class="col-10">
        <b>สถานะ : <? echo $row2['status'];?></b>
        </div> 
        <div class="col-2">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
        <b>จำนวน</b>
        </div> 
        <div class="col-6">
        <b>รายการอาหาร</b>
        </div>  
        <div class="col-3">
        <b>ราคา</b>
        </div>
    </div>
    <?
    while($row = mysqli_fetch_array($query))
    {
        ?>
        <div class="row">
        <div class="col-3">
        <? echo $row['quantity'];?>
        </div>
        <div class="col-6">
        <? echo $row['order_name'];?>
        </div>
        <div class="col-3">
        <? echo $row['price'];?>
        </div>
        </div>
    </div>
    <div class="row">
         <div class="col-2">
        </div>
         <div class="col-6">
        </div>
        <div class="col-4">
        <? echo '(',$row['quantity'],'*',$row['price'],')',$row['total'];?>
        </div>
        </div>
    </div> 
   <?
    $total = $total + ($row["quantity"] * $row["price"]);
}
?>
<br>
   <div class="row">
         <div class="col-6">
        </div>
        <div class="col-6">
        <?echo 'รวมราคา ',$total,' บาท';?>
        </div>
        </div>
    </div> 
<?
}
?>
            
                    </ons-card>
                </ons-page>
            </template>
            
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
</body>
</html>

<meta charset="UTF-8">
<script language="JavaScript">