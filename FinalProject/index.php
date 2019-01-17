<meta charset="UTF-8">
<?php
$message ='';

    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_COOKIE["shopping_cart"]))
        {
            $cookie_data = stripcslashes($_COOKIE["shopping_cart"]);
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();            
        }
        $item_id_list = array_column($cart_data, 'item_id');
        if(in_array($_POST["hidden_id"], $item_id_list))
        {
            foreach ($cart_data as $keys => $values) 
            {
                if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
                {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        }
        else
        {
             $item_array = array(
            'item_id' => $_POST["hidden_id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
            'item_img' => $_POST["hidden_img"]

        );
        $cart_data[] = $item_array;
        
        }
        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400 * 30));
        header("location:index.php?success=1");
       
    }
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            $cookie_data = stripcslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $keys => $values) 
            {
                if($cart_data[$keys]['item_id'] == $_GET["menu_id"])

                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    setcookie("shopping_cart", $item_data, time()+(86400 * 30));

                    header("location:index.php?remove=1");
                }
            }
        }
        if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:index.php?clearall=1");
 }
    }
    
    ?>


<!DOCTYPE html>
<?php
if($_COOKIE["strType"] == "admin")
{
    $status = 2 ;
}
else {if($_COOKIE["strType"] == "user")
{
    $status = 1 ;
}
else{
    $status = 0 ;
}
}
?>
<html lang="en">
<?php

//include "db.php";
include "db2.php";

$strSQL = "SELECT * FROM categories";
$objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));

?>

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
            <?
            if($status==0||$status==1){
                ?>
                <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                        </ons-toolbar-button>
                    </div>
                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.pushPage({'id': 'shoppingcart.html', 'title': 'PullHook'})">

                            <ons-icon icon="ion-ios-cart" page="shopping_cart.html">

                            <span class="badge badge-pill badge-primary"></span>
                            <?
                            include "db2.php";
                                if(isset($_COOKIE["shopping_cart"]))
                                {
                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true);
                                    foreach($cart_data as $keys => $values)
                                    {
                                    $sum = $sum + $values['item_quantity'];                       
                                                                                                            
                                    }
                                }echo $sum; 
                            ?>
                        </ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
                <ons-tabbar swipeable id="appTabbar">
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

            <?
            }
            else{
            
                ?>
                <ons-page id="tabbar-page">
                <ons-toolbar>
                    <div class="left">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                        </ons-toolbar-button>
                    </div>
                    <div class="center">อยากกินต้องได้กิน</div>
                    </div>
                </ons-toolbar>
                <ons-tabbar swipeable id="appTabbar">
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
            <?    
            }
            ?>

        </template>


 <template id="shoppingcart.html">
            <ons-page>
                <ons-page id="tabbar-page">
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">รายการของฉัน</div>   
                    </ons-toolbar>
                                 <ons-card>      
                            
                                <ons-list>
                                    <br>                                   
                    <form enctype="multipart/form-data">
                                   
                                         <div style="clear:both" class="center"></div>
                                            <span class="list-item__title">
                                                <p align="right">
                                                    <a href="index.php?action=clear"><b>ลบรายการทั้งหมด</b></a>
                                                   
                                                </p> 
                                                
                                            </span>
                                        </div>
                                    
                                     <?php 

                                if(isset($_COOKIE["shopping_cart"]))
                                    {
                                        
                                        $total =0;
                                        $tax = 40;

                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        foreach($cart_data as $keys => $values)
                                           
                                        {

                                        
                                           ?>
                                           <h3><p align="center">รายละเอียดการสั่งซื้อ</p></h3>
                                        <tr>
                    <ons-list-item>
                        <p>

                    <td><b>&nbsp;ชื่อเมนู </b> <?php echo $values['item_name']; ?> </td>
                    <p>
                    <td>&nbsp;ราคา <?php echo $values["item_price"]; ?> บาท </td>
                    <td>จำนวน <?php echo $values["item_quantity"]; ?></td>
                    </p> 
                    <p>
                    <td>&nbsp;ราคารวม&nbsp;<?php echo number_format($values["item_quantity"] * $values["item_price"]);?> บาท </td>
                    </p>
                    <div class="right">
                    <a href="index.php?action=delete&menu_id=<?php echo $values["item_id"]; ?>"><span class="text-danger">ลบ</span>
                    </a>
                </div>
               </p>
                </ons-list-item>
                    <br>
                </tr>
                                    <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    $total2 = $total + $tax;
                                    
                }
            ?>
                               <tr>
                    <td colspan="3" align="right"><b>ค่าจัดส่ง </b>  <?php echo $tax; ?> บาท</td>
                    <td colspan="3" align="right"><b>รวมเป็นเงิน</b></td>
                    <td align="right"><?php echo number_format($total2, 2); ?> บาท</td>
                    <td></td>
                </tr>
                <br>
            <?php
            }
            else
            {
                   echo "<p align=center>";
                   echo "ไม่มีรายการ";
                   echo "</p>";



                               }
                               ?>
                                            <br>
                                        </div>

                                    </ons-list-item>

                                </ons-list>
                            </ons-card>
                          
                            <ons-button  modifier="large" id="large" onclick="fn.pushPage({'id': 'confirm_address.html', 'title': 'PullHook'})">ดำเนินการต่อ</ons-button>       
  
                                
