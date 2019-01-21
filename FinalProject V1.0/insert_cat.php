
<?php
include "db2.php";

$categories_name = $_POST['categories_name'];
//upload img

//uploading
move_uploaded_file($_FILES["categories_img"]["tmp_name"],"img/".$_FILES["categories_img"]["name"]);
	
$categories_img = $_FILES["categories_img"]['name'];

$sql = "INSERT INTO categories (categories_name,categories_img) VALUES ('$categories_name','$categories_img')";
$result = mysqli_query($conn,$sql);


     if($result){
        header("Location: table-cat.php");
    } else {
        echo "no" . mysqli_error($conn);
    }

?>