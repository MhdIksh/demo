<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE gigs SET title='$title', description='$description', price='$price' WHERE id=$id"; // Corrected the SQL syntax
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('The pricing plan updated successfully.');</script>";
        // Redirect to the admin pricing page
        header("Location: manage_gigs.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
