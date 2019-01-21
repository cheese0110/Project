<meta charset="UTF-8">
<?php
    include "db2.php";
if(isset($_GET["action"]))
    {
        if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:index.php?clearall=1");
 }
    }
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

                    <div class="center">แจ้งการทำรายการ</div>
                    
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
                    
                    <div align ="center">
                        <h2>ชำระเงินเรียบร้อย</h2>
                    </div>
                            
<? 
 include "db2.php";

                
                $names = $_COOKIE["name"];
                $lastname = $_COOKIE["lastname"];
                $tel = $_COOKIE["tel"];
                $address = $_COOKIE["address"];
                $tax = 40;
                $total2 = 0;
                $d = $_COOKIE['strDate'];
                $status ;
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $keys => $values)
                
                
    
                                                   
                                                        
                                                        
                                                        $sql3 = "SELECT max(order_id) as order_id FROM orders WHERE name='$names'";
                                                        $query3 = mysqli_query($conn, $sql3);
                                                        $row3 = mysqli_fetch_array($query3);

                                                        $sql4 = "SELECT max(date) as date FROM orders  WHERE name='$names'";
                                                        $query4 = mysqli_query($conn, $sql4);
                                                        $row4 = mysqli_fetch_array($query4);
                                                        $d = $row4['date'];
                                                        
                                                       
                                                        
                                                        echo "เลขที่ใบเสร็จ : ".$row3['order_id'].'<br>';
                                                        echo "ชือ : ".$names." &emsp;&emsp;&emsp;&emsp;นามสกุล : ".$lastname.'<br>';
                                                       
                                                        echo "เบอร์โทรศัพท์ : ".$tel.'<br>'; 
                                                        echo "ที่อยู่: ".$address.'<br>'; 
                                                        echo "เวลาสั่งซื้อ : ".$d.'<br>';
                                                        echo '<br>';
                                                        echo "<b><center><h5>รายการสั่งซื้อ</h5></center></b>";

                                                        if(isset($_COOKIE["shopping_cart"]))
                                                        {
                                                            $total =0;
                                                            $tax = 40;
                                                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                                            $cart_data = json_decode($cookie_data, true);
                                                            foreach($cart_data as $keys => $values)
                                                            {
                                                        echo "ชื่อรายการ : ".$values['item_name'].'<br>';
                                                        echo "ราคา : ".$values['item_price']." บาท"."&emsp;&emsp;&emsp;&emsp;จำนวน : ".$values['item_quantity'].'<br>';
                                                       
                                                        echo "รวมราคา : ".$values['item_price']*$values['item_quantity']." บาท".'<br>';
                                                        echo '<br>';
                                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                        $total2 = $total + $tax;
                                                        
                                                        }}
                                                        
                                                        echo "ค่าจัดส่ง : ".$tax." บาท".'<br>';
                                                        echo "<p align=right>";
                                                        echo "รวมทั้งสิ้น : ".$total2." บาท".'<br>';
                                                        echo "</p>";

                                                        
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