</form>
  </ons-page>
        </template>

        <template id="paypal.html">
            <ons-page>
                <ons-page id="tabbar-page">
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">ชำระเงิน</div>   
                    </ons-toolbar>
                    
                                 <ons-card>
                                    <h2> <p align="center">ชำระเงิน</p> </h2>
                                   <div style="text-align:center;" id="paypal-button-container"></div>
                               
                             

    <script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AUCEkMYFCs7LVagzYlM13f0-7DfZWDe-555SoRU-WB_ThlrMmxJUsAAyCxll75DpXCFVBoUgvslFoEbf',
                production: 'Abg-2jKY-9KyIDg7Vdk_DNvUzkvUrxyxqWDp5ottR_0kZRh3uZ-XVGEiWqK0sLyYXh-y8UPVMhCX7uaF'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {

                        transactions: [{
                            amount: 
                            { 
                                total: '<?php echo $total2; ?>', 
                                currency: 'THB'
                            },
                            item_list: {
                                
                                items: [
                                    <?php
                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true);
                                    foreach($cart_data as $keys => $values) :
                                    ?>
                                    {
                                        name: '<?php echo $values["item_name"]; ?>',
                                        description: 'อาหารตามสั่ง อยากกินต้องได้กิน',
                                        quantity: '<?php echo $values["item_quantity"]; ?>',
                                        price: '<?php echo number_format($values["item_price"]); ?>',
                                        tax: '0',
                                        sku: '1',
                                        currency: 'THB'
                                    },
                                    <?php ;endforeach ?>
                                    {
                                        name: 'ค่าจัดส่ง',
                                        description: 'Delivery',
                                        quantity: '1',
                                        price: '40.00',
                                        tax: '0',
                                        sku: '1',
                                        currency: 'THB'
                                    }
                                ]
                            },
                        }]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                    window.location.href="check_payment.php";
                });
            }

        }, '#paypal-button-container');


    </script>
                            </ons-card>
                                
  </ons-page>
        </template>
