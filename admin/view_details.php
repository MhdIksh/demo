<?php
include 'index.php';
include '../db.php';

$inquiries = mysqli_query($conn, "SELECT * FROM inquiries");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Inquiries</title>

    <script src="js/scripts.js" defer></script>
    <style>

        table{
            width: 100%;
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

        .form-container {
            max-width: 1000px;
            margin: 80px auto;
            padding: 15px;
            background-color: rgba(4, 0, 0, 0.4); /* 60% transparency */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
    </style>
</head>
<body>
    <h1>View Inquiries</h1>
    <div class="form-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($inquiries)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td>
                <div class="delete">
                <form action="delete_details.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="delete-button">Delete</button>
                </form>
                </div>
            </td>            
        </tr>
        <?php } ?>
    </table>
        </div>
</body>
</html>
