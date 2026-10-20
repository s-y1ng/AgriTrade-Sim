<?php
 include 'components/connection.php'; 
 session_start();
 if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
        exit();
    }

    $grand_total = 0;

    if (isset($_POST['place_order'])) {
        header("Location: order.php");
        exit();
        
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $address = $_POST['flat'].', '.$_POST['street'].', '.$_POST['city'].', '. $_POST['pincode'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);
        $address_type = $_POST['address_type'];
        $address_type = filter_var($address_type, FILTER_SANITIZE_STRING);
        $method = $_POST['method'];
        $method = filter_var($method, FILTER_SANITIZE_STRING);

        $varify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
        $varify_cart->execute([$user_id]);

        if (isset($_GET['get_id'])) {
            $select_get = $conn->prepare("SELECT * FROM `products` WHERE id=?");
            $select_get->execute([$_GET['get_id']]);
            while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
                $sub_total = $fetch_get['price'];
                $grand_total += $sub_total;
        ?>
        <div class="flex">
            <img src="image/<?=$fetch_get['image']; ?>" class="image">
            <div>
                <h3 class="name"><?=$fetch_get['name']; ?></h3>
                <p class="price"><?=$fetch_get['price']; ?>/-</p>
            </div>
        </div>
        <?php
            }
        } elseif ($varify_cart->rowCount() > 0) {
            while ($fetch_cart = $varify_cart->fetch(PDO::FETCH_ASSOC)) {
                $select_product = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                $select_product->execute([$fetch_cart['product_id']]);
                $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
                $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?,?)");
                $insert_order->execute([$user_id, $name, $number, $email, $address, $address_type, $method, $fetch_product['id'], $fetch_cart['price'], $fetch_cart['qty']]);
            }
            if ($insert_order) {
                $order_id = $conn->lastInsertId();
                $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
                $delete_cart_id->execute([$user_id]);
                header('location: order.php');
                exit();
            } else {
                echo 'Order insertion failed.';
            }
        } else {
            echo 'Cart is empty or something went wrong.';
        }
    }

?>
<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>AgriTrade & Sim - checkout page</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>checkout summary</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ checkout summary</span>
        </div>
        <section class="checkout">
            <div class="title">
                <img src="image/download.png">
                <h1>checkout summary</h1>
                <p>Grab your stock before it runs out!</p>
            </div>
                <div class="form-container">
                    <form method="post" action="">
                        <div class="row">
                            <div class="column">
                                <h3 class="title">Billing Address</h3>
                                <div class="input-box">
                                    <span>Full Name :</span>
                                    <input type="text" name="name" placeholder="Enter Your Name">
                                </div>
                                <div class="input-box">
                                    <span>Email :</span>
                                    <input type="text" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="input-box">
                                    <span>Address :</span>
                                    <input type="text" name="flat" placeholder="Enter Your Address">
                                </div>
                                <div class="input-box">
                                    <span>City :</span>
                                    <input type="text" name="city" placeholder="Enter Your City">
                                </div>
                                
                                <div class="flex">
                                    <div class="input-box">
                                        <span>State :</span>
                                        <input type="text" name="street" placeholder="Enter Your State">
                                    </div>
                                    <div class="input-box">
                                        <span>Full Zip Code :</span>
                                        <input type="number" name="pincode" placeholder="Enter Your Zip Code">
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <h3 class="title">Payment</h3>
                                <div class="input-box">
                                    <span>Cards Accepted :</span>
                                    <img src="image/imgcards.png" alt="">
                                </div>
                                <div class="input-box">
                                    <span>Name On Card :</span>
                                    <input type="text" name="address_type" placeholder="Enter Your Name">
                                </div>
                                <div class="input-box">
                                    <span>Credit Card Number :</span>
                                    <input type="number" name="number" placeholder="1111 2222 3333 4444">
                                </div>
                                <div class="input-box">
                                    <span>Expiry Date :</span>
                                    <input type="text" name="method" placeholder="MM/YY">
                                </div>
                                <div class="flex">
                                    <div class="input-box">
                                        <span>CVV :</span>
                                        <input type="number" placeholder="123">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="place_order" class="form-btn">Place Order</button>
                    </form>
                </div>
                    <div class="summary">
                        <h3>my bag</h3>
                        <div class="box-container">
                            <?php
                                if (isset($_GET['get_id'])) {
                                    $select_get = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                                    $select_get->execute([$_GET['get_id']]);
                                    while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
                                        $sub_total = $fetch_get['price'];
                                        $grand_total += $sub_total;
                            ?>
                            <div class="flex">
                                <img src="image/<?=$fetch_get['image']; ?>" class="image">
                                <div>
                                    <h3 class="name"><?=$fetch_get['name']; ?></h3>
                                    <p class="price"><?=$fetch_get['price']; ?>/-</p>
                                </div>
                            </div>
                            <?php
                                    }
                                }else{
                                    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
                                    $select_cart->execute([$user_id]);
                                    if ($select_cart->rowCount() > 0) {
                                        while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                                            $select_products=$conn->prepare("SELECT * FROM `products` WHERE id=?");
                                            $select_products->execute([$fetch_cart['product_id']]);
                                            $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
                                            $sub_total= ($fetch_cart['qty'] * $fetch_product['price']);
                                            $grand_total += $sub_total;
                            ?>
                            <div class="flex">
                                <img src="image/<?=$fetch_product['image']; ?>">
                                <div>
                                    <h3 class="name"><?=$fetch_product['name']; ?></h3>
                                    <p class="price"><?=$fetch_product['price']; ?> X <?=$fetch_cart['qty']; ?></p>
                                </div>
                            </div>
                            <?php 
                                        }
                                    }else{
                                        echo '<p class="empty">your cart is empty</p>';
                                    }
                                }
                            ?>
                        </div>
                        <div class="grand_total"><span>total amount payable: </span>$<?= $grand_total ?>/-</div>
                    </div>
            </div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>