<?php
include "db2.php";

        $strSQL = "SELECT * FROM categories";
        $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
        while($objResult = mysqli_fetch_array($objQuery)) {
        ?>
        <template id="Food-<?php echo $objResult['categories_id'];?>.html">
        <?php

$strSQLmenu = "SELECT * FROM menu WHERE cat_id = '".$objResult['categories_id']."'";
$objQuerymenu = mysqli_query($conn, $strSQLmenu)  or die(mysqli_error($conn));
?>
            <ons-page id="tabbar-page" class="red">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center"><?php echo $objResult['categories_name'];?></div>
                    <div class="right">
                        <ons-toolbar-button>
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
<?php
  while($objMenu = mysqli_fetch_array($objQuerymenu))
  {
  ?>
<ons-card>
    <form id="name1" action="index.php" method="post">
        <div align="center">
    <img onclick="fn.toggleMenu()" class="img-responsive" id="foodimg" src="img/<?php echo $objMenu["menu_img"];?>">
</div>
                <p align="left">
                    <span class="list-item__title"><?php echo $objMenu["menu_name"];?></span>
                        <span class="list-item__subtitle">ราคา<?php echo $objMenu["price"];?>บาท</span>
                        
                </p>
                  จำนวน
                
                    <div align="center"> 
                         <input type="text" name="quantity" value="1" style="width:100%" class="form-control" 
                        pattern="^[1-9][0-9]*$" title="กรอกตัวเลข 1 ขึ้นไปเท่านั้น" maxlength=2 required/>
                        <br>
                        <div class="center">
                        <input type="submit" class="form-control" name="add_to_cart" value="หยิบใส่ตะกร้า" modifier="large" id="large"/>  
                        </div>
                </div>
                    <input type="hidden" name="hidden_name" value="<?php echo $objMenu["menu_name"]?>"/>
                    <input type="hidden" name="hidden_price" value="<?php echo $objMenu["price"]?>"/>
                    <input type="hidden" name="hidden_id" value="<?php echo $objMenu["menu_id"]?>"/>
                    <input type="hidden" name="hidden_img" value="<?php echo $objMenu["menu_img"]?>"/>
                    <br>
                    
               
                <script>

var notify = function() {
ons.notification.alert('เพิ่มสินค้าเรียบร้อย');

                        </script>
            </form>
            </ons-card>
                
<?php
  }
  ?>
</ons-page>

        </template>

        <?php } ?> 
        <template id="sidemenu.html">
        <?php 
        if($status == 0){
        ?>
            <ons-page>
                <ons-list-title>เมนู</ons-list-title>
                <ons-list>
                    <ons-list-item onclick="fn.pushPage({'id': 'login.html', 'title': 'PullHook'})">
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
                    <ons-list-item expandable>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-pizza,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                              ประเภทอาหาร
                    <div class="expandable-content">            
                    <?
                      $sqlmenu = "SELECT * FROM categories " ;
                      $resultmenu = $conn->query($sqlmenu);
                     while($row = $resultmenu->fetch_object()){
                    ?>
                            <ons-list-title  value="<? echo $row->categories_id ; ?>" onclick="fn.pushPage({'id': ' Food-<?php echo $row->categories_id;?>.html', 'title': 'PullHook'})">
                                <?echo $row->categories_name ; ?>
                            </ons-list-title>

                      <?

                      }

                      ?>
                         </div>
                    </ons-list-item>
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


        <?php } 

        if($status == 1){
            ?>
            <ons-page>
                <ons-list-title>เมนู</ons-list-title>
                <ons-list>
                    <ons-list-item>
                    <div class="center">
                            <img width="100%" height="30%" src="img/<?php echo $_COOKIE["strImg"];?>">
                        </div>
                    </ons-list-item>
                    <ons-list-item icon="md-settings" onclick="fn.pushPage({'id': 'edit_user.html', 'title': 'PullHook'})">
                   
                            <? echo $_COOKIE["strName"];?>
                            <? echo $_COOKIE["strLastname"];?>
                            <div class="right">
                            <ons-icon fixed-width class="list-item__icon" icon="md-settings"></ons-icon>
                            </div>
                        </div>
                       
                    </ons-list-item>
                    <ons-list-item expandable>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-pizza,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                              ประเภทอาหาร
                    <div class="expandable-content">            
                    <?
                      $sqlmenu = "SELECT * FROM categories " ;
                      $resultmenu = $conn->query($sqlmenu);
                     while($row = $resultmenu->fetch_object()){
                    ?>
                            <ons-list-title  value="<? echo $row->categories_id ; ?>" onclick="fn.pushPage({'id': ' Food-<?php echo $row->categories_id;?>.html', 'title': 'PullHook'})">
                                <?echo $row->categories_name ; ?>
                            </ons-list-title>

                      <?

                      }

                      ?>
                         </div>
                    </ons-list-item>
                    <ons-list-item icon="md-settings" onclick="fn.pushPage({'id': 'history.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-document-text"></ons-icon>
                        </div>

                        ประวัติการสั่งซื้อ
                       
                    </ons-list-item>
                    <ons-list-item onclick="window.location.href='logout.php'" >
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
        <? }
        if($status == 2){
            ?>
            <ons-page>
                <ons-list-title>เมนู</ons-list-title>
                <ons-list>
                         <ons-list-item onclick="fn.loadView(0)">
                        <div class="center">
                            <img src="img/<?php echo $_COOKIE["strImg"];?>" width="100%" height="30%">
                       </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.loadView(0)">
                        <? echo $_COOKIE["strName"];?>
                        <? echo $_COOKIE["strLastname"];?>
                        <div class="right">
                            <ons-icon fixed-width class="list-item__icon" icon="md-settings"></ons-icon>
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
                    <ons-list-item onclick="fn.pushPage({'id': 'insert_menu.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            เพิ่มเมนูอาหาร
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.pushPage({'id': 'edit_categories.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            จัดการประเภทอาหาร
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    <ons-list-item onclick="fn.pushPage({'id': 'edit_menu.html', 'title': 'PullHook'})">
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-edit,ion-android, material:md-edit"></ons-icon>
                        </div>
                        <div class="center">
                            จัดการเมนูอาหาร
                        </div>
                        <div class="right">
                        </div>
                    </ons-list-item>
                    
                    <ons-list-item expandable>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-pizza,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                              ประเภทอาหาร
                    <div class="expandable-content">            
                    <?
                      $sqlmenu = "SELECT * FROM categories " ;
                      $resultmenu = $conn->query($sqlmenu);
                     while($row = $resultmenu->fetch_object()){
                    ?>
                            <ons-list-title  value="<? echo $row->categories_id ; ?>" onclick="fn.pushPage({'id': ' Food-<?php echo $row->categories_id;?>.html', 'title': 'PullHook'})">
                                <?echo $row->categories_name ; ?>
                            </ons-list-title>

                      <?

                      }

                      ?>
                         </div>
                    </ons-list-item>
                    <ons-list-item expandable>
                        <div class="left">
                            <ons-icon fixed-width class="list-item__icon" icon="ion-pizza,ion-android, material: md-movie-alt"></ons-icon>
                        </div>
                              แจ้งเตือน
                    <div class="expandable-content">            
                    
                            <ons-list-title  value="กำลังจัดทำอาหาร" onclick="fn.pushPage({'id': ' notification.html', 'title': 'PullHook'})">
                            กำลังจัดทำอาหาร  
                            </ons-list-title>
                            <ons-list-title  value="กำลังจัดส่ง" onclick="fn.pushPage({'id': ' notification_2.html', 'title': 'PullHook'})">
                            กำลังจัดส่ง  
                            </ons-list-title>
                            <ons-list-title  value="ส่งสำเร็จ" onclick="fn.pushPage({'id': ' notification_3.html', 'title': 'PullHook'})">
                            ส่งสำเร็จ  
                            </ons-list-title>

                         </div>
                    </ons-list-item>
                    <ons-list-item onclick="window.location.href='logout.php'" >
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
        <?php }
        ?>
        </template>
        <template id="home.html">
<?
        if($status == 0 || $status == 1)
        {
        $strSQL = "SELECT * FROM categories ";
        $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
        ?>
            <ons-page>
                
        <form class="example" action="search.php" style="margin:auto;max-width:250px">
  <input type="text" placeholder="ใส่เลขที่ใบเสร็จ" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

    <style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 6px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
            <?php
            while($objResult = mysqli_fetch_array($objQuery))
            {
            ?>
                <ons-card onclick="fn.pushPage({'id': 'Food-<?php echo $objResult["categories_id"];?>.html', 'title': 'PullHook'})">
                    <div class="title">
                        <input name="cat_id" type="hidden" value="<?php echo $objResult["categories_id"];?>">
                        <?php echo $objResult["categories_name"] ?>
                    </div>
                    <img class="img-responsive" id="foodimg" src="img/<?php echo $objResult["categories_img"];?>" width="10">           
                </ons-card>

            <?php
            }
            ?>
            </ons-page>
        <?
        }
    else if($status == 2){
                ?>
        <ons-page>
                <script type="text/javascript">
                    window.location.href = "admin.php"
                </script>
      
        </ons-page>
            <?
            }
        ?>
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
                    </div>
                </ons-toolbar>
                    <ons-card>
                    <div align ="center">
                        <h2>เพิ่มประเภทอาหาร</h2>
                    </div>
                    <br>
                    <form onSubmit="JavaScript:return fncSubmit();" action="insert_categories.php" method="post" enctype="multipart/form-data" id="form1" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#" 
                    style="width:0;height:0;border:0px solid #fff;"></iframe>

                        <div class="form-group">
                            <label for="exampleInputCategories">ชื่อประเภทอาหาร</label>
                            <input name="categories_name" type="text" class="form-control" id="exampleInputCategories" aria-describedby="" placeholder="ชื่อประเภทอาหาร" pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
                        </div>
                        <div class="form-group">
                            <label for="img">รูป</label>
                            <input id="img" name="categories_img" type="file">
                        </div>
                        
                        <div align ="center">     
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                      
                        </div>
                    </form>
                    </ons-card>
                </ons-page>
            </template>
            <script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('img').value  == ""  )
    {
        alert('กรุณาเลือกรูปภาพ');
        return false;
    }
}
</script>

<template id="insert_menu.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                       <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                    </div>
                </ons-toolbar>
                    <ons-card>
                    <div align ="center">
                        <h2>เพิ่มเมนูอาหาร</h2>
                    </div>
                    <br>
                    <form onSubmit="JavaScript:return fncSubmit();" action="insert_menu.php" method="post" enctype="multipart/form-data" id="form1" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

                        <div class="form-group">
                            <label for="exampleInputMenu">ชื่อเมนูอาหาร</label>
                            <input name="menu_name" type="text" class="form-control" id="exampleInputMenu" aria-describedby="" placeholder="ชื่อเมนูอาหาร" pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMenu">ราคา(บาท)</label>
                            <input name="price" type="text" class="form-control" id="exampleInputMenu" aria-describedby="" pattern="^[1-9][0-9]*$" title="กรุณากรอก่ตัวเลข" required>
                        </div>

                          <div class="form-group">

                              เลือกประเภท :
                              <br>
                            <ons-select name="type" id="choose-sel" onchange="editSelects(event)">
                            <?

                      $sqlmenu = "SELECT * FROM categories ";
                      $resultmenu = $conn->query($sqlmenu);

                    while($row = $resultmenu->fetch_object()){
                      ?>
                    <option value="<? echo $row->categories_id ; ?>"><?echo $row->categories_name ; ?></option>
      
                      <?

                      }


                      ?>
                            </ons-select>
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputMenu">รูป</label>
                            <input id="img" name="menu_img" type="file">
                        </div>
                        
                        <div align ="center">
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                        </div>
                    </form>
                    </ons-card>
                </ons-page>
            </template>

             <template id="login.html">
        <ons-page id="tabbar-page">
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>Back</ons-back-button>
                </div>

                <div class="center">อยากกินต้องได้กิน</div>
                
            </ons-toolbar>
        <ons-card>
            <div style="text-align: center; margin-top: 30px;">
        <form name="form1" method="post" action="checklogin.php">
            <div class="form-group">
           
        <p>  
            <ons-input name="username" id="username" modifier="underbar" placeholder="Username" float required></ons-input>  
        </p>  
        <p>  
            <ons-input name="password" id="password" modifier="underbar" type="password" placeholder="Password" float required></ons-input>  
        </p>  
        <p style="margin-top: 30px;">  
            <input type="submit" name="login" id="login" class="btn btn-info" value="Login"> 
        </p>  
        </div>
            
</form>
</div>
        </ons-card>
        </ons-page>
    </template>

         <template id="register.html">
        <ons-page id="tabbar-page" onclick="fn.toggleMenu()">

            <ons-toolbar >
                <div class="left">
                    <ons-back-button>Back</ons-back-button>
                </div>

                <div class="center">อยากกินต้องได้กิน</div>
            </ons-toolbar>
        <ons-card>
        <div align ="center">
            <h2>สมัครสมาชิก</h2>
        </div>
         <form name="form1" method="post" action="register.php" enctype="multipart/form-data">

            <div class="form-group">
<label for="exampleInputEmail1">ชื่อผู้ใช้</label>
<input type="Username" class="form-control" id="Username" name="username" aria-describedby="emailHelp" placeholder="Username" pattern="[\w]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [0-9]" required>
</div>
<div class="form-group">
<label for="exampleInputPassword1">รหัสผ่าน</label>
<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">ชื่อ</label>
<input type="Username" class="form-control" id="Username" name="name" aria-describedby="emailHelp" placeholder="Name" 
pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">นามสกุล</label>
<input type="Username" class="form-control" id="Username" name="lastname" aria-describedby="emailHelp" placeholder="Lastname" 
pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
</div>
<div class="form-group">
<label for="exampleInputPassword1">เบอร์โทรศัพท์</label>
<input type="text" class="form-control" id="exampleInputPassword1" name="tel" placeholder="Tel" pattern="[0-9]{1,}" title="กรุณากรอก่ตัวเลข" required >
</div>

<div class="form-group">
<label for="exampleFormControlTextarea1">ที่อยู่จัดส่ง</label>
<textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Address" required></textarea>
</div>
 <div class="form-group">
<label for="exampleInputMenu">รูป</label>
<input name="user_img" type="file">
</div>                       


                    <div align ="center">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
            </form>
        </ons-card>
        </ons-page>
    </template>

        <template id="edit_categories.html">
            <ons-page id="tabbar-page">
            
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">แก้ไขประเภทอาหาร</div>
                    </ons-toolbar>
                    
                
<?php
                include "db2.php";
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
                                        <ons-icon onclick="myFunction()" fixed-width class="list-item__icon" icon="ion-ios-trash,ion-android"></ons-icon>
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
 <script>
function myFunction() {
    alert("ลบสำเร็จ");
}
</script>
        <template id="edit_menu.html">
            <ons-page id="tabbar-page">
            
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">แก้ไขเมนูอาหาร</div>
                    </ons-toolbar>
                    
                
<?php
                include "db2.php";
                $sql = "select * from menu";
                $result = mysqli_query($conn,$sql);
         ?>

    <ons-card>
    <div align ="center">
                        <h2>จัดการเมนูอาหาร</h2>
                    </div>
                    <br>
                <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                
                    <ons-list>
                            <ons-list-item>
                                <div class="left">
                                    <img class="list-item__thumbnail" width="95px" src="img/<?php echo $row['menu_img'];?>">
                                </div>
                                <div class="center">
                                    <span class="list-item__title">
                                       ประเภท : <?php echo $row['menu_name'];?>
                                    </span>
                                </div>
                                <div class="right">
                                    <a onclick="notify()" href="update_menu.php?menu_id=<?php echo $row['menu_id'];?>">
                                        <ons-icon fixed-width class="list-item__icon" icon="ion-hammer,ion-android"></ons-icon>
                                        
                                    </a>
                                    
                                    <a href="delete_menu.php?menu_id=<?php echo $row['menu_id'];?>">
                                        <ons-icon onclick="myFunction()" fixed-width class="list-item__icon" icon="ion-ios-trash,ion-android"></ons-icon>
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
        <script>
function myFunction() {
    alert("ลบสำเร็จ");
}
</script>

        <template id="edit_user.html">
            <ons-page id="tabbar-page" onclick="fn.toggleMenu()">
            
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">จัดการข้อมูล</div>
                    </ons-toolbar>
                    
                
<?php
              
                include "db2.php";
                $username = $_COOKIE['strUsername'];
                $strSQLmenu = "SELECT * FROM register  WHERE username = '$username'";
                $objQuerymenu = mysqli_query($conn, $strSQLmenu);
                 
?>
         

    <ons-card>
    <div align ="center">
                        <h2>แก้ไขข้อมูลส่วนตัว</h2>
                    </div>
                    <br>
        
        <?php
            while($row = mysqli_fetch_array($objQuerymenu, MYSQLI_ASSOC)) {
                ?>
                    <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                        <p>
                                       ชื่อ : <?php echo $row['name'];?>
                                       </p>
                                       <p>
                                       นามสกุล : <?php echo $row['lastname'];?> 
                                       </p>
                                       <p>
                                       เบอร์โทรศัพท์ : <?php echo $row['tel'];?>
                                       </p>
                                       <p>
                                       ที่อยู่ : <?php echo $row['address'];?>
                                       </p>

                                    
                                        <a onclick="notify()" href="update_user.php?username=<?php echo $row['username'];?>">
                                        <p align="center">
                                        <button type="submit" class="btn btn-primary" value="edit">แก้ไขข้อมูล</button> 
                                        </p>
                                        </a>
                               
                                    </span>

                                </div>

                                </ons-list-item>

                        </ons-list>
                       
    <? } ?>
                    </ons-card>
    
                        </ons-page>
        </template>
         
        <template id="confirm_address.html">
         <?php 
        if($status == 1 || $status == 2){
        ?>
            <ons-page id="tabbar-page" onclick="fn.toggleMenu()">
            
                    <ons-toolbar>
                        <div class="left">
                            <ons-back-button>Back</ons-back-button>
                        </div>
                        <div class="center">อยากกินต้องได้กิน</div>
                    </ons-toolbar>
                    
                
<?php
              
                include "db2.php";
                $username = $_COOKIE['strUsername'];
                $strSQLmenu = "SELECT * FROM register  WHERE username = '$username'";
                $objQuerymenu = mysqli_query($conn, $strSQLmenu);
                $result = $conn->query($strSQLmenu);
                 
?>
         

    <ons-card>
    <div align ="center">
                        <h2>ยืนยันที่อยู่</h2>
                    </div>
                    <br>
        
        <?php
            while($row = mysqli_fetch_array($objQuerymenu, MYSQLI_ASSOC)) {
                ?>
                    <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                         
                                        <p>
                                       ชื่อ : <?php echo $row['name'];?>
                                       </p>
                                       <p>
                                       นามสกุล : <?php echo $row['lastname'];?> 
                                       </p>
                                       <p>
                                       เบอร์โทรศัพท์ : <?php echo $row['tel'];?>
                                       </p>
                                       <p>
                                       ที่อยู่ : <?php echo $row['address'];?>
                                       </p>

                                    
                                        <a onclick="notify()" href="confirm_address.php?username=<?php echo $row['username'];?>">
                                        <p align="center">
                                        <button type="submit" class="btn btn-primary" value="edit">แก้ไขข้อมูล</button>
                                    </a>
                                        <button type="submit" class="btn btn-primary" value="edit" onclick="fn.pushPage({'id': 'paypal.html', 'title': 'PullHook'})">ดำเนินการต่อ</button>
                                        </p>
                                        
                               
                                    </span>

                                </div>

                                </ons-list-item>

                        </ons-list>
                       
    <?  } ?>
                    </ons-card>
                        </ons-page>
                        <?php } 

        if($status == 0){
            ?>
                    <ons-page id="tabbar-page" onclick="fn.toggleMenu()">

            <ons-toolbar >
                <div class="left">
                    <ons-back-button>Back</ons-back-button>
                </div>

                <div class="center">อยากกินต้องได้กิน</div>
            </ons-toolbar>
        <ons-card>
        <div align ="center">
            <h2>กรอกที่อยู่จัดส่ง</h2>
        </div>     
        <form name="form1" id="form1" action="paypal.php" method="post">
            <div class="form-group">
<div class="form-group">
<label for="exampleInputname">ชื่อ</label>
<input type="Username" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name" 
pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
</div>
<div class="form-group">
<label for="exampleInputlastname">นามสกุล</label>
<input type="Username" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" placeholder="Lastname" 
pattern="[A-Za-zก-๋]{1,}" title="ใช้ได้เฉพาะ [a-z] [A-Z] [ก-ฮ]" required>
</div>
<div class="form-group">
<label for="exampleInputtel">เบอร์โทรศัพท์</label>
<input type="text" class="form-control" id="tel" name="tel" placeholder="Tel" pattern="[0-9]{1,}" title="กรุณากรอก่ตัวเลข" required >
</div>

<div class="form-group">
<label for="exampleFormControlTextarea1">ที่อยู่จัดส่ง</label>
<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address" required></textarea>
</div>
                    <div align ="center">                   
                    <button type="submit" value="" class="btn btn-primary" onclick="checkPaymentInfo()">Submit</button>             
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                    <?
                    $names = $_POST['name'];
                    setcookie("name", $names, time()+3600*24*365);
                    $lastname = $_POST['lastname'];
                    setcookie("lastname", $lastname, time()+3600*24*365);
                    $tel = $_POST['tel'];
                    setcookie("tel", $tel,time()+3600*24*365);
                    $address = $_POST['address'];
                    setcookie("address", $address,time()+3600*24*365);
                    ?>
                    
            </form>
        </ons-card>
        </ons-page>
    <? } ?>
    
        </template>
         
        <script>
function checkPaymentInfo()
{
    if(jQuery("#name").val() != '' &&
        jQuery("#lastname").val() != '' &&
        jQuery("#tel").val() != '' &&
        jQuery("#address").val() != ''
    ) {
        fn.pushPage({'id': 'paypal.html', 'title': 'PullHook'});
    }
    return false;
}
</script>

<template id="notification.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                </ons-toolbar>
                 <?php
              
     
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);

        
                      $sqlmenu = "SELECT * FROM orders where status = 'กำลังจัดทำอาหาร' ORDER BY order_id DESC" ;
                      $resultmenu = $conn->query($sqlmenu);
                      ?>
                <ons-card  onclick="fn.toggleMenu()">
    <div align ="center">
                        <h2>สถานะของรายการ</h2><br>
                    </div>
                    
      
        <?php
            while($row = mysqli_fetch_array($resultmenu, MYSQLI_ASSOC)) {
                ?> 
                <form name="form1" method="get" action="update_status.php">
                     <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                     เลขที่ใบเสร็จ : <? echo $row['order_id']; ?>
                                    </span>
                                    <span class="list-item__title">
                                    สถานะ : <? echo $row['status']; ?>
                                    </span>                
                    <ons-select name="status" id="choose-sel">
                      <option value="กำลังจัดทำอาหาร">กำลังจัดทำอาหาร</option>
                      <option value="กำลังจัดส่ง"> กำลังจัดส่ง</option>
                      <option value="ส่งเรียบร้อย"> ส่งเรียบร้อย</option>
                </ons-select>
                                </div>
              
                <div class="right">
                    <input type="hidden" name="order_id" value="<? echo $row['order_id'];?>">
                    <input class="btn btn-primary"  type="submit" name="submit" value="ยืนยัน">
                </div>
               

                            </ons-list-item>
                        </ons-list>
                       <? } ?>
