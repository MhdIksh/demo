

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Gigs</title>
    <script src="js/scripts.js" defer></script>
    <style>
        h1{
            display:flex;
            position: relative;
            justify-content: space-between;
        }
        body {
            margin: 20px;
            background: url(../../img/camera.jpg) ;
            background-size: cover;
            background-position: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.6); /* 60% transparency */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }

        .delete-button {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-button:hover {
            background-color: #c82333;
        }

        .update-button {
            background-color: green;
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .update-button:hover {
            background-color: #c82333;
        }

        .textarea-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .textarea-container textarea{
            height: 100px;
        }

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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $sql = "INSERT INTO gigs (title, description, price) VALUES ('$title', '$description', '$price')";
        mysqli_query($conn, $sql);
    }

    $gigs = mysqli_query($conn, "SELECT * FROM gigs");
    ?>
    <h1>Manage Gigs</h1>
    <div class="form-container">
        <form action="manage_gigs.php" method="post" id="gigsForm">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" required>
            </div>

            <div class="form-group">    
                <label for="description">Description:</label>
                    <div class="textarea-container">
                        <textarea name="description" id="description" required></textarea>
                        <button type="submit" class="button" onclick="processText()">Add Gig</button>
                    <div id="output"></div>
            </div>
        </form>
    </div>
    </div>



    <script>
document.querySelectorAll('.textarea-container button').forEach(form => {
    form.addEventListener('submit', function(e) {
        if (!confirm('Are you sure?')) {
            e.preventDefault();
        }
    });
});

        function processText() {
            // Get the textarea element
            var textarea = document.getElementById('description');
            // Replace newline characters with <br>
            textarea.value = textarea.value.replace(/\n/g, '<br>');
        }
    </script>
    <div class="form-container">
        <!-- Modify Plan Form Modal -->
        <div id="modify-plan-form" class="modal">
            <!-- Form content for modifying a plan -->
            <form class="modal-content" action="update_gigs.php" method="POST"> <!-- Changed to update_gigs.php -->
                <span class="close" onclick="closeModifyPlanForm()">&times;</span>
                <h2>Modify Plan</h2>
                <input type="hidden" id="modify-plan-id" name="id">
                <label for="title">Title</label>
                <input type="text" id="modify-plan-name" name="title" required>
                <label for="price">Price</label>
                <input type="number" id="modify-price" name="price" required>
                <label for="description">Description</label>
                <textarea id="modify-description" name="description" required></textarea>
                <button type="submit" class="button">Update Plan</button>
            </form>
        </div>
    </div>

    <div class="form-container">
        <h2 style="color:black;">Existing Gigs</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php 
                $query = "SELECT * FROM gigs";
                $gigs = mysqli_query($conn, $query); // Corrected variable name to $conn
                while ($row = mysqli_fetch_assoc($gigs)) { // Corrected variable name to $result
            ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <div class="delete">
                        <form action="delete_gig.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                </td>
                <td>
                    <div class="modify">
                        <?php echo '<button class="update-button" onclick="openModifyPlanForm(' . $row['id'] . ', \'' . addslashes($row['title']) . '\', \'' . addslashes($row['price']) . '\', \'' . addslashes($row['description']) . '\')">Modify</button>'; ?>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>



<script>
document.addEventListener('DOMContentLoaded', () => {
    const modifyPlanForm = document.getElementById('modify-plan-form');
    
    window.openModifyPlanForm = function(id, name, price, description) {
        document.getElementById('modify-plan-id').value = id;
        document.getElementById('modify-plan-name').value = name;
        document.getElementById('modify-price').value = price;
        document.getElementById('modify-description').value = description;
        modifyPlanForm.style.display = 'block';
    }
    
    window.closeModifyPlanForm = function() {
        modifyPlanForm.style.display = 'none';
    }
    
    window.deletePlan = function(id) {
        if (confirm("Are you sure you want to delete this plan?")) {
            window.location.href = 'delete_gig.php?id=' + id;
        }
    }
});
</script> <!-- Corrected the script tag closing -->


</body>
</html>



