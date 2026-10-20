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
        <div class="banner">
            <h1>contact us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ contact us</span>
        </div>
        <section class="service">
            <div class="box-container">
                <div class="box">
                    <a href="order_history.php">
                    <img src="image/orderhistory.png">
                    <div class="detail">
                        <h3>View Order History</h3>
                    </div>
                    </a>
                </div>
                <div class="box">
                    <a href="view_order.php">
                        <img src="image/trackorder.png">
                        <div class="detail">
                            <h3>track order</h3>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="chat.php">
                        <img src="image/chat.png">
                        <div class="detail">
                            <h3>chat</h3>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <img src="image/requestfarmer.png">
                    <div class="detail">
                        <h3>request to be a seller</h3>
                        <a href="http://localhost/AgriTrade&Sim%20/AgriTrade&Sim/" class="btn">Request Now</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="faq">
            <div class="faq-name">
                <h1 class="faq-header">Have <br> questions?</h1>
                <img class="faq-img" src="image/faq.jpg">
            </div>
            <div class="faq-box">
                <div class="faq-wrapper">
                    <input type="checkbox" class="faq-trigger" id="faq-trigger-1">
                    <label class="faq-title" for="faq-trigger-1">How does AgriTrade & SIM work?</label>
                    <div class="faq-detail">
                        <p>AgriTrade & SIM is an online platform that connects farmers with buyers, allowing them to sell agricultural products and access a farming simulator for learning sustainable practices. Farmers can list their products, and buyers can browse and place orders directly.</p>
                    </div>
                </div>
                <div class="faq-wrapper">
                    <input type="checkbox" class="faq-trigger" id="faq-trigger-2">
                    <label class="faq-title" for="faq-trigger-2">Do I need to create an account to use the platform?</label>
                    <div class="faq-detail">
                        <p>Yes, both farmers and buyers must register for an account to access the platform. Registration is free, and it enables you to list products, make purchases, and use the farming simulator.</p>
                    </div>
                </div>
                <div class="faq-wrapper">
                    <input type="checkbox" class="faq-trigger" id="faq-trigger-3">
                    <label class="faq-title" for="faq-trigger-3">How do I track my orders?</label>
                    <div class="faq-detail">
                        <p>Once you place an order, you can track its status in the "Track Order" section of the contact us page.</p>
                    </div>
                </div>
                <div class="faq-wrapper">
                    <input type="checkbox" class="faq-trigger" id="faq-trigger-4">
                    <label class="faq-title" for="faq-trigger-4">What is the farming simulator, and how does it help farmers?</label>
                    <div class="faq-detail">
                        <p>The farming simulator is an interactive tool that allows users to practice sustainable farming techniques in a virtual environment. It helps farmers learn best practices for increasing crop yield, managing resources, and implementing eco-friendly agricultural methods.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-container">
            <div class="address">
                <div class="title">
                    <img src="img/download.png" class="logo">
                    <h1>contact detail</h1>
                    <p>Get in Touch with us</p>
                </div>
                <div class="box-container">
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>address</h4>
                            <p>Bandar Sunway,Malaysia.</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-phone-call"></i>
                        <div>
                            <h4>phone number</h4>
                            <p>0374918622</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-envelope"></i>
                        <div>
                            <h4>email</h4>
                            <p>agritradesim@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>