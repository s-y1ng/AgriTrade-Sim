<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App | M.A Developer</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    position: relative;
}

body {
    width: 100%;
    min-height: 100vh;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    padding: 0 5%;
}

a {
    text-decoration: none;
    cursor: pointer;
}

button,input {
    background: none;
    border: none;
    outline: none;
}

.main-container {
    max-width: 1000px;
    width: 100%;
    min-height: 90vh;
    height: 100%;
    background: #E8F5E9;
    border-radius: 25px;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
    border: 5px solid #A5D6A7;
    box-shadow: 0px 0px 25px #C8E6C9;
}

.navbar {
    width: 100%;
    height: fit-content;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    align-items: center;
    padding: 20px 4%;
    background: #A5D6A7;
}

.nav-left,.nav-right {
    width: fit-content;
    display: flex;
    align-items: center;
    gap: 30px;
}

.main-logo {
    width: 120px;
}

.search-bar {
    width: 300px;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    align-items: flex-start;
    background: #C8E6C9;
    padding: 8px 8px 8px 13px;
    border-radius: 8px;
}

.search-bar img {
    width: 22px;
    height: 22px;
}

.search-bar input {
    width: 100%;
    font-size: 17px;
    font-weight: 400;
    padding-left: 12px;
    color: green;
}

.setting {
    width: 30px;
}

.user {
    position: relative;
}

.user img {
    width: 40px;
    border-radius: 50%;
    border: 3px solid green;
}

.user::after {
    content: '';
    width: 13px;
    height: 13px;
    background: greenyellow;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
}

.bottom-sec {
    width: 100%;
    height: 76.5vh;
    display: flex;
    justify-content: center;
    flex-direction: row;
    align-items: flex-start;
    padding: 0 4% 20px 4%;
    gap: 20px;
    overflow: hidden;
}

.side-menu {
    width: 250px;
    height: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
}

.side-menu::-webkit-scrollbar {
    display: none;
}

.side-menu ul {
    list-style-type: none;
    background: #81C784;
    padding: 40px 20px 20px 20px;
    border-radius: 20px;
}

.side-menu ul li {
    margin: 15px 0;
    display: flex;
    align-items: center;
    gap: 15px;
}

.side-menu ul li:first-child {
    margin-top: 0;
}

.side-menu ul li img {
    width: 25px;
}

.side-menu ul li a {
    text-decoration: none;
    color: #E2D3F4;
    font-weight: 500;
    font-size: 18px;
    transition: 0.4s;
}

.side-menu ul li a:hover, .side-menu ul li .active {
    color: #fff;
}

.chat-sec {
    width: 100%;
    height: fit-content;
    margin-top: 20px;
}

.chat {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 15px;
  margin: 10px 0;
  background: #A5D6A7;
  padding: 10px 20px;
  border-radius: 15px;
  transition: 0.4s;    
}
.chat img {
    width: 35px;
    border-radius: 50%;
    border: 3px solid greenyellow}

.chat p {
    font-size: 17px;
    color: black;
    font-weight: 500;
    transition: 0.4s;
}

.chat:hover {
    background: #C8E6C9;
}

.chat:hover p {
    color: greenyellow;
}

.chat-section {
    flex-grow: 1;
    height: 100%;
    background: #E8F5E9;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
}

.chat-header {
    width: 100%;
    height: fit-content;
    padding: 10px 4% 5px 4%;
    border-bottom: 2px solid greenyellow;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    align-items: center;
}

.user-header {
    display: flex;
    align-items: center;
    gap: 15px;
}

.user-header .user-main img {
    width: 50px;
    border-radius: 50%;
    border: 3px solid white;
}

.user-main {
    position: relative;
}

.user-main::after {
    content: '';
    width: 13px;
    height: 13px;
    background: greenyellow;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    z-index: 20;
}

.user-header h2 {
    margin-top: -8px;
    color: #E2D3F4;
}

.threedot {
    width: 40px;
}