</form>
                    </ons-card>
                        </ons-page>
            </template>

       
      

            <template id="notification_2.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                </ons-toolbar>
                 <?php
              
     
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);

        
                      $sqlmenu = "SELECT * FROM orders where status = 'กำลังจัดส่ง' ORDER BY order_id DESC" ;
                      $resultmenu = $conn->query($sqlmenu);
                      ?>
                <ons-card  onclick="fn.toggleMenu()">
    <div align ="center">
                        <h2>สถานะของรายการ</h2><br>
                    </div>
                    
      
        <?php
            while($row = mysqli_fetch_array($resultmenu, MYSQLI_ASSOC)) {
                ?> 
                <form name="form1" method="get" action="update_status.php">
                     <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                     เลขที่ใบเสร็จ : <? echo $row['order_id']; ?>
                                    </span>
                                    <span class="list-item__title">
                                    สถานะ : <? echo $row['status']; ?>
                                    </span>                
                    <ons-select name="status" id="choose-sel">
                      <option value="กำลังจัดทำอาหาร">กำลังจัดทำอาหาร</option>
                      <option value="กำลังจัดส่ง"> กำลังจัดส่ง</option>
                      <option value="ส่งเรียบร้อย"> ส่งเรียบร้อย</option>
                </ons-select>
                                </div>
              
                <div class="right">
                    <input type="hidden" name="order_id" value="<? echo $row['order_id'];?>">
                    <input class="btn btn-primary"  type="submit" name="submit" value="ยืนยัน">
                </div>
               

                            </ons-list-item>
                        </ons-list>
                       <? } ?>
