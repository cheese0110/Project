<meta charset="UTF-8">
<?php
include "db2.php";

    $cat_name = $_POST['categories_name'];

    // upload img
    $ext = pathinfo(basename($_FILES['categories_img']['name']), PATHINFO_EXTENSION);
    $new_img_name = 'img_'.uniqid().".".$ext;
    $img_path = "img/";
    $upload_path = $img_path.$new_img_name;
    // uploading
    $successs = move_uploaded_file($_FILES['categories_img']['tmp_name'],$upload_path);
    if($successs == FALSE) {
        echo "ไม่สามารถ upload รูปภาพได้";
        exit();
    }

    $cat_img = $new_img_name;


    $sql = "INSERT INTO categories (categories_name,categories_img) VALUES ('$cat_name','$cat_img')";

    $result = mysqli_query($conn,$sql);

    if($result) {
        echo "complete";

    }else{
        echo "no".mysqli_errno($conn);
    } 

    
    mysqli_close($conn);

?>