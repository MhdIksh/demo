<?php
include '../db.php';

$id = $_POST['id'];
$sql = "DELETE FROM gigs WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: manage_gigs.php");
?>