</form>
                    </ons-card>
                        </ons-page>
            </template>

      

<template id="notification_3.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                </ons-toolbar>
                 <?php
              
     
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);

        
                      $sqlmenu = "SELECT * FROM orders where status = 'ส่งเรียบร้อย' ORDER BY order_id DESC" ;
                      $resultmenu = $conn->query($sqlmenu);
                      ?>
                <ons-card  onclick="fn.toggleMenu()">
    <div align ="center">
                        <h2>สถานะของรายการ</h2><br>
                    </div>
                    
      
        <?php
            while($row = mysqli_fetch_array($resultmenu, MYSQLI_ASSOC)) {
                ?> 
                     <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                     เลขที่ใบเสร็จ : <? echo $row['order_id']; ?>
                                    </span>
                                    
                                      สถานะ : <font color="green"> <? echo $row['status']; ?> </font>
                                </div>
                    
               

                            </ons-list-item>
                        </ons-list>
                       <? } ?>
</form>
                    </ons-card>
                        </ons-page>
            </template>


            <template id="history.html">
                <ons-page>
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>
                    <div class="center">อยากกินต้องได้กิน</div>
                       
                            
                </ons-toolbar>

<?php
include "db2.php";
$names = $_COOKIE['strName'];

        $strSQL = "SELECT * FROM orders  where name = '$names' ORDER BY order_id DESC";
        $objQuery = mysqli_query($conn, $strSQL)  or die(mysqli_error($conn));
        ?>
                    <ons-card onclick="fn.toggleMenu()">
                    <div align ="center">
                        <h2>ประวัติการสั่งซื้อ</h2>
                    </div>
                    <br>
                    <?
        while($objResult = mysqli_fetch_array($objQuery)) {
        ?>
        <template id="<?php echo $objResult['order_id'];?>.html">
        <?php

$strSQLmenu = "SELECT * FROM order_detail WHERE order_id = '".$objResult['order_id']."'";
$objQuerymenu = mysqli_query($conn, $strSQLmenu)  or die(mysqli_error($conn));
?>
<ons-page id="tabbar-page" class="red">
                <ons-toolbar>
                    <div class="left">
                        <ons-back-button>Back</ons-back-button>
                    </div>

                    <div class="center">อยากกินต้องได้กิน</div>
                    <div class="right">
                        <ons-toolbar-button>
                            <span class="badge badge-pill badge-primary"></span></ons-icon>
                        </ons-toolbar-button>

                    </div>
                </ons-toolbar>
                
                
                <?php
  while($objMenu = mysqli_fetch_array($objQuerymenu))
  {
  ?>
            <ons-card onclick="fn.toggleMenu()">
                <form id="name1" action="index.php" method="post">
                <div align ="center">
                        <h2>ใบเสร็จการสั่งซื้อ</h2>
                    </div>
                    <p class="list-item__title">เลขที่ใบเสร็จ : <?php echo $objMenu["order_id"];?></p>
                    <p class="list-item__title">เวลาสั่งซื้อ : <?php echo $objResult["date"];?></p>
                    <p class="list-item__title">ชื่อรายการ : <?php echo $objMenu["order_name"];?></</p>
                    <p class="list-item__title">ราคา : <?php echo $objMenu["price"];?> บาท</</p>
                    <p class="list-item__title">จำนวน : <?php echo $objMenu["quantity"];?></</p>
                    <p class="list-item__title">ราคารวม : <?php echo $objMenu["total"];?> บาท</</p>
                    <p class="list-item__title">ค่าจัดส่ง : 40 บาท</p>    
                    
                    <?
                    $total2 = $objMenu["total"] + 40 ; ?>

                    <div align="right">
                        <p class="list-item__title">รวมทั้งสิ้น : <? echo $total2; ?> บาท</p> 
                    </div>
                   
                </form>
            </ons-card>
                
<?php
  }
  ?>
</ons-page>

        </template>
                
                    <ons-list>
                            <ons-list-item>
                                <div class="center">
                                    <span class="list-item__title">
                                     เลขที่ใบเสร็จ : <? echo $objResult['order_id']; ?>
                                    </span>
                                </div>
                                <div class="right">
                                   <ons-button onclick="fn.pushPage({'id': '<?php echo $objResult['order_id'];?>.html', 'title': 'PullHook'})"> รายละเอียด</ons-button>
                                </div>
                                
                               

                            </ons-list-item>
                        </ons-list>
                    <? } ?>
                    </ons-card>
                </ons-page>
            </template>

        <link rel="stylesheet" href="css-components-src\src\theme.css" />
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
    </body>
</html>