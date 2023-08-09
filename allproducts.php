<?php

include('server/connection.php');

$stmt = "SELECT * FROM products";

$all = $connection->query($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>product_id</th>
            <th>product_name</th>
            <th>product_description</th>
            <th>product_image1</th>
            <th>product_image2</th>
            <th>product_image3</th>
            <th>product_image4</th>
            <th>product_price</th>
            <th>product_special_offer</th>
            <th>product_color</th>
            <th>product_brand</th>
            <th>product_category</th>
        </tr>
        <?php while ($row = $all->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['product_description']; ?></td>
                <td><?php echo $row['product_image1']; ?></td>
                <td><?php echo $row['product_image2']; ?></td>
                <td><?php echo $row['product_image3']; ?></td>
                <td><?php echo $row['product_image4']; ?></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_special_offer']; ?></td>
                <td><?php echo $row['product_color']; ?></td>
                <td><?php echo $row['product_brand']; ?></td>
                <td><?php echo $row['product_category']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>