<meta charset="UTF-8">
<?php
    include "db2.php";
            
            $order_status = $_GET['status'];
            $order_id = $_GET['order_id'];

    $sql = "UPDATE orders SET status = '$order_status'
            WHERE order_id ='$order_id' ";
    $result = $conn->query($sql);

    if($result){
        
        ?>

<script language="JavaScript">
        alert("เปลี่ยนสถานะสำเร็จ");
        window.location.href = "index.php";
       </script>
<?php
    } else {
        ?>
    <script language="JavaScript">
        alert("เปลี่ยนสถานะไม่สำเร็จ");
        window.location.href = "index.php";
       </script>
<?php
    }

    mysqli_close($conn);
 

?>