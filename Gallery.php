<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcome</title>
    <style>
        body {
    background-color: rgba(4, 0, 0, 0.4); /* 60% transparency */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.gallery {
    margin-top: 500px;
    max-width:1200px;
    background-color: rgba(4, 0, 0, 0.4); /* 60% transparency */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    color:white;
}

.gallery h2 {
    padding-bottom:10px;
    text-align: center;
    color: #fff;
}

.category {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
    width:1100px;
}

.category img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    transition: transform 0.3s;
    filter: grayscale(80%);
}

.category img:hover {
    transform: scale(1.05);
    filter: grayscale(0%);
}

    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h2 class="logo">Photography</h2>
            <nav class="navigation">
                <a href="Home.html" class="navbar">Home </a>
                <a href="Pricing.php" class="navbar">Pricing </a>
                <a href="Gallery.php" class="navbar">Gallery </a>
                <a href="Contact US.php" class="navbar">Contact Us</a>
                <a href="About Us.html" class="navbar">About Us</a>
                <button class="btnlogin-popup">Login</button>
            </nav>        
    </header>

    <div class="wrapper">

        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form name="f1" action = "auth.php" onsubmit = "return validation()" method = "POST">

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="name" required>
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">Remember me
                    </label> 
                    <a href="#">Forgot Password?</a>
                    
                </div>
                
                <button type="submit" class="btn">Login</button>

                <div class="login-register">
                    <p>Don't have an account? 
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#">

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" required>
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">I agree to the terms & conditions
                    </label>
                    
                </div>
                
                <button type="submit" class="btn">Register</button>

                <div class="login-register">
                    <p>Already have an account? 
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>

    </div>

    <?php
include 'db.php';

// Fetch images from the database based on categories
$naturalImages = $conn->query("SELECT * FROM images WHERE category = 'Natural Photography'");
$portraitImages = $conn->query("SELECT * FROM images WHERE category = 'Portrait Photography'");
$weddingImages = $conn->query("SELECT * FROM images WHERE category = 'Wedding Photography'");
$eventImages = $conn->query("SELECT * FROM images WHERE category = 'Event Photography'");
?>

    <div class="gallery">
        <h2>Natural Photography</h2>
        <div class="category">
            <?php while ($row = $naturalImages->fetch_assoc()) { ?>
                <div class="photography-card">
                    <img src="uploads/<?php echo $row['image_path']; ?>" alt="Wildlife Photography Image">
                </div>
            <?php } ?>
        </div>


        <h2>Portrait Photography</h2>
        <div class="category">
            <?php while ($row = $portraitImages->fetch_assoc()) { ?>
                <div class="photography-card">
                    <img src="uploads/<?php echo $row['image_path']; ?>" alt="Portrait Photography Image">
                </div>
            <?php } ?>
        </div>

        <h2>Wedding Photography</h2>
        <div class="category">
            <?php while ($row = $weddingImages->fetch_assoc()) { ?>
                <div class="photography-card">
                    <img src="uploads/<?php echo $row['image_path']; ?>" alt="Wedding Photography Image">
                </div>
            <?php } ?>
        </div>


        <h2>Event Photography</h2>
        <div class="category">
            <?php while ($row = $eventImages->fetch_assoc()) { ?>
                <div class="photography-card">
                    <img src="uploads/<?php echo $row['image_path']; ?>" alt="Event Photography Image">
                </div>
            <?php } ?>
        </div>
    </div>






    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>


