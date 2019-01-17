<!DOCTYPE html>
<?php
//session_start();
//session_destroy();
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
</head>

<?php
include "db2.php";

$strSQL = "SELECT * FROM menu";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
?>

<body>

        <ons-page>
        <ons-toolbar>
                    <div class="left">
                        <ons-back-button onclick="goHome()">Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.pushPage({'id': 'show1.php', 'title': 'PullHook'})">
                            <ons-icon icon="ion-ios-cart" page="cart.html">
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
<?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
  ?>
<ons-card>
      <img id="foodimg" src="img/<?php echo $objResult["menu_img"];?>">

                <div class="center">
                    <span class="list-item__title"><?php echo $objResult["menu_name"];?></span>
                    <p align="right">
                        <span class="list-item__subtitle"><?php echo $objResult["price"];?></span>
                    </p>
                    <ons-button modifier="large" id="large" onclick="fn.pushPage({'id': 'Address.html', 'title': 'PullHook'})">หยิบใส่ตะกร้า</ons-button>
                </div>
                </div>
            </ons-card>
<style>
                    .intro {
                        text-align: center;
                        padding: 0 20px;
                        margin-top: 40px;
                    }

                    ons-card {
                        cursor: pointer;
                        color: #333;
                    }

                    .card__title,
                    .card--material__title {
                        font-size: 20px;
                    }
                </style>
                
<?php
  }
  ?>
</ons-page>

   <link rel="stylesheet" href="css-components-src\src\theme.css" />

        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
        <script>
                  function goHome() {
  window.location.href = 'index.php';

}
                </script>
    </body>

</html>