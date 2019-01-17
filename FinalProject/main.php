<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<?php
//include "db.php";
include "db2.php";


$strSQL = "SELECT * FROM categories";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
?>

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
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                        </ons-toolbar-button>
                    </div>
                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                   
                    <ons-toolbar-button onclick="fn.pushPage({'id': 'show1.php', 'title': 'PullHook'})">
                            <ons-icon icon="ion-ios-cart" page="cart.html">
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
                <ons-tabbar swipeable id="appTabbar" position="auto">
                    <ons-tab page="home.html" active></ons-tab>
                </ons-tabbar>

                <script>
                    ons.getScriptPage().addEventListener('prechange', function (event) {
                        if (event.target.matches('#appTabbar')) {
                            event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
                        }
                    });
                </script>
            </ons-page>
        </template>



        <template id="sidemenu.html">
            <ons-page>
                <ons-list-title>เมนู</ons-list-title>
                <ons-list>
                    <ons-list-item onclick="fn.loadView(0)">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-home, material:md-home"></ons-icon>
                        </div>
                        <div class="center">
                            หน้าแรก
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.loadView(1)">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-speakerphone,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            โปรโมชัน
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.loadView(1)">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-log-in,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            เข้าสู่ระบบ
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.pushPage({'id': 'register.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            สมัครสมาชิก
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.pushPage({'id': 'insert_categories.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            เพิ่มประเภทอาหาร
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.pushPage({'id': 's.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            sssss
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    
                    <ons-list-item>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-pizza,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                        <div class="center">
                            ประเภทอาหาร
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-row>
                        <ons-col></ons-col>
                        <ons-col width="190px">
                            <ons-list-title onclick="fn.pushPage({'id': 'Food1.html', 'title': 'PullHook'})">
                                - อาหารจานเดียว
                            </ons-list-title>
                        </ons-col>
                    </ons-row>
                    <ons-row>
                        <ons-col></ons-col>
                        <ons-col width="190px">
                            <ons-list-title onclick="fn.pushPage({'id': 'Food2.html', 'title': 'PullHook'})">
                                - ต้ม / แกง
                            </ons-list-title>
                        </ons-col>
                    </ons-row>
                    <ons-row>
                        <ons-col></ons-col>
                        <ons-col width="190px">
                            <ons-list-title onclick="fn.pushPage({'id': 'Food3.html', 'title': 'PullHook'})">
                                - ทอด
                            </ons-list-title>
                        </ons-col>
                    </ons-row>
                    <ons-row>
                        <ons-col></ons-col>
                        <ons-col width="190px">
                            <ons-list-title onclick="fn.pushPage({'id': 'Food4.html', 'title': 'PullHook'})">
                                - ผัด
                            </ons-list-title>
                        </ons-col>
                    </ons-row>
                    <ons-list-item>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-power,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                        <div class="center">
                        <a class="btn btn-danger btn-lg" href="logout.php" role="button">ออกจากระบบ</a>
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                </ons-list>
                <script>
                    ons.getScriptPage().onInit = function () {
                        // Set ons-splitter-side animation
                        this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
                    };
                </script>

                <style>
                    .profile-pic {
                        width: 200px;
                        background-color: #fff;
                        margin: 20px auto 10px;
                        border: 1px solid #999;
                        border-radius: 4px;
                    }

                    .profile-pic>img {
                        display: block;
                        max-width: 100%;
                    }

                    ons-list-item {
                        color: #444;
                    }
                </style>
            </ons-page>
        </template>

        <template id="home.html">
            <ons-page>
            <?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
?>
                <ons-card id="ons-card" onclick="fn.pushPage({'id': 'Food1.html', 'title': 'PullHook'})">
                    <div class="title">
                       <?php echo $objResult["categories_name"];?>
                    </div>
                    <img id="foodimg" src="img/<?php echo $objResult["categories_img"];?>">
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

        </template>
            <template id="insert_categories.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>
                    <ons-card>
                    <div align ="center">
                        <h2>เพิ่มประเภทอาหาร</h2>
                    </div>
                    <br>
                    <form action="insert2.php" method="post" enctype="multipart/form-data" id="form1" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

                        <div class="form-group">
                            <label for="exampleInputCategories">ชื่อประเภทอาหาร</label>
                            <input name="categories_name" type="text" class="form-control" id="exampleInputCategories" aria-describedby="" placeholder="ชื่อประเภทอาหาร">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCategories">รูป</label>
                            <input name="categories_img" type="file">
                        </div>
                        
                        <div align ="center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </ons-card>
                </ons-page>
            </template>



         <template id="register.html">
        
        <ons-page id="tabbar-page">
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>Back</ons-back-button>
                </div>

                <div class="center">อยากกินต้องได้กิน</div>
                <div class="right">
                    <ons-toolbar-button onclick="fn.toggleMenu()">
                        <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                </div>
            </ons-toolbar>
        <ons-card>
        <div align ="center">
            <h2>สมัครสมาชิก</h2>
        </div>
         <form name="form1" method="post" action="register.php">
            <div class="form-group">
<label for="exampleInputEmail1">ชื่อผู้ใช้</label>
<input type="Username" class="form-control" id="Username" name="username" aria-describedby="emailHelp" placeholder="user_name">
</div>
<div class="form-group">
<label for="exampleInputPassword1">รหัสผ่าน</label>
<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
</div>

<div class="form-group">
<label for="exampleInputPassword1">เบอร์</label>
<input type="repassword" class="form-control" id="exampleInputPassword1" name="tel" placeholder="">
</div>

<div class="form-group">
<label for="exampleFormControlTextarea1">ที่อยู่จัดส่ง</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="area" rows="3"></textarea>
</div>



                    <div align ="center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </ons-card>
        </ons-page>
    </template>

        <template id="s.html">
            <ons-page id="tabbar-page">
            
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">ประเภทอาหาร</div>
                    </ons-toolbar>
                    
                
<?php
                include "db.php";
                $sql = "select * from categories";
                $result = mysqli_query($conn,$sql);
         ?>

    <ons-card>
    <div align ="center">
                        <h2>จัดการประเภทอาหาร</h2>
                    </div>
                    <br>
                <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                
                    <ons-list>
                            <ons-list-item>
                                <div class="left">
                                    <img class="list-item__thumbnail" width="95px" src="img/<?php echo $row['categories_img'];?>">
                                </div>
                                <div class="center">
                                    <span class="list-item__title">
                                       ประเภท : <?php echo $row['categories_name'];?>
                                    </span>
                                </div>
                                <div class="right">
                                    <a onclick="notify()" href="update_categories.php?categories_id=<?php echo $row['categories_id'];?>">
                                        <ons-icon fixed-width class="list-item__icon" icon="ion-hammer,ion-android"></ons-icon>
                                        
                                    </a>
                                    <a href="delete_categories.php?categories_id=<?php echo $row['categories_id'];?>">
                                        <ons-icon fixed-width class="list-item__icon" icon="ion-ios-trash,ion-android"></ons-icon>
                                    </a>

                                </div>
                               

                            </ons-list-item>
                        </ons-list>
     
                        <?php
                    }
                    ?>
                    </ons-card>
    
                        </ons-page>
        </template>
   



        <template id="Food1.html">
            <ons-page id="tabbar-page" class="red">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อาหารจานเดียว</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.pushPage({'id': 'show1.php', 'title': 'PullHook'})">
                            <ons-icon icon="ion-ios-cart" page="cart.html">
                            <span class="badge badge-pill badge-primary"><?php echo $_SESSION["strQty"][$i];?></span></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
<?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
?>
              
                <ons-card>
                    
                    <img id="foodimg" src="img/<?php echo $objResult["Picture"];?>">
                    <div class="center">

                        <span class="list-item__title">
                            <?php echo $objResult["ProductName"];?>
                        </span>
                        <p align="right">
                            <span class="list-item__subtitle">
                                <?php echo $objResult["Price"];?> บาท</span>
                        </p>
                        <a href="order.php?ProductID=<?php echo $objResult["ProductID"];?>">
                            <ons-button modifier="large" id="large" onclick="notify()">order</ons-button>
                            
                        </a>
                        
                    </div>
           
                    <script>

var notify = function() {
ons.notification.alert('เพิ่มสินค้าเรียบร้อย');

};

                        </script>
                </ons-card>
                    

<?php
  }
?>
            </ons-page>
        </template>


        <template id="show1.php">
            <ons-page>
                <ons-page id="tabbar-page">
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>

                        <div class="center">รายการของฉัน</div>
                        <div class="right">
                            <ons-toolbar-button onclick="fn.toggleMenu()">
                                <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                        </div>
                    </ons-toolbar>
                    

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
      $SumTotal2 = $SumTotal + 40;
  
?>

                        <ons-list>
                            <ons-list-item>
                                <div class="left">
                                    <img class="list-item__thumbnail" width="95px" src="img/<?php echo $objResult["Picture"];?>">
                                </div>
                                <div class="center">
                                    <span class="list-item__title">
                                        <?php echo $objResult["ProductName"];?>
                                    </span>
                                    <span class="list-item__subtitle">จำนวน
                                        <?php echo $_SESSION["strQty"][$i];?> รายการ ราคา
                                        <?php echo $Total;?> บาท </span>

                                </div>
                                <div class="right">
                                    <a onclick="notify()" href="delete.php?Line=<?=$i;?>">
                                        <ons-icon fixed-width class="list-item__icon" icon="ion-ios-trash,ion-android"></ons-icon>
                                    </a>
                                </div>
                            </ons-list-item>
                        </ons-list>
                        <script>

var notify = function() {
  ons.notification.alert('ลบสินค้าเรียบร้อยแล้ว');

};

                            </script>
<?php
    } 
}
}
?>
                            <ons-card>
                                <ons-list>
                                    <ons-list-item>
                                        <div class="center">
                                            <span class="list-item__title">
                                                <h3>ยอดรวม</h3>
                                            </span>
                                        </div>
                                    </ons-list-item>

                                    <ons-list-item>
                                        <div class="center">
                                            <span class="list-item__subtitle">ราคา </span>
                                        </div>
                                        <div class="right">
                                            <?php echo number_format($SumTotal,0);?>.-
                                            <br>
                                        </div>
                                    </ons-list-item>

                                    <ons-list-item>
                                        <div class="center">
                                            <span class="list-item__subtitle">ค่าจัดส่ง </span>
                                        </div>
                                        <div class="right">
                                            40.-
                                            <br>
                                        </div>
                                    </ons-list-item>

                                    <ons-list-item>
                                        <div class="center">
                                            <span class="list-item__subtitle">ราคาสุทธิ </span>
                                        </div>

                                        <div class="right">
                                            <?php echo number_format($SumTotal2,0);?>.-
                                            <br>
                                        </div>
                                    </ons-list-item>
                                </ons-list>
                            </ons-card>

                            <ons-button modifier="large" id="large" onclick="fn.pushPage({'id': 'newAddress.html', 'title': 'PullHook'})">ถัดไป</ons-button>
                            <br>
                            <a href="index.php">
                                <ons-button modifier="large" id="large">Go to Product</ons-button>
                            </a>
<?php
    if($SumTotal > 0)
    {
?>
    
 <?php
    }
?>
        </ons-page>
        </template>


    
    <template id="newAddress.html">
    <ons-page id="tabbar-page">
    <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center" onclick="fn.pushPage({'id': 'home.html', 'title': 'PullHook'})">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>
            <ons-card>
            <div align="center">
                <h3>ที่อยู่จัดส่ง<h3>
  <?php
$Total = 0;
$SumTotal = 0;
$SumTotal2 = 0;

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
          $SumTotal2 = $SumTotal + 40;
      }
    }
}
  ?>          

            <div id="paypal-button"></div>


            <script>
              ons.ready(function() {

                paypal.Button.render({

                    env: 'production', // Or 'sandbox'

                    client: {
                        sandbox:    'AU3zR5lxCFTXIkp0ocl0Zhek8XaUUYFhjkRTO-GG6FG6FV5rAGrq051GuGBbOYhjq-PAIlkgTmU_EAvK',
                        production: 'Abg-2jKY-9KyIDg7Vdk_DNvUzkvUrxyxqWDp5ottR_0kZRh3uZ-XVGEiWqK0sLyYXh-y8UPVMhCX7uaF'
                    },

                    commit: true, // Show a 'Pay Now' button

                    payment: function(data, actions) {
                        return actions.payment.create({
                            payment: {

                              "transactions": [
                              {
                                "amount": {
                                "total": "<?php echo $SumTotal2;?>",
                                "currency": "THB",
                                "details": {
                                  "subtotal": "<?php echo $SumTotal;?>",
                                  "shipping": "40.00",
                                }
                                },
                                "item_list": {
                                    "items": [
                                    <?php
                                    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                                    {

                                        if(isset ($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "")
                                        {

                                    $strSQL = "SELECT * FROM product WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ";
                                    $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
                                    $objResult = mysqli_fetch_array($objQuery);
                                    
                                    ?>
                                      {
                                      "name": "<?php echo $objResult["ProductName"];?>",
                                      "description": "<?php echo $objResult["ProductName"];?>",
                                      "quantity": "<?php echo $_SESSION['strQty'][$i];?>",
                                      "price": "<?php echo $objResult["Price"];?>",
                                      "currency": "THB"
                                      },
                                    <?php 
                                         }
                                    } 
                                    ?>
                                      
                                    ],

                                }
                              }
                              ],

                                // transactions: [
                                //     {
                                //         amount: { total: '<?php echo $SumTotal2;?>', currency: 'THB',     
                                //             "details": {
                                //                 "subtotal": "<?php echo $SumTotal;?>",
                                //                 "tax": "0",
                                //                 "shipping": "40",
                                //             }  
                                //         },
                                //         "item_list": {
                                //             "items": [
                                //                 {
                                //                   "name": "hat",
                                //                   "description": "Brown hat.",
                                //                   "quantity": "5",
                                //                   "price": '<?php echo $SumTotal;?>',
                                //                   "currency": "THB"
                                //                 },
                                //             ],
                                //         }
                                //     },

                                // ]
                            }
                        });
                    },

                    onAuthorize: function(data, actions) {
                        return actions.payment.execute().then(function(payment) {
                            ons.notification.alert('This dialog was created with ons.notification');

                            // The payment is complete!
                            // You can now show a confirmation message to the customer
                        });
                    }

                }, '#paypal-button');

            })
            </script>

<script>
    var notify = function() {
  ons.notification.alert('This dialog was created with ons.notification');
};
</script>
        </ons-page>
    </template>










        <template id="Address.html">
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center" onclick="fn.pushPage({'id': 'home.html', 'title': 'PullHook'})">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>
                <ons-card>
                    <ons-button modifier="large" id="medium">เข้าสู่ระบบเพื่อเลือกที่อยู่จัดส่ง</ons-button>
                </ons-card>

                <ons-card>
                    <h2>ที่อยู่จัดส่ง</h2>
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                    <div class="container">
                        <div class="row">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label">ชื่อ-สกุล</label>
                                        <div class="controls">
                                            <input id="full-name" name="full-name" type="text" placeholder="ชื่อ-สกุล" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- address-line1 input-->
                                    <div class="control-group">
                                        <label class="control-label">บ้านเลขที่</label>
                                        <div class="controls">
                                            <input id="address-line1" name="address-line1" type="text" placeholder="บ้านเลขที่" class="input-xlarge">
                                        </div>
                                    </div>
                                    <!-- address-line2 input-->
                                    <div class="control-group">
                                        <label class="control-label">หมู่</label>
                                        <div class="controls">
                                            <input id="address-line2" name="address-line2" type="text" placeholder="หมู่" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">ซอย</label>
                                        <div class="controls">
                                            <input id="address-line2" name="address-line2" type="text" placeholder="ซอย" class="input-xlarge">
                                        </div>
                                    </div>
                                    <!-- city input-->
                                    <div class="control-group">
                                        <label class="control-label">ถนน</label>
                                        <div class="controls">
                                            <input id="city" name="city" type="text" placeholder="ถนน" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- region input-->
                                    <div class="control-group">
                                        <label class="control-label">ตำบล</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="ตำบล" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">อำเภอ</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="อำเภอ" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- postal-code input-->
                                    <div class="control-group">
                                        <label class="control-label">จังหวัด</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="จังหวัด" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">รหัสไปรษณีย์</label>
                                        <div class="controls">
                                            <input id="postal-code" name="postal-code" type="text" placeholder="รหัสไปรษณีย์" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </fieldset>
                                <p align="center">
                                    <ons-button>ตกลง</ons-button>
                                    <ons-button>ยกเลิก</ons-button>
                                </p>
                            </form>
                        </div>
                    </div>
                </ons-card>
            </ons-page>
        </template>

        <template id="promotion.html">
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center" onclick="fn.pushPage({'id': 'home.html', 'title': 'PullHook'})">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>
                <ons-card>
                    <ons-button modifier="large" id="medium">เข้าสู่ระบบเพื่อเลือกที่อยู่จัดส่ง</ons-button>
                </ons-card>

                <ons-card>
                    <h2>ที่อยู่จัดส่ง</h2>
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
                    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                    <div class="container">
                        <div class="row">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label">ชื่อ-สกุล</label>
                                        <div class="controls">
                                            <input id="full-name" name="full-name" type="text" placeholder="ชื่อ-สกุล" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- address-line1 input-->
                                    <div class="control-group">
                                        <label class="control-label">บ้านเลขที่</label>
                                        <div class="controls">
                                            <input id="address-line1" name="address-line1" type="text" placeholder="บ้านเลขที่" class="input-xlarge">
                                        </div>
                                    </div>
                                    <!-- address-line2 input-->
                                    <div class="control-group">
                                        <label class="control-label">หมู่</label>
                                        <div class="controls">
                                            <input id="address-line2" name="address-line2" type="text" placeholder="หมู่" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">ซอย</label>
                                        <div class="controls">
                                            <input id="address-line2" name="address-line2" type="text" placeholder="ซอย" class="input-xlarge">
                                        </div>
                                    </div>
                                    <!-- city input-->
                                    <div class="control-group">
                                        <label class="control-label">ถนน</label>
                                        <div class="controls">
                                            <input id="city" name="city" type="text" placeholder="ถนน" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- region input-->
                                    <div class="control-group">
                                        <label class="control-label">ตำบล</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="ตำบล" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">อำเภอ</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="อำเภอ" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- postal-code input-->
                                    <div class="control-group">
                                        <label class="control-label">จังหวัด</label>
                                        <div class="controls">
                                            <input id="region" name="region" type="text" placeholder="จังหวัด" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">รหัสไปรษณีย์</label>
                                        <div class="controls">
                                            <input id="postal-code" name="postal-code" type="text" placeholder="รหัสไปรษณีย์" class="input-xlarge">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </fieldset>
                                <p align="center">
                                    <ons-button>ตกลง</ons-button>
                                    <ons-button>ยกเลิก</ons-button>
                                </p>
                            </form>
                        </div>
                    </div>
                </ons-card>
            </ons-page>
        </template>

        <script>
            ons.getScriptPage().onInit = function () {
                // Set ons-splitter-side animation
                this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
            };
        </script>

        <style>
            .profile-pic {
                width: 200px;
                background-color: #fff;
                margin: 20px auto 10px;
                border: 1px solid #999;
                border-radius: 4px;
            }

            .profile-pic>img {
                display: block;
                max-width: 100%;
            }

            ons-list-item {
                color: #444;
            }
        </style>
        </ons-page>
        </template>
        <link rel="stylesheet" href="css-components-src\src\theme.css" />

        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
    </body>

</html>