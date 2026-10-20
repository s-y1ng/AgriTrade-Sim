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
    <title>AgriTrade & Sim - about us page</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/ about us</span>
        </div>
        <div class="about-us">
            <div class="row">
                <div class="box">
                    <div class="title">
                        <span>ABOUT OUR WEBSITE : AgriTrade & Sim</span>
                        <h1>We provide a</h1>
                    </div>
                    <p>Web app that helps farmers sell products online and learn sustainable farming through a simulator. It connects farmers with buyers, boosting sales and knowledge while creating a more efficient agricultural ecosystem. The platform expands market access, increasing farmers' visibility and profits. The simulator offers hands-on learning, making farming more accessible. AgriTrade & Sim supports a smarter and more sustainable future for agriculture.</p>
                </div>
                <div class="img-box">
                    <img src="image/about-us.jpg">
                </div>
            </div>
        </div>
        <section class="services">
            <div class="title">
                <img src="image/download.png" class="logo">
                <h1>why choose us</h1>
                <p>We strive to provide the best experience for our customers. </p>
            </div>
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
        <section class="team">
            <div class="title">
                <h1>Our Workable team</h1>
                <span>best team</span>
            </div>
            <div class="row">
                <div class="box">
                    <div class="img-box">
                        <img src="image/team1.jpg">
                    </div>
                    <div class="detail">
                        <span>Founder</span>
                        <h4>Tey Xin Hui</h4>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="image/team2.jpg">
                    </div>
                    <div class="detail">
                        <span>Founder</span>
                        <h4>Teh Shi Ying</h4>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="image/team3.jpeg">
                    </div>
                    <div class="detail">
                        <span>Founder</span>
                        <h4>Vani Karnan</h4>
                    </div>
                </div>
            </div>
        </section>
        <div class="testimonial-container">
            <div class="title">
                <img src="image/download.png" class="logo">
                <h1>what people say about us</h1>
                <p>Our customers love the quality and service we provide. See what they have to say about their experience with us! </p>
            </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="image/01.jpg">
                    <h1>sara smith</h1>
                    <p>Absolutely amazing service! The quality exceeded my expectations, and the customer support was top-notch. I highly recommend it!</p>
                </div>
                <div class="testimonial-item">
                    <img src="image/02.jpg">
                    <h1>john smith</h1>
                    <p>A fantastic experience from start to finish! The team was super helpful, and the products were exactly as described. I will definitely be coming back!</p>
                </div>
                <div class="testimonial-item">
                    <img src="image/03.jpg">
                    <h1>selena ansari</h1>
                    <p>I love how easy and smooth the whole process was. The delivery was quick, and the quality was outstanding. Highly recommended!</p>
                </div>
                <div class="left-arrow" onclick="prevSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                <div class="right-arrow" onclick="nextSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
            </div>
        </div>
    <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>