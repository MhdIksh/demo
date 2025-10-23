<?php
include 'db.php';

$username = $_POST['user'];
$password = $_POST['pass'];

// to prevent from MySQL injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Verify the username and password
$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if ($count == 1) {
    echo "<script>
    window.location.assign('admin/manage_gallery.php');
    </script>";
} else {
    echo "<script>
    localStorage.setItem('loginError', 'Invalid username or password');
    window.location.assign('Home.html');
    </script>";
    exit;
}
?>

