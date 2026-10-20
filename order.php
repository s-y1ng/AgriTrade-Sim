<?php
 include 'components/connection.php'; 
 session_start();
 if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
        header('location: login.php');
        exit();
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
        exit();
    }
 
?>
<style type="text/css">
    <?php include 'style.css'; ?>
    .box-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        padding: 1rem;
        width: 100%;
    }

    .box {
        width: 100%;
        max-width: 1200px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .box:hover {
        transform: translateY(-5px);
    }

    .box img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #eee;
    }

    .box .row {
        padding: 1rem;
    }

    .box .name {
        font-size: 1.2rem;
        color: var(--green);
        margin-bottom: 0.5rem;
    }

    .box .price {
        font-size: 1rem;
        color: #555;
        margin-bottom: 0.5rem;
    }

    .box .status {
        font-size: 1rem;
        font-weight: bold;
    }

    .date {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 0.5rem;
        text-align: right;
        padding: 0.5rem;
        background-color: #f9f9f9;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>AgriTrade & Sim - order page</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>My Orders</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ order</span>
        </div>
        <section class="products">
            <div class="box-container">
                <div class="title">
                    <img src="image/download.png" class="">
                    <h1>my orders</h1>
                    <p>View your order history and track the status of your recent purchases.</p>
                </div>
                <div class="product_detail">
                    <?php
                        $select_latest_order = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY date DESC LIMIT 1");
                        $select_latest_order->execute([$user_id]);
                        if ($select_latest_order->rowCount() > 0) {
                            $fetch_order = $select_latest_order->fetch(PDO::FETCH_ASSOC);
                            $select_product = $conn->prepare("SELECT * FROM products WHERE id = ?");
                            $select_product->execute([$fetch_order['product_id']]);
                            $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="box" <?php if($fetch_order['status']=='cancel'){echo 'style="border:2px solid red"';} ?>>
                        <a href="view_order.php?get_id=<?= $fetch_order['id']; ?>">
                            <p class="date"><?=$fetch_order['date']; ?></p>
                            <img src="image/<?= $fetch_product['image']; ?>" class="image">
                            <div class="row">
                                <h3 class="name"><?= $fetch_product['name']; ?></h3>
                                <p class="price">Price : $<?= $fetch_product['price']; ?> x <?= $fetch_order['qty']; ?></p>
                                <p class="status" style="color:<?php 
                                    if($fetch_order['status']=='delivered'){
                                        echo 'green';
                                    }elseif($fetch_order['status']=='canceled'){
                                        echo 'red';
                                    }else{
                                        echo 'orange';
                                    } 
                                ?>"><?= $fetch_order['status']; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php
                        } else {
                            echo '<p class="empty">No orders placed yet!</p>';
                        }
                    ?>
                </div>
            </div>
        </section>
        
        <div class="order-history-button">
            <a href="order_history.php" class="btn">View Order History</a>
        </div>
        
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>