<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        *{
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
    }

body{

    justify-content: space-between;
    align-items: center;
    min-height: 100vh;
    background: white;
    background-size: cover;
    background-position: center;
}

header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.logo{
    font-size: 2em;
    color: #fff;
    user-select: none;
}

.navigation a{
    position: relative;
    font-size: 1.1em;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after{
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .5s;
}

.navigation a:hover::after{
    transform-origin: left;
    transform: scaleX(1);
    
}

    </style>
</head>
<body>
    <header>
        <h2 class="logo">Dashboard</h2>
            <nav class="navigation">
                <a href="manage_gallery.php" class="navbar">Manage Gallery</a>
                <a href="manage_gigs.php" class="navbar">Manage Gigs </a>
                <a href="view_details.php" class="navbar">View Inquiries </a>
                <a href="logout.php" class="navbar">Logout</a>
            </nav>        
    </header>
</body>
</html>



