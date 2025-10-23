<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcome</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin-top: 50px; 
}
        .pricing-table {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
}


        .pricing-card {
            background: rgba(4, 0, 0, 0.7);
            border: 2px solid rgba(255, 255, 255, .5); 
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    padding: 20px;
    width: 300px;
    text-align: center;
    overflow: hidden;
}

    .pricing-card h2 {
        font-size: 24px;
        background: #000000;
        color: white;
        margin: -20px -20px 20px;
        padding: 20px;
        border-radius: 10px 10px 0 0;
}

.pricing-card .price {
    font-size: 32px;
    font-weight: bold;
    color: #fffefe;
}

.pricing-card a {
    background: transparent;
    border: 2px solid #fff;
    color: white;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    margin: 20px 0;
    transition:2s;
}

.pricing-card a:hover{
            background-color: rgba(255, 255, 255, 0.7);
            color:#000;
        }

.pricing-card ul {
    font-size: 16px;
    list-style: none;
    padding: 0;
    text-align: left;
    margin: 20px 0 0;
}

.pricing-card ul li {
    font-size: 16px;
    padding-top: 5px;
    color: #fffefe;
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
        $gigs = mysqli_query($conn, "SELECT * FROM gigs");
    ?>
    <div class="container">
        <div class="pricing-table">
                <?php while ($row = mysqli_fetch_assoc($gigs)) { ?>
                <div class="pricing-card">
                    <h2><?php echo $row['title']; ?></h2>
                    <p class="price">$<?php echo $row['price']; ?></p>
                    <a href="Contact US.php" class="start-now">Purchase</a>
                    <ul><li><?php echo $row['description']; ?><li></ul>
                    
                </div>
                <?php } ?>
        </div>
    </div>

        

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>