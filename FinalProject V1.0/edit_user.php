
<!DOCTYPE html>
<html lang="en">
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
                                       รหัสผู้ใช้งาน : <?php echo $row['username'];?>
                                       </p>
                                       <p>
                                       รหัสผ่าน : <?php echo $row['password'];?> 
                                       </p>
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
         <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
</body>
</html>

         