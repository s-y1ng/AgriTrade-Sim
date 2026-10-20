<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .sidebar {
            width: 25%;
            background: #343a40;
            color: white;
            padding: 20px;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar a {
            display: block;
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 0;
            transition: color 0.3s;
        }
        .sidebar a:hover {
            color: #f8f9fa;
        }
        .content {
            flex: 1;
            padding: 30px;
            background: white;
            margin: auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            background: #6c757d;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .profile-img img {
            width: 100%;
            height: auto;
            border-radius: 30%;
        }
        .profile-img p {
            font-size: 1rem;
            color: #555;
            margin-top: 0.5rem;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        .btn {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 10px 5px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                text-align: center;
            }
            .content {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>My Account</h2>
            <a href="#">Profile</a>
            <a href="#">Account & Security</a>
            <a href="#">Bank Accounts / Cards</a>
            <h3>More Activities</h3>
            <a href="view_order.php">My Purchase</a>
            <a href="wishlist.php">My Likes</a>
            <a href="#">Notifications</a>
            <a href="#">My Vouchers</a>
            <h3>Settings</h3>
            <a href="chat.php">Chat Settings</a>
            <a href="#">Privacy Settings</a>
            <a href="#">Notification Settings</a>
            <h3>Support</h3>
            <a href="#">Help Centre</a>
        </div>
        
        <div class="content">
            <h2>My Profile</h2>
            <div class="profile-img">
                <img src="image/sylus.jpeg" alt="Profile Image">
                <p>Your Text Here</p>
            </div>
            <form>
                <label>Name:</label>
                <input type="text" name="name" value="sylus">
                <label>Email:</label>
                <input type="text" name="email" value="sylus@hotmail.com">
                <label>Phone Number:</label>
                <input type="text" name="phone" value="0123456789">
                <label>Address:</label>
                <input type="text" name="address" value="setia alam">
                <button type="submit" class="btn">Save Changes</button>
                <button type="reset" class="btn">Reset Form</button>
            </form>
        </div>
    </div>
</body>
</html>