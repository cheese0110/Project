
 <meta charset="UTF-8">
 <?php
    include "db2.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    $sql = "INSERT INTO order (username,password,name,lastname,tel,address,user_img)
    VALUES ('$username','$password','$name','$lastname','$tel','$address','$img')";

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