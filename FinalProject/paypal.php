<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
        <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    </head>
</head>
<body>
<ons-navigator id="appNavigator" swipeable swipe-target-width="350px">
            <ons-page>
                <ons-splitter id="appSplitter">
                    <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>

                    <ons-splitter-content page="paypal.html"></ons-splitter-content>

                </ons-splitter>

            </ons-page>
        </ons-navigator>

        <template id="paypal.html">
            <ons-page>
                <ons-page id="tabbar-page">
                    <ons-toolbar>
                        <div class="left">
                         <a href = "index.php">
                            <ons-back-button>Home</ons-back-button>
                        </a>
                        </div>
                        <div class="center">ชำระเงิน</div>   
                    </ons-toolbar>
                    
                                 <ons-card>
                                    <h2> <p align="center">ชำระเงิน</p> </h2>
                                   <div style="text-align:center;" id="paypal-button-container"></div>
                                   <form name="form2" id="form2" action="check_payment2.php" method="post">
                           
                            
                               
                            <?php 
                    $names = $_POST['name'];
                    setcookie("name", $names,time()+3600*24*365);

                    $lastname = $_POST['lastname'];
                    setcookie("lastname",$lastname, time()+3600*24*365);

                    $tel = $_POST['tel'];
                    setcookie("tel", $tel, time()+3600*24*365);

                    $address = $_POST['address'];
                    setcookie("address", $address,time()+3600*24*365);

                                if(isset($_COOKIE["shopping_cart"]))
                                    {
                                        $total =0;
                                        $tax = 40;
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        foreach($cart_data as $keys => $values)
                                           
                                        {
                                        
                                           ?> 
                                       
                                    <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    $total2 = $total + $tax;
                                    
                }       
            ?>
                            
            <?php
            }
            else
            {
                                
                               }
                               ?>

    <script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AUCEkMYFCs7LVagzYlM13f0-7DfZWDe-555SoRU-WB_ThlrMmxJUsAAyCxll75DpXCFVBoUgvslFoEbf',
                production: 'Abg-2jKY-9KyIDg7Vdk_DNvUzkvUrxyxqWDp5ottR_0kZRh3uZ-XVGEiWqK0sLyYXh-y8UPVMhCX7uaF'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {

                        transactions: [{
                            amount: 
                            { 
                                total: '<?php echo $total2; ?>', 
                                currency: 'THB'
                            },
                            item_list: {
                                
                                items: [
                                    <?php
                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true);
                                    foreach($cart_data as $keys => $values) :
                                    ?>
                                    {
                                        name: '<?php echo $values["item_name"]; ?>',
                                        description: 'อาหารตามสั่ง อยากกินต้องได้กิน',
                                        quantity: '<?php echo $values["item_quantity"]; ?>',
                                        price: '<?php echo number_format($values["item_price"]); ?>',
                                        tax: '0',
                                        sku: '1',
                                        currency: 'THB'
                                    },
                                    <?php ;endforeach ?>
                                    {
                                        name: 'ค่าจัดส่ง',
                                        description: 'Delivery',
                                        quantity: '1',
                                        price: '40.00',
                                        tax: '0',
                                        sku: '1',
                                        currency: 'THB'
                                    }
                                ]
                            },
                        }]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                    window.location.href="check_payment2.php";
                });
            }

        }, '#paypal-button-container');


    </script>
     </form>
                            </ons-card>
                                
  </ons-page>
        </template>