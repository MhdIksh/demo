<?php
include '../db.php';

$id = $_POST['id'];
$sql = "DELETE FROM inquiries WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: view_details.php");
?>