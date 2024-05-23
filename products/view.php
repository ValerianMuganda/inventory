<?php
include "../connection.php";

session_start();

$id = $_SESSION['id'];

$sql = "SELECT * FROM `products` WHERE `user_id` = '$id'";
$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Product List</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Description</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['description'] ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>

