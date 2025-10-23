<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Gallery</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js" defer></script>
    <style>
        .form-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 15px;
            background-color: rgba(4, 0, 0, 0.4); /* 60% transparency */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        body{
            background: url(../../img/background.png) no-repeat;
            background-size: cover;
            background-position: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="file"], select ,textarea {
            width: 900px;
            padding: 5px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.6); /* 60% transparency */
        }
        textarea {
            height: 90px;
        }

        .button {
            padding: 10px 20px;
            background-color:  rgba(4, 0, 0, 0.6); /* 60% transparency */
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
</head>
<body>

<?php
include 'index.php';
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO images (category, image_path) VALUES ('$category', '$target')";
        mysqli_query($conn, $sql);
    }
}

$images = mysqli_query($conn, "SELECT * FROM images");
?>
    <h1>Manage Gallery</h1>
    <div class="form-container">
        <form action="manage_gallery.php" method="post" enctype="multipart/form-data" id="galleryForm">

            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="">Select a category</option>
                <option value="Natural Photography">Natural Photography</option>
                <option value="Wedding Photography">Wedding Photography</option>
                <option value="Event Photography">Event Photography</option>
                <option value="Portrait Photography">Portrait Photography</option>
            </select>

            <input type="file" name="image" id="image" required>
        
            <button type="submit" class="button">Upload Image</button>
        
        </form>
    </div>
    


    <div class="form-container">
        <h2>Uploaded Images</h2>
        <table>
            <div class="form-group">
                <tr>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            <div class="form-group">
                <?php while ($row = mysqli_fetch_assoc($images)) { ?>
                    <tr>
                        <td><?php echo $row['category']; ?></td>
                        <td><img src="<?php echo $row['image_path']; ?>" alt="Image" width="100"></td>
                        <td>
                            <div class="delete">
                                <form action="delete_image.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <div>
        </table>
    <div>
</body>
</html>
