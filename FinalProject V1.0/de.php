<?php
    include "db2.php";
    $categories_id = $_POST['categories_id'];
    
    $sqldel = "SELECT categories_img FROM categories WHERE categories_id='$categories_id'";
    $resdel = mysqli_query($conn, $sqldel);
    $categories_img = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $filename = $categories_img[0];

    @unlink('img/'.$filename);

    $sql = "DELETE FROM categories WHERE categories_id = '$categories_id'";
    $result = mysqli_query($conn, $sql);
?>