<meta charset="UTF-8">
<?php
    include "db2.php";
    $a = $_GET["search"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> -->
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
                    <div class="left">
                    <a href="index.php?action=clear">
                        <ons-back-button></ons-back-button>
                    </a>
                    </div>

                    <div class="center"></div>
                    
                    </div>
               
                <ons-tabbar swipeable id="appTabbar" position="auto">
                    <ons-tab page="home.html" active></ons-tab>
                </ons-tabbar>
            </ons-page>
        </template>
        <template id="home.html">
<?
        
        $strSQL = "SELECT * FROM orders WHERE order_id = '$a' OR name = '$a' OR lastname = '$a'";
        $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
        ?>
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                    <a href="index.php">
                        <ons-back-button>Back</ons-back-button>
                    </a>
                    </div>

                    <div class="center">ตรวจสอบเลขที่ใบเสร็จ</div>
                    <div class="right">
                        <ons-toolbar-button>
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
            <?php
             if($objQuery->num_rows == 0){
            echo "ไม่พบรายการที่ค้นหา";
        }
            while($objResult = mysqli_fetch_array($objQuery))
            {
            ?>
                <ons-card onclick="fn.pushPage({'id': '<?php echo $objResult['order_id'];?>.html', 'title': 'PullHook'})">
                    <div class="row">
    <div class="col-xs-6 col-sm-4 col-md-5 col-lg-7"><? echo "เลขที่ใบเสร็จ : ".$objResult['order_id'];?></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><? echo "ชื่อ : ".$objResult['name'];?> <? echo "นามสกุล : ".$objResult['lastname'];?></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><? echo "สถานะ : ".$objResult['status'];?></div>
</div>
                </ons-card>

            <?php
            }
            ?>
            </ons-page>
        </template>

<?php
include "db2.php";

        $strSQL = "SELECT * FROM orders WHERE order_id = '$a' OR name = '$a' OR lastname = '$a'";
        $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
        while($objResult = mysqli_fetch_array($objQuery)) {
        ?>
        <template id="<?php echo $objResult['order_id'];?>.html">
        <?php

$strSQLmenu = "SELECT * FROM order_detail WHERE order_id = '".$objResult['order_id']."' ";
$objQuerymenu = mysqli_query($conn, $strSQLmenu)  or die(mysqli_error($conn));
$total = 0;
$tax = 40;
?>
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </a>
                    </div>

                    <div class="center">ตรวจสอบเลขที่ใบเสร็จ</div>
                    <div class="right">
                        <ons-toolbar-button>
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
                <ons-card>
                    <div align="center">
                        <div class="row">
                        <div class="col-12"><h5><? echo "เลขที่ใบเสร็จ  ".$objResult['order_id'];?></h5></div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-5 col-lg-7"><? echo "เวลาสั่งซื้อ  ".$objResult['date'];?></div>
                    </div>
<?php
  while($objMenu = mysqli_fetch_array($objQuerymenu))
  {
  ?>

    <div class="row">
        <div class="col-8"><? echo "ชื่อเมนู : ".$objMenu['order_name'];?></div>
        <div class="col-4"><? echo "จำนวน : ".$objMenu['quantity'];?></div>
    </div>
    <div class="row">
        <div class="col-8"><? echo "ราคา : ".$objMenu['price'];?> บาท</div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-8"><? echo "ราคารวม : ".$objMenu['total'];?> บาท</div>
    </div>
    <br>
<?
$total = $total + $objMenu['total'];
$total2 = $total + $tax;
}
?>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-5"><? echo "ค่าจัดส่ง ".$tax;?> บาท</div>
        <div class="col-5"><? echo "รวมทั้งสิ้น ".$total2;?> บาท</div>
    </div>
  </ons-card>
</ons-page>

        </template>

        <?php } ?> 
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
</body>
</html>