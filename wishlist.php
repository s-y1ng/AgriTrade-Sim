<?php
 include 'components/connection.php'; 
 session_start();
 if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '';
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
        exit(); // Ensure exit after header redirection
    }
    
    // Adding products to cart
    if (isset($_POST['add_to_cart'])) {
        $id = unique_id(); // Ensure this function is defined
        $product_id = $_POST['product_id'];

        $qty = 1;
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $varify_cart = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ? AND product_id = ?");
        $varify_cart->execute([$user_id, $product_id]);

        $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $max_cart_items->execute([$user_id]);

        if ($varify_cart->rowCount() > 0) {
            $warning_msg[] = 'Product already exists in your cart';
        } else if ($max_cart_items->rowCount() > 20) {
            $warning_msg[] = 'Cart is full';
        } else {
            $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
            $select_price->execute([$product_id]);
            $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

            if ($fetch_price) {
                $insert_cart = $conn->prepare("INSERT INTO `cart`(id, user_id, product_id, price, qty) VALUES(?,?,?,?,?)");
                $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['price'], $qty]);
                $success_msg[] = 'Product added to cart successfully';
            } else {
                $warning_msg[] = 'Product not found';
            }
        }
    }

    // Delete item from wishlist
    if (isset($_POST['delete_item'])) {
        $wishlist_id = $_POST['wishlist_id'];
        $wishlist_id = filter_var($wishlist_id, FILTER_SANITIZE_STRING);

        $varify_delete_items = $conn->prepare("SELECT * FROM `wishlist` WHERE id =?");
        $varify_delete_items->execute([$wishlist_id]);

        if ($varify_delete_items->rowCount() > 0) {
            $delete_wishlist_id = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
            $delete_wishlist_id->execute([$wishlist_id]);
            $success_msg[] = "Wishlist item deleted successfully";
        } else {
            $warning_msg[] = 'Wishlist item already deleted';
        }
    }
?>
<style>
    <?php include 'style.css'; ?>
    .product_detail {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product_detail .box {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 250px; /* Adjust the width to ensure consistency */
    padding: 15px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
}

.product_detail .box:hover {
    transform: translateY(-5px);
}

.product_detail .box img {
    width: 100%;
    max-width: 150px;
    height: auto;
    border-radius: 10px;
}

.product_detail .box .info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    padding-top: 10px;
}

.product_detail .box .name {
    font-size: 1.2rem;
    font-weight: bold;
    color: #5A8F29;
}

.product_detail .box .price {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.product_detail .box .button {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.product_detail .box .button button,
.product_detail .box .button a {
    background: #5A8F29;
    color: #fff;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 1rem;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product_detail .box .button button:hover,
.product_detail .box .button a:hover {
    background: #7ABF44;
}

.product_detail .box .btn {
    background: #5A8F29;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    text-align: center;
    font-size: 1rem;
    margin-top: 10px;
    width: 100%;
}

.product_detail .box .btn:hover {
    background: #7ABF44;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>AgriTrade & Sim - wishlist page</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my wishlist</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ wishlist</span>
        </div>
        <section class="products">
            <h1 class="title">products added in wishlist</h1>   
            <div class="product_detail">
                <?php 
                    $grand_total = 0;
                    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id =?");
                    $select_wishlist->execute([$user_id]);
                    if ($select_wishlist->rowCount()>0) {
                        while($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)){
                            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id= ?");
                            $select_products->execute([$fetch_wishlist['product_id']]);
                            if ($select_products->rowCount() > 0){
                                $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)

                ?>
                <form method="post" action="" class="box">
                    <input type="hidden" name="wishlist_id" value="<?=$fetch_wishlist['id']; ?>">
                    <input type="hidden" name="product_id" value="<?=$fetch_products['id']; ?>">
                    <img src="image/<?=$fetch_products['image']; ?>" alt="<?=$fetch_products['name']; ?>">
                    <div class="info">
                        <h3 class="name"><?=$fetch_products['name']; ?></h3>
                        <p class="price">Price: $<?=$fetch_products['price']; ?>/-</p>
                        <div class="button">
                            <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                            <a href="product_details.php?pid=<?=$fetch_products['id']; ?>" class="bx bxs-show"></a>
                            <button type="submit" name="delete_item" onclick="return confirm('delete this item');"><i class="bx bx-x"></i></button>
                        </div>
                        <a href="checkout.php?get_id=<?=$fetch_products['id']; ?>" class="form-btn">Buy Now</a>
                    </div>
                </form>
                <?php 
                            $grand_total+=$fetch_wishlist['price'];
                            }
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                ?>
            </div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>