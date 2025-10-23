<?php
include '../db.php';

$id = $_POST['id'];
$sql = "DELETE FROM images WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: manage_gallery.php");
?>
