<?php
    include "db2.php";
    $menu_id = $_GET['menu_id'];

    $sqldel = "SELECT menu_img FROM menu WHERE menu_id='$menu_id'";
    $resdel = mysqli_query($conn, $sqldel);
    $menu_img = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $filename = $menu_img[0];

    @unlink('img/'.$filename);

    $sql = "DELETE FROM menu WHERE menu_id = '$menu_id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php");
    } else {
        echo "ลบไม่สำเร็จ" . mysqli_error($conn);
    }
?>