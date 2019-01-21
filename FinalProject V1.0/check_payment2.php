<form name="form1" id="form1" action="payment2.php" method="post">
    
<?php          
                include "db2.php";
                $names = $_COOKIE["name"];
                $lastname = $_COOKIE["lastname"];
                $tel = $_COOKIE["tel"];
                $address = $_COOKIE["address"];

                ?>
                </form>
                <?
                $tax = 40;
                $total2 = 0;
                $dated= date('Y-m-d H:i:s');
                $status = 'ออเดอร์เข้า';
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);



               $sql1 = "INSERT INTO orders (order_id,name,lastname,tel,address,status,date) 
               VALUES (Null,'$names','$lastname','$tel','$address','$status','$dated')";
                $query1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysql_error());
              

        $sql2 = "SELECT MAX(order_id) AS order_id FROM orders  WHERE name='$names'";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($query2);
        $order_id = $row['order_id'];
        

    foreach ($cart_data as $keys => $values) 
    {
        $sql3   = "SELECT * FROM menu where menu_id='$menu_id'";
        $query3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($query3);
        $total = $values['item_quantity']*$values['item_price'];
        $item_id = $values['item_id'];
        $item_name = $values['item_name'];
        $item_price = $values['item_price'];
        $item_quantity = $values['item_quantity'];
       
        

        $sql4   = "INSERT INTO order_detail (order_id,order_name,menu_id,quantity,price,total) VALUES ('$order_id','$item_name','$item_id','$item_quantity','$item_price','$total')";
                $query4 = mysqli_query($conn, $sql4) or die ("Error in query: $sql4 " . mysql_error());

                $sql5 = "INSERT INTO sales (sale_id,sale_name,sale_amount,sale_total,sale_date) 
                VALUES (NULL,'$item_name','$item_quantity','$total','$dated')";
                $query5 = mysqli_query($conn, $sql5) or die ("Error in query: $sql5 " . mysql_error());

    }
    if($query1 && $query4){
        mysqli_query($conn, "COMMIT");
        $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
        foreach($cart_data as $menu_id)
        {   
            
            unset($cart_data);
            header("Location:payment2.php");
        }
    }
    else{
        mysqli_query($conn, "ROLLBACK"); 
        $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";  
    }
    
?>