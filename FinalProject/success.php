<?php
    include "db2.php";

    $menu_id = $_GET['menu_id'];
    $sqlcat = "SELECT * FROM menu WHERE menu_id = '$menu_id'";
    $rescat = mysqli_query($conn,$sqlcat);
    $rowcat = mysqli_fetch_array($rescat, MYSQLI_ASSOC);



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
                    <a href = "index.php">
                        <ons-back-button>Home</ons-back-button>
                    </a>
                    </div>

                    <div class="center">แจ้งการทำรายการ</div>
                    <div class="right">
                        <ons-toolbar-button onclick="fn.toggleMenu()">
                            <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
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
                    
                    </ons-card>
                </ons-page>
            </template>
            
        <link rel="stylesheet" href="a.css" />
        <script src="app.js"></script>
</body>
</html>