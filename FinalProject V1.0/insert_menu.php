<?php
move_uploaded_file($_FILES["menu_img"]["tmp_name"],"img/".$_FILES["menu_img"]["name"]);
include "db2.php";

$message = "";

$menu_name = $_POST['menu_name'];
$menu_price = $_POST['price'];
$menu_type = $_POST['type'];
$menu_img = $_FILES["menu_img"]['name'];

$sql = "INSERT INTO menu (menu_name,price,cat_id,menu_img) 
VALUES ('$menu_name','$menu_price','$menu_type','$menu_img')";
$result = mysqli_query($conn,$sql);

if ($result) {
        header("Location: table-menu.php");
    } else {
        echo "ไม่สำเร็จ". mysqli_error($conn);
    }

    msqli_close($conn);
    



?>