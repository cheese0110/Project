<meta charset="UTF-8">
<?php
move_uploaded_file($_FILES["categories_img"]["tmp_name"],"img/".$_FILES["categories_img"]["name"]);
include "db2.php";

$cat_name = $_POST['categories_name'];
$cat_img = $_FILES["categories_img"]['name'];


    $sql = "SELECT * FROM categories  WHERE  categories_name = '$cat_name'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    $num = mysqli_num_rows($result);

        if($num > 0)        
        {
             echo "<script>";
             echo "alert('มีชื่อประเภทอาหารนี้แล้ว !!!');";
             echo "window.location='index.php';";
             echo "</script>";
 
        }else{
            
        $sql = "INSERT INTO categories (categories_name,categories_img) VALUES ('$cat_name','$cat_img')";
        $result = mysqli_query($conn,$sql);
    
            }
         
         
    mysqli_close($conn);    

if($result){
            echo "<script type='text/javascript'>";
            echo "alert ('เพิ่มประเภทอาหารสำเร็จ');";
            echo "window.location='admin.php';";
            echo "</script>";
      }
      else{
            echo "<script type='text/javascript'>";
            echo "alert ('ไม่สามารถเพิ่มประเภทอาหารได้!');";
            echo "window.location='admin.php';";
          echo "</script>";
      }      

?>