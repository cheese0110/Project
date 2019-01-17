<meta charset="UTF-8">
<?php
    include "db2.php";

    $menu_id = $_POST['menu_id'];
    $menu_name = $_POST['menu_name'];
    $price = $_POST['price'];
    $cat_id = $_POST['type'];


    $sql = "UPDATE menu SET menu_name = '$menu_name' , price = '$price' , cat_id = '$cat_id'
            WHERE menu_id ='$menu_id' ";
    $result = $conn->query($sql);

    if($result){
        
        ?>

<script language="JavaScript">
        alert("Update สำเร็จ");
        window.location.href = "index.php";
       </script>
<?php
    } else {
        ?>
    <script language="JavaScript">
        alert("Update ไม่สำเร็จ");
        window.location.href = "index.php";
       </script>
<?php
    }

    mysqli_close($conn);
 

?>