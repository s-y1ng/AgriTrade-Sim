<?php
include 'components/connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
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
    .order-again-btn {
        background-color: var(--green);
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.3s;
        display: inline-block;
        margin-top: 1rem;
    }

    .order-again-btn:hover {
        background-color: var(--dark-green);
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Order History</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Order History</h1>
        </div>
        <div class="order-history-container">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY date DESC");
            $select_orders->execute([$user_id]);
            if ($select_orders->rowCount() > 0) {
                while ($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    $select_product = $conn->prepare("SELECT * FROM products WHERE id = ?");
                    $select_product->execute([$fetch_order['product_id']]);
                    $fetch_product = $select_product->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="order-box">
                <p class="date"><?= $fetch_order['date']; ?></p>
                <img src="image/<?= $fetch_product['image']; ?>" alt="<?= $fetch_product['name']; ?>" class="image">
                <h3 class="name"><?= $fetch_product['name']; ?></h3>
                <p class="price">Price: $<?= $fetch_product['price']; ?> x <?= $fetch_order['qty']; ?></p>
                <p class="status" style="color:<?php 
                    if ($fetch_order['status'] == 'delivered') {
                        echo 'green';
                    } elseif ($fetch_order['status'] == 'canceled') {
                        echo 'red';
                    } else {
                        echo 'orange';
                    }
                ?>"><?= $fetch_order['status']; ?></p>
                <a href="checkout.php?get_id=<?= $fetch_product['id']; ?>" class="order-again-btn">Order Again</a>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">No orders placed yet!</p>';
            }
            ?>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>
</html>