<meta charset="UTF-8">
<?php
    include "db2.php";
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
    <? 
    $a = $_GET["search"];
    $total=0;
    $tax=0;


        $sql = "SELECT * FROM orders  WHERE order_id = '$a' OR name = '$a' OR lastname = '$a'";
        $query = mysqli_query($conn, $sql);
        if($query->num_rows == 0){
            echo "ไม่พบรายการที่ค้นหา";
        }
        else
        {
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <ons-card onclick="fn.pushPage({'id': '<?php echo $row["order_id"];?>.html', 'title': 'PullHook'})">
        <div class="row">
    <div class="col-xs-6 col-sm-4 col-md-5 col-lg-7"><? echo "เลขที่ใบเสร็จ : ".$row['order_id'];?></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><? echo "ชื่อ : ".$row['name'];?> <? echo "นามสกุล : ".$row['lastname'];?></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><? echo "สถานะ : ".$row['status'];?></div>
</div>
        </ons-card>
        <?
        }
        }
        ?>          
                </ons-page>
            </template>
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
</body>
</html>