.chat-type {
    width: 100%;
    height: 65px;
    border-top: 2px solid white;
    position: absolute;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    gap: 20px;
    padding: 12px 4%;
    background: #A5D6A7;
}

.chat-type img {
    width: 25px;
}

.message-type {
    flex-grow: 1;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-direction: row;
    gap: 20px;
    border: 2px solid #81C784;
    padding: 10px 15px;
    border-radius: 15px;
}

.message-type input {
    flex-grow: 1;
    font-size: 16px;
    color: #E2D3F4;
}

.message-type input::placeholder {
    color: white;
}

.all-chat {
    width: 100%;
    height: 72%;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 20px 4% 65px 4%;
}

.all-chat::-webkit-scrollbar {
    display: none;
}

.chat-box {
    width: 60%;
    height: fit-content;
    background: #C8E6E9;
    display: flex;
    justify-content: flex-start;
    flex-direction: row;
    align-items: flex-start;
    padding: 15px;
    border-radius: 15px;
    gap: 15px;
    margin-bottom: 15px;
}

.chat-box img {
    width: 40px;
    border-radius: 50%;
    border: 3px solid green;
}

.chat-txt h4 {
   color: black;
   font-size: 14px;
   margin-bottom: 5px;
}

.chat-txt p {
    color: white;
}

.my-message {
    margin-left: 40%;
    background: #388E3C;
    color: white;
}

.chat-txt h4 span {
   color: #E2D3F4;
}

.toggle-btn {
    display: none;
}

.toggle-btn img {
   width: 27px;
}

