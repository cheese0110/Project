<meta charset="UTF-8">
<?php
    include "db2.php";

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel']; 
    $address = $_POST['address'];


    $sql = "UPDATE register SET name = '$name' ,password = '$password', lastname = '$lastname' , tel = '$tel', address = '$address'
            WHERE username ='$username'";
    $result = $conn->query($sql);

    if($result){
        
        ?>

<script language="JavaScript">
        alert("Update ข้อมูลสำเร็จ");
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