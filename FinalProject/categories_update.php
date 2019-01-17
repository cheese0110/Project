<meta charset="UTF-8">
<?php
    include "db2.php";

    $categories_id = $_POST['categories_id'];
    $categories_name = $_POST['categories_name'];


    $sql = "UPDATE categories SET categories_name = '$categories_name' 
            WHERE categories_id ='$categories_id' ";
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