.side-menu .search-bar {
    display: none;
}
@media(max-width:800px) {
    .toggle-btn {
        display: block;
    }
    body {
        padding: 0 3%;
    }

    .main-container {
        min-height: 95vh;
    }
    .side-menu {
        display: none;
        width: 280px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1000;
        background: white;
        padding: 20px;
    }
    .side-menu.active {
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }
    .side-menu ul {
        width: 100%;
        padding: 20px 20px 10px 20px;
    }
    .side-menu ul li {
        margin: 12px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .side-menu ul li img {
        width: 22px;
    }

    .side-menu ul li a {
        font-size: 16px;
    }
    .chat-sec {
        margin-top: 10px;
    }
    .chat {
        gap: 12px;
        margin: 8px 0;
        padding: 8px 17px;
    }
    .chat img {
        width: 30px;
        border: 2px solid green;
    }
    .chat p {
        font-size: 14px;
    }
    .nav-right .search-bar {
        display: none;
    }
    .side-menu .search-bar {
        display: flex;
        width: 100%;
        padding: 8px 8ppx 8px 10px;
        margin-bottom: 20px;
    }
    .search-bar img {
        width: 20px;
        height: 20px;
    }
    .search-bar input {
        font-size: 16px;
        padding-left: 10px;
    }
    .navbar {
        padding: 15px 4%;
    }
    .nav-left,.nav-right {
        gap: 20px;
    }
    .main-logo {
        width: 100px;
    }
    .setting {
        width: 25px;
    }
    .user img {
        width: 30px;
        border: 2px solid green;
    }
    .bottom-sec {
        height: 84vh;
        padding: 0 4% 15px 4%;
    }
    .chat-header {
        padding: 10px 4% 0 4%;
    }
    .user-header {
        gap: 12px;
    }
    .user-header .user-main img {
        width: 35px;
        border: 2px solid greenyellow;
    }
    .user-main::after {
        width: 10px;
        height: 10px;
    }
    .user-header h2 {
        font-size: 18px;
    }
    .threedot {
        width: 28px;
    }
    .chat-type {
        height: 65px;
        gap: 10px;
        padding: 12px 4%;
        background: #A3C9AA;
    }
    .chat-type img {
        width: 25px;
    }
    .chat-type .send-icon {
        width: 20px;
    }
    .message-type {
        width: 80%;
        gap: 5px;
        padding: 8px 10px;
    }

    .message-type input {
        width: 80%;
        font-size: 15px;
    }

    .message-type img {
        width: 20px;
    }
    .all-chat {
        height: 76%;
        padding: 15px 4% 0 4%;
    }
    .chat-box {
        width: 70%;
        padding: 12px 15px;
        gap: 12px;
        margin-bottom: 10px;
    }
    .chat-box img {
        width: 30px;
        border: 2px solid greenyellow;
    }
    .chat-txt h4 {
        font-size: 14px;
    }
    .chat-txt p {
        font-size: 14px;
    }
    .my-message {
        margin-left: 30%;
    }
}
@media(max-width:500px) {
    .chat-box {
        max-width: 400px;
        width: 95%;
    }
    .my-message {
        margin-left: 5%;
    }
}
    </style>
</head>
<body>
    
   <div class="main-container">
    <div class="navbar">
        <div class="nav-left">
        <button class="toggle-btn" id="toggleBtn">
            <img src="image/icon-menu.svg" alt=""/>
        </button>
            <img src="image/logo.svg" alt="" class="main-logo"/>
        </div>
        <div class="nav-right">
            <form class="search-bar">
                <img src="image/icon-search.svg" alt=""/>
                <input type="text" name="" placeholder="Search here...">
            </form>
            <img src="image/icon-setting.svg" alt="" class="setting"/>
            <a href="#" class="user">
                <img src="image/sylus.jpeg" alt=""/>
            </a>
        </div>
    </div>
   <div class="bottom-sec">
    <div class="side-menu" id="SideMenu">
        <form class="search-bar">
            <img src="image/icon-search.svg" alt=""/>
            <input type="text" name="" placeholder="Search here...">
        </form>
        <div class="chat-sec">
            <div class="chat">
                <img src="image/img-05.jpg" alt=""/>
                <p>Liam Brown</p>
            </div>
            <div class="chat">
                <img src="image/img-02.jpg" alt=""/>
                <p>Emma Johnson</p>
            </div>
            <div class="chat">
                <img src="image/img-03.jpg" alt=""/>
                <p>Sophia Martinez</p>
            </div>
            <div class="chat">
                <img src="image/img-06.jpg" alt=""/>
                <p>Noah Wilson</p>
            </div>
          </div>
    </div>
  <div class="chat-section">
     <div class="chat-header">
        <div class="user-header">
            <span class="user-main">
              <img src="image/img-01.jpg" alt=""/>
            </span>
            <h2>Ava Davis</h2>
        </div>
        <img src="image/icon-threedot.png" alt="" class="threedot"/>
     </div>

     <div class="all-chat">
        <div class="chat-box">
            <img src="image/img-01.jpg" alt=""/>
            <div class="chat-txt">
                <h4>Ava <span>* 5m</span></h4>
                <p>Hi! Welcome to our shop. How can I assist you today? 😊</p>
            </div>
        </div>
        <div class="chat-box my-message">
            <img src="image/sylus.jpeg" alt=""/>
            <div class="chat-txt">
                <h4>Sylus <span>* 5m</span></h4>
                <p>Hi! Do you sell fresh milk?</p>
            </div>
        </div>
        <div class="chat-box">
            <img src="image/img-01.jpg" alt=""/>
            <div class="chat-txt">
                <h4>Ava <span>* 5m</span></h4>
                <p>Yes! We have fresh milk available.</p>
            </div>
        </div>
     </div>
     
     <div class="chat-type">
        <img src="image/icon-plus.png" alt=""/>

         <form class="message-type">
            <input type="text" name="text" placeholder="Enter Message...">
            <img src="image/icon-emoji.png" alt=""/>
            <img src="image/icon-attach.png" alt=""/>
         </form>
        <img src="image/icon-send.png" alt="" class="send-icon"/>
     </div>
  </div>
   </div>
   </div>
  <script src="script.js"></script>
</body>
</html>