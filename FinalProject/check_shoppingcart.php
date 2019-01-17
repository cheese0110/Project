 <?php 
    if(isset($_POST["add_to_cart"]))
    {
        $item_array = array(
            'item_id' => $_POST["hidden_id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $cart_data[] = $item_array;
        $iteam_data = json_encode($cart_data);
        setcookie('shopping_cart', $iteam_data, time() + (86400 * 30));
        header("location:index.php?success=1");
    }
    if(isset($_GET["success"]))
    {
        $message = '
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Item Added into cart
        </div>
        ';
    }
?>