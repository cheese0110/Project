<!DOCTYPE html>
<?php
//session_start();
//session_destroy();
?>
<?php
ob_start();
session_start();
?>

<html lang="en">
<?php
$conn = mysqli_connect("localhost","root","","mydatabase");

$strSQL = "SELECT * FROM product";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
?>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
        <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

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
                            <ons-icon icon="ion-ios-cart" page="cart.html" badge="7"></ons-icon>
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
                    <ons-list-item onclick="fn.loadView(1)">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            สมัครสมาชิก
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
                    <ons-list-item onclick="fn.loadView(2)">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-power,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                        <div class="center">
                            ออกจากระบบ
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
                <ons-card id="ons-card" onclick="fn.pushPage({'id': 'Food1.html', 'title': 'PullHook'})">
                    <div class="title">
                        <b> ประเภท : </b> อาหารจานเดียว
                    </div>
                    <img id="foodimg" src="https://storage.googleapis.com/kruamaiporn-147803.appspot.com/2016/10/%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%9E%E0%B8%A3%E0%B8%B2%E0%B8%AB%E0%B8%A1%E0%B8%B9%E0%B9%84%E0%B8%82%E0%B9%88%E0%B8%94%E0%B8%B2%E0%B8%A7.png">
                </ons-card>
                <ons-card onclick="fn.pushPage({'id': 'Food2.html', 'title': 'PullHook'})">
                    <div class="title">
                        <b> ประเภท : </b> ต้ม/แกง
                    </div>
                    <img id="foodimg" src="http://เมนู.net/media/images/recipe/%E0%B8%95%E0%B9%89%E0%B8%A1%E0%B8%88%E0%B8%B7%E0%B8%94%E0%B8%9F%E0%B8%B1%E0%B8%81%E0%B9%80%E0%B8%95%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%B9%E0%B9%89%E0%B9%84%E0%B8%82%E0%B9%88%E0%B8%AB%E0%B8%A1%E0%B8%B9%E0%B8%AA%E0%B8%B1%E0%B8%9A.jpg">
                </ons-card>
                <ons-card onclick="fn.pushPage({'id': 'Food3.html', 'title': 'PullHook'})">
                    <div class="title">
                        <b> ประเภท : </b> ทอด
                    </div>
                    <img id="foodimg" src="https://sittichok105.files.wordpress.com/2014/01/fried.jpg">
                </ons-card>
                <ons-card onclick="fn.pushPage({'id': 'Food4.html', 'title': 'PullHook'})">
                    <div class="title">
                        <b> ประเภท : </b> ผัด
                    </div>
                    <img id="foodimg" src="https://www.pstip.com/images/article-pstip/Food/food-single-dish/food-single-dish-24259-1.jpg">
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

            </ons-page>

        </template>



        <template id="forms.html">
            <ons-page id="forms-page">

            </ons-page>
        </template>

        <template id="animations.html">
            <ons-page>

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
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
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
                        </form>

                        <script>

var notify = function() {
  ons.notification.alert('This dialog was created with ons.notification');
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
                                    <a href="delete.php?Line=<?=$i;?>">
                                        <ons-icon fixed-width class="list-item__icon" icon="ion-ios-trash,ion-android"></ons-icon>
                                    </a>
                                </div>
                            </ons-list-item>
                        </ons-list>

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
    |
 <?php
	}
