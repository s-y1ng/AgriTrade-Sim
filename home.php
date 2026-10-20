<?php
 include 'components/connection.php'; 
 session_start();
 if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
    }
?>
<style type="text/css">
    <?php include 'style.css'; ?>
    .thumb {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2%;
    }

    .thumb-title {
        text-align: center;
        font-size: 2rem;
        color: black;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        justify-items: center;
    }

    .thumb .box-container .box {
        text-align: center;
        margin: 1rem;
        line-height: 1.5;
        background: #fff;
        padding: 1rem;
        color: gray;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .thumb .box-container .box img {
        width: 100%;
        height: auto;
        transition: transform 0.8s ease-in-out;
        border-radius: 10px;
    }

    .thumb .box-container .box:hover img {
        transform: rotateY(180deg);
    }

    .thumb .box-container .box h3 {
        text-transform: capitalize;
        color: var(--green);
        margin-top: 0.5rem;
    }

    .box-container .box p {
        color: #555;
        margin: 0.5rem;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>AgriTrade & Sim - home page</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <section class="home-section">
            <div class="slider">
                <div class="slider_slider slide1">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Farming Simulator</h1>
                        <p>Learn and practice modern farming techniques in an interactive and educational way.</p>
                        <a href="slime/Slime Sprout.html" class="btn" target="_blank">start now</a>
                   </div>
                   <div class="hero-dec-top"></div>
                   <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
                <div class="slider_slider slide2">
                    <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>welcome to our shop</h1>
                        <p>Buy fresh, organic, and locally sourced produce directly from farmers.</p>
                        <a href="shop.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
                </div>
                <!-- slide end -->
            </div>
            <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
            <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
        </section>
        <!-- home slider end -->
        <section class="thumb">
            <h2 class="thumb-title">Trending Products</h2>
            <div class="box-container">
                <div class="box">
                    <img src="image/apples.jpeg">
                    <h3>organic apples</h3>
                    <p>Fresh, juicy apples grown without pesticides.</p>
                </div>
                <div class="box">
                    <img src="image/honey.jpg">
                    <h3>honey</h3>
                    <p>Natural forest honey.</p>
                </div>
                <div class="box">
                    <img src="image/cucumbers.jpg">
                    <h3>fresh cucumbers</h3>
                    <p>Crunchy cucumbers perfect for salads.</p>
                </div>
                <div class="box">
                    <img src="image/tomato_seeds.webp">
                    <h3>tomato seeds</h3>
                    <p>High-yield hybrid tomato seeds.</p>
                </div>
            </div>
        </section>
        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="image/icon2.png">
                    <div class="detail">
                        <h3>great savings</h3>
                        <p>save big every order</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon1.png">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>one-on-one support</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon0.png">
                    <div class="detail">
                        <h3>gift vouchers</h3>
                        <p>vouchers on every festivals</p>
                    </div>
                </div>
                <div class="box">
                    <img src="image/icon.png">
                    <div class="detail">
                        <h3>worldwide delivery</h3>
                        <p>dropship worldwide</p>
                    </div>
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