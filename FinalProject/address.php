
 <meta charset="UTF-8">
 <?php
    include "db2.php";

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    $sql = "INSERT INTO register (name,lastname,tel,address,user_img)
    VALUES ($name','$lastname','$tel','$address','$img')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        ?>

    <script language="JavaScript">
        alert("สมัครสมาชิกสำเร็จ");
        window.location.href = "paypal.php";
       </script>
<?php

    } else {
        ?>

    <script language="JavaScript">
        alert("Username ซ้ำกรุณาลองใหม่");
        window.location.href = "index.php";
       </script>
<?php
    }

    msqli_close($conn);
    



?>