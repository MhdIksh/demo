<?php
include '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$message = $_POST['message'];

$sql = "INSERT INTO inquiries (name, email, phone, date, message) VALUES ('$name', '$email', '$phone', '$date', '$message')";
mysqli_query($conn, $sql);

header("Location: ../Contact Us.php?success=1");
?>
