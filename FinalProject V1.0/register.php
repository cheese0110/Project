
 <meta charset="UTF-8">
 <?php
 move_uploaded_file($_FILES["user_img"]["tmp_name"],"img/".$_FILES["user_img"]["name"]);
    include "db2.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $img = $_FILES["user_img"]['name'];
    $date= date('Y-m-d H:i:s');
    $salt = 'xsdsdfefe';
    $hash_password = hash_hmac('sha256',$password,$salt);
    

    $sql = "INSERT INTO register (username,password,name,lastname,tel,address,user_img,date)
    VALUES ('$username','$password','$name','$lastname','$tel','$address','$img','$date')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        ?>

    <script language="JavaScript">
        alert("สมัครสมาชิกสำเร็จ");
        window.location.href = "index.php";
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

    mysqli_close($conn);
    



?>