<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcome</title>
    <style>
        body {
            margin-top:0%;
            padding:0%;
            background-color: #f4f4f9;
            justify-content: center;
            align-items: center;
            width:100%;
            hight:100%;
            overflow-x: hidden;
        }
        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 15px;
            background-color: rgba(4, 0, 0, 0.4); /* 60% transparency */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .form-container h1{
            margin-left:42%;
        }

        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], textarea {
            width: 900px;
            padding: 5px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.4); /* 60% transparency */
        }
        textarea {
            height: 90px;
        }
        .button {
            padding: 10px 20px;
            background-color:  transparent;
            color: #fff;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            border:2px solid white;
            transition: 3s;
        }
        .button:hover {
            background-color: white;
            color: black;
            border:2px solid rgba(255, 255, 255, 0.5);
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
                        <ion-icon name="person"></ion-icon>
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

    <div class="form-container">
        <h1>Booking</h1>
        <form action="admin/submit_inquiry.php" method="post" id="contactForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone">
            </div>
            
            <div class="form-group">
                <label for="date">Preferred Date:</label>
                <input type="date" name="date" id="date" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            
            <button type="submit" class="button">Submit</button>
        </form>
    </div>


    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>