?>

        </template>
        </ons-page>










        <template id="Food2.html">
            <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center">ประเภท ต้ม/แกง</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>

                <ons-card onclick="fn.pushPage({'id': 'detailmenu.html', 'title': 'PullHook'})">
                    <img id="foodimg" src="https://scm-assets.constant.co/scm/unilever/e9dc924f238fa6cc29465942875fe8f0/7bc4930a-6865-4e4d-a505-a9fd0b3b3674.jpg">
                    <div class="center">
                        <span class="list-item__title">ต้มยำ น้ำข้น/น้ำใส</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                </ons-card>

                <ons-card onclick="fn.pushPage({'id': 'detailmenu.html', 'title': 'PullHook'})">
                    <img id="foodimg" src="https://img.sogoodweb.com/i.php?src=http://onaroy.oonitvalley.com/upload/5997/NyjM6cHQxI.jpg&bg=ffffff&w=1024&h=0&far=1&f=jpg&q=84&hash=04f65d004159d2f41e366813e8adbb0a">
                    <div class="center">
                        <span class="list-item__title">ต้มจืด</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                </ons-card>

                <ons-card onclick="fn.pushPage({'id': 'detailmenu.html', 'title': 'PullHook'})">
                    <img id="foodimg" src="https://scm-assets.constant.co/scm/unilever/e9dc924f238fa6cc29465942875fe8f0/295af751-4c91-42d2-9d2f-84229eb3f554.jpg">
                    <div class="center">
                        <span class="list-item__title">ต้มโคล้ง</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                </ons-card>

                <ons-card onclick="fn.pushPage({'id': 'detailmenu.html', 'title': 'PullHook'})">
                    <img id="foodimg" src="https://www.thaisabuy.com/wp-content/uploads/2016/10/maxresdefault-1.jpg">
                    <div class="center">
                        <span class="list-item__title">แกงส้ม</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="http://kaobahn.com/wp-content/uploads/2016/08/%E0%B8%95%E0%B9%89%E0%B8%A1%E0%B9%81%E0%B8%8B%E0%B9%88%E0%B8%9A%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%94%E0%B8%B9%E0%B8%81%E0%B8%AB%E0%B8%A1%E0%B8%B9%E0%B8%AD%E0%B9%88%E0%B8%AD%E0%B8%99_2.jpg">
                    <div class="center">
                        <span class="list-item__title">ต้มแซ่บกระดูกอ่อน</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>
            </ons-page>
        </template>
        <template id="Food3.html">
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center">ประเภท ทอด</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>

                <ons-card>
                    <img id="foodimg" src="https://sites.google.com/site/xaharthaiphakhklang/_/rsrc/1453309266433/thxdman-plak-ray/%E0%B8%97%E0%B8%AD%E0%B8%94%E0%B8%A1%E0%B8%B1%E0%B8%99%E0%B8%9B%E0%B8%A5%E0%B8%B2%E0%B8%81%E0%B8%A3%E0%B8%B2%E0%B8%A202-Medium.jpg?height=230&width=400">
                    <div class="center">
                        <span class="list-item__title">ทอดมันปลากราย</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 60 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://scm-assets.constant.co/scm/unilever/e9dc924f238fa6cc29465942875fe8f0/34f65914-d21a-4460-b955-d480e8bb7d0b.jpg">
                    <div class="center">
                        <span class="list-item__title">ทอดมันกุ้ง</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://หม่าล่า.com/wp-content/uploads/2016/09/%E0%B8%81%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%8A%E0%B8%B8%E0%B8%9B%E0%B9%81%E0%B8%9B%E0%B9%89%E0%B8%87%E0%B8%97%E0%B8%AD%E0%B8%94.png">
                    <div class="center">
                        <span class="list-item__title">กุ้งชุบแป้งทอด</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 120 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://food.mthai.com/app/uploads/2017/07/Chicken-wings-fried-fish-sauce.jpg">
                    <div class="center">
                        <span class="list-item__title">ปีกไก่คั่วเกลือ</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 60 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="http://4.bp.blogspot.com/-ckmYpr6ABQI/Uvjdyro1XpI/AAAAAAAAAyY/AyVwrKypnFA/s1600/1372735614.jpg">
                    <div class="center">
                        <span class="list-item__title">ปลาหมึกทอดกระเทียม</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://www.pstip.com/images/article-pstip/Food/klang-food/klang-food-15161-3.jpg">
                    <div class="center">
                        <span class="list-item__title">ปลากระพงทอดน้ำปลา</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 200 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://food.mthai.com/app/uploads/2017/06/Fried-Intestine-Pork.jpg">
                    <div class="center">
                        <span class="list-item__title">ไส้อ่อนทอดกระเทียม</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>
            </ons-page>
        </template>
        <template id="Food4.html">
            <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center">ประเภท ผัด</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </div>
                </ons-toolbar>

                <ons-card>
                    <img id="foodimg" src="https://i481.photobucket.com/albums/rr174/Venus_in_Lovez/KraPaoRummitTalay/02.jpg">
                    <div class="center">
                        <span class="list-item__title">ผัดกะเพรา</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQTEhUTExMVFRUXGBkaFxgYFxcaFxkdGB8XFxoXGRgdHSggGBolHRgXITEiJSkrLi4uGh8zODMtNygtLisBCgoKDg0OGxAQGy0mICUtLy0vLy0tLS0rLy0wLy0tLS0vLS0tLS0tLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAMIBAwMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAFBgMEAAIHAQj/xABCEAABAwIEAwYDBgQFAgcBAAABAgMRACEEBRIxQVFhBhMicYGRMkKhI1JiscHRFHLh8AcVM4KSosJDU2NzstLxFv/EABoBAAIDAQEAAAAAAAAAAAAAAAMEAQIFAAb/xAAzEQACAgEEAAQEBAUFAQAAAAABAgADEQQSITETIkFRFDJhcYGRwfAFBjOhsSNCQ1LRFf/aAAwDAQACEQMRAD8A4sRVvLMsdxCw2ygrUeWw6k8BTP2O/wAPsRj5WkaGR85tq6J5nrtXVeyeRJbBYaYLKkx3moXP4iv5gelXpp3nzHAhr7hXwOTFPs5/hy22Ap8967wSPgSf+4+dq652aaeSyEPpSCmySm2pPAlPymrOX5Wlu+6uZ/SvM1zVDAlYMc+E8po7bD5KxEC7nlzLLTKEyUhIkyogC54k9ai78yuAISkFJmxmagyLEIcbOmSJO5B3v7XrxOCQy0pCnFaVWGo7arAD3FU24ODI7ECtNY3+KIIT3aklWoqkHYRHrRLOsvSWQpTha0JE6Y0wLkVFg1vOH+HWS2tsjUtPzt8Ck8JIg+tHltJ0lJA0xBnaOtEdyCP0kBZphWkxqSPiAP0t9Km7sULxmeISIbGs7ck+QPH0mhT2Ifd+NWhPISkewOo+pHlQsHsy2IwYnMGm7KWJ5C6vYXoa7n82baUfO30EmhSWm08NX0HsN/WtzjDsLDpaq7lE7EtOYvEr4pbHkB+cn6V4MPq/1cQryGo/sPpQ9WIJ41r3hqptPpOxCgZwiflUs8zFZ3+HHwse6lflQqtktKNgCfIGq7295aXMRiW1f+EB5FX71UU23yP/ACV+9eKZUN0kehqNSajefeRie9yiZ8VuZn86uv43WkpOx8v1ofFeEV28mdiapy9IMpWU+kf/ABIqygvJ+F4nzM/RQP51Xms11bxWnYl5rOH0wFthXWCPqmRVxnP2jZYUg8/iT7jb1oQl4iscUlXxJBPPj771beD2JGI0suoWJQpKhzBBr0tDlSh/CQdTaylXUkH/AJi/vNWWs9eagOp1jmYB9Fjwn101YLn5TOxGMtjeB50MzFLTzSj3ulFpINoB2PMGreDzRp4EJI1RdChCh5p4jqLVRx2SF1aJUgNoulpKSElX3lfejgLVZRg8zpHiFNlou92SltJKdchMDcgT+YqrkfaNGIICEyDxG3tRNvDOKlL6W1pm2mYjqg2qk/hmcIh1+AlPJPhAkiwjrRBtIIP4SMGERiG1SJBuU+ZG4HOKG4/Jfmasfu/tUeWJ1jW0oNp5gAnnBKr9bGjWGWFJsoK5kVXLVnicQGiW9h0ajrbTq4ykT615TwppJ3APoK8onxI9pXa3vK3ZBp9CdCtKmAPAqAlQ/DAsR1pkNQO4hKArmlJUBzAE251A46txoFtSUrIBvwkTBHChN5jnqXz7yAZxL4ZCFEQSVwdIgTvHpVLMnG3kLQ+ApklKkQbr46OdiKKZWhxTI74jWRB0GQItY8aq5Z2cQ2rUpRcIKijVACdRk2FpnjVsqDOwZdyzBIbQAhGgEDw8ulWnGUqEKAI3uJuNq2dWEgqUQALkkwBSlnnaRRSsMhQASTIso9b/AAJ6m54UI5bJk9QzmWbtslR+JdpE2A4albAdN6DP4h16CtWlPlb0Sd/NXtQTssR/DocUStcrgqvHiIkDmedEXXyaqto2gjucDmTJWlHwi/3jc+/D0qFx8nc1XcXG5ofisySm0ifrS1t4XsywXMJKcqJT450tv5wSYFgNzVLHLdIkOSnlsfLrSR1oY4XuWTYW2kxqczFKdyB61WOeNzBX6gE0pMKIMrSSB1H6m9Dc3WsnUggIkeEHxEG0gcxyoButb1Ete6VjC8n+06Rgc+WfCh1COilAGTcXipRmOJJIL8HlqUCK5e60Y+zdCTxC4n6bVTx7brqSj+K6qsbgRuZ22qK7GJGT/mKJqmzyBOt4fFvOmz6VJn4lLIH1NF1ZBijBC21jgdZ+ljXCBhsQpCinFFQjUvQd0pvEATaJ96N9j+3GLbeDaHgpFwAdSokAkyoDiJ8ya0MIF3d/jGPiARnAnWHsjxSROgL/AJVAn2MUOW6tJhba0nqhX5xFF+z3blKwEYgFC7Xi1+fKmXL85ZeMNuBR5XB84O4rk2P8rS6uj9RFS+DW+kHY10LEsIWIWlKhyUAfzpC7d4VOEQ240CApSgoXI5jfbiKu25BnuTsBkKkVGaGsZ4AoIXEmIKTKTNFQ6lXQ8qhL1aUasiaBdSof4bjkdqjW3UdHDSmJu5g0qgoOgi4F4noRdB8varODzxxpWh5JWOfzxzEWdHlCulVAqpu8ChpWNSev5jkaOtvo06M7TyXUam1yDspMSPfY1XweWJbAGpa4ESs6v6UsQ5h1d42olJ3URPo6BuPxi44zTPlObIfEfCsCSkkbfeSfmQeBFEIwOOpE1xGXBaFoKlgLsdJ0kDkmNqGjDBnDuN4chTgsJVEq3gkneKYlokUpoyI4dzUlsLbklJAlxGq53kK84qUOeJDS2ziMXpEsgGL3T+iorKnYwCikHv3VTxJg+oAgVlWyJXEmRm7DjgusLBnSDM8/Dw3q5icpKlodQ8UJCgvTFjxIJ61pleW4dLnetoCHxKVgkyeYgn1BFFMrxCnUlak6QVKCQfugwFetQ7AHyyQMzbLMQhxGtuNJJ25gwfWakxmKS0nUswPqTwAHEmtMS82wgqMJTMwBck8ABuSaWnVLxCypfhAkGDZA+4k8VH5lcNhQguefSXnmJxasSo8EJMc0pPXgtz6DqaE9pcUlnCuaRyk8VGRcniaLPKAASkAJFgBtS92sa1YZwcTEDncUDUWeQ46lW64nuQI04ZofgB97/rVl7EhIoJhs00sIngkD2tS/mWcFVtVZj6o7QFjlOnyATDOZZ6ASEmTSyrEKJUTYnjVRDLjhlAt94mB7miLjDaUo1LCjMEJVJMb24DrSTZbkmU1hCrtUj9ZNg8M4tMkgT8PNXUDlQbtHgg1K1YtS1gBSEoH2aZkaFT823vRBzOSlUISq9pVaB0jpagONxSUrDq/HBEJiRPUcfKi6fynIXuZgbBwIMYxbgUC+4oJiQkEAq5T91NbNYuEPYhGsDUEo1GYJuRE8vPcUdw7OgnFNFQc06wF7hc2ISRfewothfskIU6nW4NRTCUyp1ZJhJiAdSpJgm0WmnHdFxkd+kK1oxgiKGGyTEuhK9Qb1HxFwlMD7xtqPOwNqsDsyUkKOMQbiQnvCYtNyBPGjPaLOS093TxCnBCTAhCYtpAFiBtPGKXMbmhkABIBUoWT92IO1wZ+lcr3N8oAEgNYflEIPJbZclkoBUoACCDGxAuYnlWjnaDDBSg5h1SDGtCgDabxHlVFDoQjvHFAumzaANjsSpW09K2y3LXdAxC0QiSEqOnxEyklKVDxgHcgEDnIola4yW5kquMl+YUHabD6Sdbqj8IStMqgj7wVFrC9MeU9p0l3vMO6G1oCSAUqKFAJgwCSQeY4zawpNwfZRTsqC0gD5UAqKRt4iYj1o/l/YzDskOPy5Fw2TE/zkbDpQnbTJyZxNQ5Bjdn/aLEOELeKAAIGjXo3gkASArrvWmUdpHVJW0sJfw+ywtcpTvdKz4kmRaOPCl7OMyUsaUnTA8ISICeiQOO1J5zBDYBTKnO8JUorVIFvCEbTOq95moqc25YZH4yEsZujOj4vL0LBLKpRunUYUk8QefmKd8pxaHsP3eIhLgEJdiVDlMXVXNGH31NFbTLnhBUTsSLkkp4QPeqWX9pnFqCWypS+ATv8A0oC2OpJC8QovdR1Or/5a6hIOttaTsZ0Tx2XFL2b5n4ToUEnnQF5b6zLipUeClSfraq2IbS4ZnxC0fLbiedDbVtjC8Cc1u4cdxxyvFd60F2nY+Y/KrE0C7JIUgKCufp6UwqRWpp7d6DPcIVIm+Hfio8VhimHGZGkzCfiQeKkDin7yNj51GRFWMM/BptHKmRD2RZyHhpVAcAmx8Kh99B4p+o2NFSmkfHYfR9s2dIBKjAktqO7iRxSfmTxF96askzMPIuAlxNlpBkCdlJPFJFwaMwGNwkS7prK9U4Bxr2qczpFmGXJechbahCZS6k6VAg7SDPuOFW8EnumvtFzp1ErMCRJMngLVdpZ7Q43WsMpuEqAI4Lc3DZ/CkeJXoKlct5fSWxiQOPqxDs3SE/D+BJ4n/wBRY9k+dSYhYA0pEAbAVOpAbTpG5uo8STuTVJXM1FjDodSsgctvS5n+ZoSCDvyqbPc37vbc7dOtK5YQ78RM85rB1esBO0dRgbKxl4CxGPK1aUwBPGsccZbvGpXXb2rfOcqLCQ4kd4mfF0HnRDB4pGkEJSRHIUvY20A+kW1F7H5DgRWzLOHVkIaSZNoA/apHezuKCge8SlQvMyBYHlffbpTcceEidKR6VujNJ4D2qPi9o8ifrFPEA+8VHcDpgrW44qIBACUggEztJ8z0qReXuuNtwAlS/g1b9CfunzpmcxwO4HsKHYvGpUQFDbaLVy6lmxxz+/SVBDH6wPlofbxgaxTZUAqZWJKFC4IV6C9N2KwhUsOEQhCitHIHhwuL8/ypZV2iUlOhUKHAkXHrwotnWLPcAJ+IogXJk3uf2FXuZ2cNjEvuzyeIIxbDeJSEd0O8Kp1x4z0k8NrVR/yxsvFJWdKG7nw+FSRJCAFDXfSkASSVbGKs5d2j7wht46HkApQuBJsQUkEX9amyNBC1OKUNSlEWNt7xwuQD6Cm1bwvnzGaKbLX2/vEsqyNlLOHhCkPuPHU4VEqShACzA+Q6uIF+ZrdbevSyUud22dUR4lkrGoKUfhCEqUkQIk7XmpcfjVLWQ2LhOkc/FwB4TF+lR4PFqYb7srSskeIgbdAT+ddbqfJhZTVKK3K56hx3PYbDaEJbSIASnbw2BUd1ncyeZil/G46SbyedVlPFaglNydo+tX8BlInU7sL6Rx86QIJO5zEjueD8PgXcRZsFKeLhFv8AbzP0q9h8tYw5GhALibFxQBM8dPAedXMbnASmE2HSlY5yA7BkpVueR51dfEcEJ1Dodo2rH7G933TBQ7q1pl1EmErECTPMfUGqbWHbZSe7SlMyVEcSd55+VC8FjJTpmxMx1HH61YxzwQnWoFUWCeEnYnpQMtu2+8nxMiV8xzHQLzJ2/eo+zD3ePoSdN1pnWYTvsTyO3rQxxXfLlV1D6dKGpxC2sUUqGmYI22IlJtzF6aroBUj1HMqoLHj0nUW0Fl5bexSYg/kaPsCRxoFj8YcSlOJCSklPjJsDp0IVoPzeJSTA2vTNkTGhIUHlKkCxjT5QRerI+xuOpp0MHTB9JWcaqvEGjWJxCVL0QJ3kW36cKoYpjetKq0OOJDoRNsI9FVoXh3kFvY/6f4huvDk/9SPIisbMVeLIdbLajE3SRulQulQ6gxTtT4OD1BRoweKS4hK0GUqEj9j1rK5s8poKIcxDjKwTrbTOkK4qT0UZV/urKY8H6/2kTqWa4sttki6yQlA5qVYeg3PQGgWU4cXdN4lCCeN5W75rV9AKlzbElx4oT8sNj+dwalq/2tj/AKqt4hISAhNgAAPS1CHlX7yzGUnjJoRnWLDaTRddgTSH2sxsnSDWdrbtiYHZhKU3GLef4ouE2PSl9jN1Mq0rkp58RRdxaja9Cc5Y1Aqi6d6ya1B4ccGdqDnhxxL+Y56gInUDIJA522oVgnwUqU2ld1TBjSkHaDvqJ4eVCchy8vqBUuEg3QQZ07gi0HlvTljShtsIQgAg8NwNvemGSugeGOSYhYoQbYMxDx0EHeh7GOWEKUIIBAib+LVsOXhM+Y51XxeOAtVTDIcdVpbAJUb9PM8BfaiVUDad0qlORzLrObPOSQ2YEyb6RAk3iNr1ay5xSnUkqBidjV09m3kJ+JtBTBUmFQeqgRHCq+Ay9tWJUQvTJOlIA0wPunpyrnNO07IZRWpyVlLO8veb+1hKkncAfDO086dcuwjbwSHCUy2kggxBjeqGb4ZtuO9XN4KUkKWI5jYepqvjXJabKSQIjrHCY4xStjl1XjEo1is3I4lPMnVoKg6lt4CdClpAWRIhQ+ZMiDvVTJstdcPeayy0ecFSv5QeHU1RzBs6tTitKIHhmVri23AW3NF8JiC4sJBlOnVPAAcP6U05KpxDFbKF3jgn69S5in0t+BFhuSdyTa58vzqDK8pfxiyGEjSmApSjCRP1J6CpGMuWtWtxJAVKgnjp6jhamTsLikoW8hICAlQ0pkk7J8RJvJjV68qCm1ck9y66G0ot1nTS/gf8P+4RrU9qXYkaYRa8bzFT4BTClEqUhBTJShclKj+JQ1ceHHpRHMMUtwQCY23iuW4pRQopU4AQTKlGAKpuLNwI3XpKT83EPZ7hcO+SAnulbeFRInpPClXOOzb7IITCk7yAJ5TxkeVV8dn4DngWopAACiIJ5mJo1lGZ9/MugKSkWUYmOXM0ULfV5vT2mfYnhk46i9lGZFK9Crcv2pwbxKVoKTsoQf750OzPBoUD3iAFcFDY+RFD8vx4NrhSbGeY41S1Rb51GCIB+fMohLLMFoCgSJB9440mYfDrWsrFvETPM7kCndaVKSSggLiL7H+tA0rUIaVu2NCABAAkknqSSSSedF0zkbj6mEpzg49Y0dk0pfUlClBMggEiQFQdM8hMCeFNWRY6NTTp0KSSm+4UmxFc6yZ1WGdRMETN7gibpINiDcQacc2fYaxIOHJKYSuF3UFH4krBH9INAsQLkj9iGp/03wYZYxSkP6lGQdjwIpoVCkyBJpEx2PC1NNNAFRvM28UAC9hFz60W7LZ6olLakiDx+b32iu0z+G3PRj9rq52juFXW4qbDKg1ZxLXSqqBBrcWJmEV4JpfiUhJJiSelqyo0LtWUbefeVlrs62VL1r3SnUr/ANx/xn2RpFX3zJr3J7tKc4uOLV6A6U/RIrFC9WsOWnQXm7ulBrmGc4g6irenztVidIrm+NckmvOa1992PaaFFfkkKcw4VXIE2vq3qNTJUdKRJ/v2q5h2A2LGVH5uX8v70NiqrEdWoQYz3K+BwacOFKBMrMpn5Rt4ed58oofmWMgGjiil5lbAP2rRLjR+8I8bXrAUOoPOlZeH1NKWq2/nbh70VF3EOx9ogqNY0CstKeXAtqPHhXUOxWSN4aCpQU5zOyR0HE9aQWkuMLSl1NgJSkEGJMHbqkj0q6vEYnEH7EKbSPnJj0601qd58oIAmnRWzuAq5ndMJiGiClQBCt5Av50GzL/DrDvPJdYUGoMqSEyFc7TAPGRSNluZPMN/aOhZHS59aaMi7ZCRCh1E3rNFjp9R7zU1OhZFHiDuVO2HZNLCg6UgJ21CdBUZiUfKeot0pYzQaW0gg6eCrFKjJuCNrEWN6fP8Qu0yXsKplJAlIVEibcvWuQZXmD6N0qjy5/nTCJ4gLD0/fEwNTRsPlkmW5J3rq1LVpb1GVG/WB1o+42yw2O6EBVpMlSogkzykxbrUCcxbUA2psJ5wktqJPE8CfSvXsO06Uw8WwlOkakagAL7pM3JPCrOzOcNwIBrC3BhPKHFrQp0GdG44nUSD9KYMowja2ULCYcAKSoWKglRgHnS3kie5bebKkLt8SDbbUIPtI8xVvJ8esJASLA7nY3k/tSjjaxAnrbWWvQoW64x+UYXc3QlCQTBi826fp7zXPs77OuvYlxTLJWFwQokJQmRBJnc06B5IEJBJMkgieM+vO9SB8xqWYEmyiBtHDf6USu8o2RPOvqd3AEWct/w2QUk4rFJCreFlKlkAcNVkXo/lXZHL21DSypew1urJKTxVoT4Y6Vcd7YYZhMaGlEcVC5/5T+QoFmP+Ki3D3aIIJsABHlJ4eVNm13HGT9hxKb9w4hzM8ClAgJSE9IA9K5V2nwimXe8SQUqvI4Hik89p9aKdre0DodCEmfDJ4j0oS9jO8Snv1FKFJURpgyQYEgXFwajS0up344PpOrUgg+hk2VZtsCaYWUIcUlROlQjxRMjkRxrnKFQbGmPKcTMJJvRb9PsO9JLqazuWNWe4XDOlPdLWFJHjUsAX5JSD+ZqnmBW9oQ1CW2wJIFyQACtSjxMdNhVnDpaIUtxJUoCYkwY4kUH/AM2ViXQ2PC0DcCyQBQEayxuINGsd+YaVhiy8tlZClIJCiDKT4QRBoj2aeh5B60v5amULUBwMf7jRTKHIWmTS93BJEZ0zbreZ2B0eGh603ojg/EgGeFVsQ3BrdpO5QZZxgzRNeVsBWUaDjHgW9OHaH4E/lNRVecRCAOQA9qpAVYnOTJ9YgdsnrmkbEqgdacO2KvEfWlIYJxxOpPAExB2G5PIV5hvNaxmqrBKxmVP4sJTAIHPmT1odjs3A2MmtsZhDsTpMTB9t60weRoV8TkHyn9aYFaL5nmPfVltxMp4B5wrCkalL1QUAfKd1TO8xb60wDDJEhRBvJTH0PMTWNYHuknu3EknmmD5b1TGBxTh8JQepMD3qtjhzwQMTV/hyfw9F33tz7c4lxrFIbTbxGI1Kuo3J35SomOpqILeeuhJKRuo2QPU2q1g8mZZ8WJcClbxfTPQcfM+1ZmXaRr4UtlewgCBy9PagjDNlBuPv6R6/+YK6l8PSoOPylY5fvrX3kTIaB02/GoQfQGoHcpbmyE6yRJupUq9dgI4DjyqPE54+sQllekdFR6Wo5/hakPvuqcTp0BISFbyrVJjpp+tM7XCk9fjMK3V6nVuPEbiUHeyjrY70DVAm6thveaArzJJOoqJVPyxH99K+kWWW0IMxpAJJP9+lcp7fZhl0lKcOlaz90aY6kja9dW+ThpW7Tp3mJzGKWpK3bWsnVBOsgpBJ/CJMVHk+TcS4o89Nh71cwWVrdOpzwN7pQLT+woniXw2gpTAG1vaqWX48iRDd5gi+sp5cU31SUkHz6UTybEjQRMhJItuOIJ58aFsYb7BTmpNlJSAT4ySFEwPugC56iocEA0EO94k98SNE3Gk6ZI4SRbnUGskEiez/AI+Er0iqvuB+Qh7NMwW03KSIBgn6g24GlPMn8StCnJKUCJ4G5AEcTuKZAtKkKbXsoR+x8wa1cR3qEtrEARqAO8fpaqUOlfLDmeNrK5yfyiNhMsW4bStXX9SaYMF2XUyUuvRcakx8PEG/GD+VNGXsNo4ACjmIwyCyhLatZWFLKZSQgjjG6DE24xR/i2tyBwIyhL8HicexL3fYgrQvTNkkmICQePAmPrU+UNoDn2iErSZGlXW3oRzpgz9htLKilCAZCusiRAg9ZMjhSy2k6gRwNyOB4frTddgevK8ekl8rwIUxOSMsiHXkCFE6bqKRwHneCJvAmguMxreqW9RI2JgD2FHcP2eDw1BUncg7yeM8aid7MJFiSPMUNL6wfOxJgksUnLEme5Pm+qOBFEhlkB1bCJ1NLUpIIlMSVFI5ReN7GKApyQtqHikEwDtfePaimUZirXpAMpME38pMbTsR1IruEbenXrJyFOV6hXKmwGD10j863bbhQirisMltKkpMokFBO5F9+ouD5VJgR9okxWXa2CZbSrusxOpZACWU6reEfpW2KRU2Tp+zT/LWuIvtXodJ/TEZs7lUJr2pAmspqDjKhzW2lW2pIPuJqskXqTLv9BA5DT/xOn9K8AvPlXYxkTj3OZdtW/EfO9L+W4wpc4QQRBFoUCP1p47ZYXxrtvcev9a59EKB5Wryt+UuYQ12WrBkWd4Vpvu7pXOorn4gQbDyI/u1CktIUbAgDjMnneiOesa0FQ+JMEjmk70o4zEwbEp8jHvTVSmwcTPDEnBjZg8ImZWfDe0mTy42ivMbmoR4EDbgNvU0lsZy6kwVSDuePvUDGYu64B3PKr/AsTljxCGpjGwNqWCpdyeXCp8DgEyNVvOhGEzXETBCOF4q8c4WkSWkqjkSKE9VnQxAFcHGY24VYSAEmKuM4qCDIkcaRsJ2rHFgjrqq2O0TZ3QoUs2mtU9S/Kwx2o7QvLBaaXPnsOZ67il3JctSkl1061zx58/OsRiUKcKgCBff0/arSCCscuVFJZV2+/fv9pSy1yMS4pxS9rDn/e9Usx0pSQLk2k7/ANKIlM0GzqAUpkaiduMc6FTywAk/w+rxNSin3ErOtrDYVHhJIB5lIEj01D3oT3Cl2uAONEXFWivcM4Ama0FYqMiex/mXipD9Zaw2KWpISomEE26mJjzgGr2Ne0pCpjgaDMYxOvSDv+dGmMIMSkskxqBgxxT4gPMxHnFL2J5xnqeIIw3MGuZ2kHSDqVwAvXmIzEpBK16VcEBOpZ8zsn61fYwLKCpGGBKTZTpTC17yEjdCLxHGBNWcLlaEGdAnmd/c3qXams9Zh8qOouvh91OruSEAXUUnXfe5uduFAnMUsAJSLTItcxzrqJdkQPpS29g0JcUbQTM8ibke80ajVqVOV6hBaFGcQfkuYKHxApPWm3DY5CxpcAIpXzLNMOlOkXV0oPg87UFgJFidif1qraZrvMoxAeC7Hcoj1i+zIWpK23PCFSRuY6HgfOoMVhS0bApCrG0FWxvzukGocozqQVJJgGCbx7+ho9/HJU3KilR1QUKHCJ1A+dvali1i+VpO7jaRBJJCfM+3D60RyhMrHG/7VTxTwB8MaTuN7bb7xeivZhnU8IuDf8rUJhuAh9K22wZnU8sTCB5Co8SKt4ZuEVVer02nXCCMOcmRBNZUyUWrKPKQxgo+0SNtWoeSxqn3mtViDUWASU6fwy0vnY+A+351S7T581hknUZcKSUpG/EAnkJ41WxgmSTxLvK3a3DSgKHkfzH61yrMmtDhFO+V9rjiUraWAu1ikeKwURaRqNuA2mlTPmtYLqCCAQDBG5Ej/wDa89rgHcWJ0YSt1KlTBi4IvxEH1/rSri8ES8rUZVckm+qbzPOmELJsbVSzFrWpDg3PTcjl7Gq6YlTM4jDcRaxmAlMjevciwQJKjuLUw49lMwCN+e1UsOwEqIT4ieQt6CnGtIUrLWWYUrJUwCSd60U0XLAWH93q83gALuGOnGtsTj0Np3CU/n6caU3nPl5MXAJMp/wCUCVVQxDo4VDis71khsE9VfoKHllalBalbbTtTVdLduYdKCWweIwYHCE3Nh9atu4ttq6lAcp39qAYzHvoRJKR7zQF11SjKiSaldKbDljx9Jf4Js+ePeX582swXA2PxWJ9eFVs2xLS3khohQA8ShtJ4Tx/rSwzla1IU5IShPzKkJUfuItKldBtxipcBiVpKUmAkqE2v6nlRPg0Q7lmjotlVq/cQ3iRa1VMItPBKlHnFvrVnEq8NVV40JTAt1/ahICRgTU/mRgWQD6ydwEkbCL2onl+KIIOx3HQj+tCMPhXXEd4NLTUx3rh0pJ4hESXFdEgmvMneGtaNRVBlJIiRxtJjnU20HZkzytlJ259o1Z9m5ZUk2S24nWk7C5hSbCZCtQ8hS8/2jUVQgg8iAq//IA/SmHF4IP4WFCe5VqH8q7EeWoA/wC6lllhPewBtbpQaRSVyV5kIU28ie4jMn9Wn4iRIG3sKH4TMXSsy13p+74re1HMTggpaCRKrwACSfQUx5bhw2olTaeqXZ0zb5UkAx1J8jRBdWi/KJdLFA6iO32axWIcVow5HE7BCf5lbJ9asOdj1JSDrCjxCR4R/vmCa6HmHaBptrSUoF91RosZhDUQJ5AbWvSxmOcOOjUmQD8KlCCQLeFOyU8K46qxgNnX9oU2uRxKWOaLbCW02SDJvcmN/b8zzoD/AJ46JSCCOBO4/ermKfWpOgkk1TGAIsRvRagMf6nMa0+n3jLCM+QYht5sSSFj4hPxDpbeiOVDx6e9DSwQWyswlR5a9kHbe3UUs5LhihwSLcafT2dU6kKbUkiNnP8A7AX9RSr1bnIQZEX1GkNZysO4fthimIbxLYUPlKrEjmlaZSvzvRzAdpWXYmUHrEe4rnD+SPtiCiEj7qwUidzBNqEO4wJkBW+4mrrfqKjgZx7H/wBgQzA4n0A2AQCCCOhFe1w3DvOFIKW1QduvXespn/6Fn/T+8YxO/wCLRCjwDgieSx8Pv+lU86yhrFNjvUeNOyhZSSOKTymi77WpJHseRGxqmh6SCq0+BfRQ29L79RWgyh0wYUgETmOZdnnGjrKUOpn4gChSrzCiDEzHDhQVxLEwvvWVdfEn949K7ScEAFJNwdwdqTO03ZQKSSgSnlxH7isu3QnbuX8oEoMxFwuXhZAbcQVHmCkj3+L0vU2Y5MlslOISbXBQoQBIJKDfVaReDtNLmcZU60olEgcReqTHaVxICHTqCTYKBi++1r0mlXHlHMlqD95t3DSFTdQJ2m/1qd3MEstxZCd/xH13P5UHdxaCqULCT1/Q1DjWAGk60KLinNfeqnxNxpCU8xq1GR+lMJST8xkWqhIAGP1kOYdpFKs2I/Ed/QcKF4cF1wd4sxupRkkJFyRvwo6nLG3Bax+tQoylbWvTB1p0mRcAkEkcjaJ6mmqrKU4HBlUsrUYHBk2GbS0whUIJUTMjxDTHHYA6j7URx2Gb0lPBQBFVM/WjusOlESlmF2jxlbhIJ4kJKL1thXE6O4LgWQlKm1gEC4Cim9wUklJ8qDYpI3+0A6lhugB7CK16DJCb9D6+VapwOwIMmIvtdVj6Ae9MjS9S0gjxzBAG4/pVzHZWZSdJkEb9at8XtwpEv8U3REB4dtBYKVzKJ0XNpPAbXNVVIGma2xqJc0zpTqCSo3gTcxxiSYrM1y/QvQy+MQiAdYQ42ATPhKVgGbA2kX3oqrkbsw/JAJ4kuNxqSgBJk8uXnVZpab6/FIIERY8DtcTuONZhspn41egonh8OEWSkedULpXwsLq9ab3DN2BiTB1TpClnWSANahATsYSmdhsAIHStHsmW2pOImZNjYTwMDcjhUqRFydqlZxPeGL6UbDeNX70A2NkkdTPLN2IdyXFyD1SUkdD/UA+lBGcJoxKweJkeRq+opQ8UpkJO072An6z714sysHiLdaSGVJx0RBZwMTMTjGmYW4QDfTxPWE8eFBcT2qU4tKGgEaiE618JMTGwA3qv20Pia8lfmKpZXgy4oAC3C1z586eoorFYsfn/EbrRFr3GMGKwqHsU64m6Ashu5I0o8IVf7wGo9TW2Zu6RfgLURZwwbTFupoDmT3eOQPhFqCHNtmfQSaK2ufmaYFqSCeNHsPgNVqq4DDbRTjkWX3E1WxizYE3eEWV8ryW8KFGu5LYhCiB703YTIvACoxWisobm8q/vpWlpdNsGfWZtr7miMcqU+qFFbnQkx7C1HMN2JZSguPNthKRqMgE2vThgMIE7AAdKtYzLg6EgqICTqj5VEbBXMTeKcWlc5aBxOdvZCys63sSWXFQS2PkB+Ef8AHTWU74fshhykF5PeumStdxqUSSbTYXgVlN+LWOOZOIxih2aN6ZcAlMQ6Pw/fHUflQzJv45ZC1htlH/lq1OKI4EqkaT70xIJ4gdeRpcjYe5YGUsBip+zUZUAClX30nZQ686mcRQfHYXuSIOlsqltf/krPynm2raiuExOsaVAJcTGpMzHUc0nnVmH+4dTiIFzfs60/JjSoi8cesc65B2p7JKbUZT9K72pF6G57laX0RbUNuvSkNTpd/mTgy9Vm08z5jxOWQbitXm1kJlxagkBKQpRISkTCQD8KRyFq6V2r7JLRZPqQJkb2valJ7LykQU+s0j4zJ5X7h2xZ0IsoxKkG4kUcy/M0qFlBXQ2PvVPG4Q8h6D+5qlhcNpk1d1Sxcxa/SqFziMxQ04IIAJ51WxHZ5Ko0kpIuIMUGw+zhLxbUkS2kNlYcVPwkzCBF5M+VesdoXEWUPb9jQ/hrV5raKLp37WMWX4RbToWsA2CQeJ07n2imbNXAplspRqWlSgbmSFDwnyCp2rnLOfrU4mQSmRJO4HSuh4FzSQdwI8iKV1CtW4Z/WRam3Aid2l7POYR4pcEyb+e/sdxVRponhArrPatacc0o6NK0AFKhfUkbzbcHxeqhXF8Zj3goo0hJSSDxMi1OJmw7VOfr9JPhs5wsKttpTckeZ2qni85bT8PiPTb3oZhME++6ltAWt1RhCRuTe17bTU2c9lsThY79tKCTGnvWlL53QlRUkdSBTKaVe2OYVdMM8mVn80ccMDwza1MWRJLeq9zp/WgeeLa71HcJhCG20yRpK1JSNbihJgqXqMTtFWMvwrixrUYSfhjc9fSu1Fa7MDgTr1Cr7CMeOB71pSbeIf37UwYnDJW2F+EX02jcAE25Xrn2YY1bSkSsqKSD7cOtObOapUO6EQsB5CvMaVJ+iazbqWCgj2gAmRn0il2jbK8QlvilN/W/5RTLleWBlEn4iPYH9TU7LbanO8IBUBy3ja/qajzXGaUkk+I7fvXG8sqosnaWwogrOccfgTvxqLLcETFe5fgCtUmTNPOQ9niqDFqsSFGxZs6esVJzIcjybVFq6HkuR6IWoC0RVrJsnS0mVAVfed4CntNpP9zQV1+eBMxD3Co0Mc69ZbkzQ7PM0gKQhWkD/Vd4I/AgfM4eAG1a6LngRSQ5nnRSvS38DZHeECStZ+Fhvmo8TwFM+V953aS8EhwjxBOw6egoL2eyokpedTpCRDLZuUA7rWeLivpRvMcSG0hajCQoajyHPyFiegNdYR8qzpOTWViIIBBkHYi4PrWUGdgwXiMrC3EL7xaQkzCVKGo8jf4elFQqqffpBjUJ5SJqYKq7ZPcgGTLSFApUAQbEHY0r5lh1YYpOpXdg/ZvRqLM/+G6PmaPPhTKDW5AIIIkGxB2PSK5WKy2YPy7Mu88CxodAkpmyh99s/Mk1ZcTQXH5Spq7YUtoGe7Bhxo/eZVy/AakwOep0guEKRMd6BAB+64ndtX0q231WcYQfYS4kpWJH1HUUoZ72RF1JEjpuPOngJm6TI+lagRS12nS0cyUsKnicTx/Zk3tS5jclKdpmvoTGZU25eNKuY29RSzm3ZUkHwg9RWU+ktqOV5EbGoVxhpw7/AC7etHsuBFx610HMuzhRJig7mVHlVRqCODCKFxxEpeWxO9NvZ/GamgCbo8J9Nj7VE9gCOFVcGe5evZtYAV0I2V/fOqXkXJj1gNTRvXjuMwfgEzCdJNI+MTrcUsCyjbr1otn2MUpIZbkSCHSCCFCZCRyFhNQ5fhDpAIuKrpVFQ3MeTKaXTkDcYL/y8HevU5Z0pjGAtJtU7OFATqgbwNveKZfUhRmEvtSlcmAsNkKficFuCefnyFSY9/TYRqi3AACruPxJTbc0v4lpazAB6ml0ZrW3OeJkAWap8nqDMNhjiH0oFwNS1SSPC2kuLv8AypVW+VBaiCFEAE6RJ8IPAUYy3K1JJUiUkpUkkfdWClSfIpJHrWxyhxkzHhP06042oQrtWaD1bUwITwLsC+w417hcGvEOTBibVfyDIXcUoIbT4d1KNh6muv8AZzsk1h0iBqVxURYfyg/mfalKtO9hJX851AFY3HuK/Z7siRBUP78qdsLg0NCwFE3UBIiw6nf+tVdE7Cep/atXT6RE5k2Wse5WdcJ2rZtmJJtzmtcwxrTABcPiPwoAlajySkb0tYrGPYlfd6J5MJVZP4sS4LAfgFaCJn7QWZbzfOJGltRQ3MFwCVuE/Iwn5jzVwqzk2TmUrdSEhN2mibI/Go/M4efCr+T5CGz3jig49EaohKB91tPyJ+pootjiDFc1gHlWdJGz0oZn+MShLYV8S3EBI5+IAz00kj1rfK8Yh1IUlYMjYG4PIivcTgu8cSpcQggoHGeZ60MABuZxPEqf/wA02LIJSm8JASQJvAkbVlEFNmdyPI1lW3N7yMic9wCiSmTPjG/mK6CKysprVekDX6yUVIKyspIws3TSjnA05izp8OtJ1xbV/N971rKyr0/MfsZb0lrsqo94+mfClfhTwHkNhTEa9rK6355WeN17xrKyhSfSDO0LQ7omBPkKScWgch7V7WVnanuMVwNjUDkPalnO0iNq9rKzD3GllHK0jlRjBi9ZWUNv6kJ6Td74hVjF/wCigfie/wCysrKF/wBv36iYWt/qH7RSxG9EMuG1ZWUy/wAkLo/kjDhUCNh7VM6gch7V7WUxR8saaOnY1ADZgAeQplUs8zXlZWxp/kgD3Nm6mVsayspiD9ZzZLqu5xrsnvAopC5OsDkFbx0p37JMpThGtKQJSCYAEk8TzNZWUxf8v4/pLQ0K9NZWUlLCDMjQO6IgQFrjpc7VHmqiEKgkeJO3mKyso/8AyH7yp6gTEOHUbn3rKysp8DiCn//Z">
                    <div class="center">
                        <span class="list-item__title">ผัดผักบุ้ง</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 80 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTuTmvXWs3B_dfU4qYxVRXnSLFVkc2l6pMARnrk2_mL_ZMX2RQ3g">
                    <div class="center">
                        <span class="list-item__title">ผัดผงกะหรี่</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 120 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>

                <ons-card>
                    <img id="foodimg" src="https://food.mthai.com/app/uploads/2017/07/Stir-fried-clam-chilli.jpg">
                    <div class="center">
                        <span class="list-item__title">หอยลายผัดฉ่า</span>
                        <p align="right">
                            <span class="list-item__subtitle">ราคา 120 บาท</span>
                        </p>
                    </div>
                    <ons-button modifier="large" id="large">หยิบใส่ตะกร้า</ons-button>
                    </div>
                </ons-card>
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
            </div>
            <ons-list>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                            <ons-input id="username" modifier="underbar" placeholder="ชื่อ - นามสกุล" float></ons-input>
                        </span>
                        </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                        <ons-input id="address" modifier="underbar" placeholder="บ้านเลขที่" float></ons-input><br>
                        </span>
                        </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                        <ons-input id="district" modifier="underbar" placeholder="ตำบล" float></ons-input><br>
                        </span>
                        </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                        <ons-input id="district" modifier="underbar" placeholder="ซอย" float></ons-input><br>
                        </span>
                        </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                        <ons-input id="district" modifier="underbar" placeholder="อำเภอ" float></ons-input><br>
                        </span>
                        </div>
                </ons-list-item>
                <ons-list-item>
                    <div class="center">
                        <span class="list-item__title">
                        <ons-input id="district" modifier="underbar" placeholder="จังหวัด" float></ons-input><br>
                        </span>
                        </div>
                </ons-list-item>
                </ons-list>
            </ons-card>
            <ons-button onclick="notify()">Notification</ons-button>

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
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
    </body>

</html>