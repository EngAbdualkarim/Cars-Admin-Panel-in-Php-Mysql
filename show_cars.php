<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/show_cars.css">
    <title>Show Cars</title>
</head>
<body class="bodindex">
    <header>
        <h1>Car Rental Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="show_cars.php">Show All Cars</a></li>
            <li><a href="insert_car.php">Insert Car</a></li>
        </ul>
    </nav>
    <br>
    <main class="card-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<div class="card">';
                echo '<img src="./uploadCars/' . $row['image_name'] . '" alt="' . $row['brand'] . ' ' . $row['model'] . '" class="card-img">';
                echo '<p class="card-details">Brand: ' . $row['brand'] . '</p>';
                echo '<p class="card-details">Model: ' . $row['model'] . '</p>';
                echo '<p class="card-details">Year: ' . $row['year'] . '</p>';
                echo '<p class="card-details">Rental Price: $' . $row['rental_price'] . '</p>';
                echo '<button class="delete-btn" onclick="location.href=\'delete_car.php?id=' . $row['car_id'] . '\'">Delete</button>';
                echo '<button class="update-btn" onclick="location.href=\'update_car.php?id=' . $row['car_id'] . '\'">Update</button>';
                echo '<button class="update-btn" onclick="location.href=\'customer_rent.php?car_id=' . $row['car_id'] . '&customer_id=' . $_SESSION['customer_id'] . '\'">Select</button>';
                echo '</div>';
            }
        } else {
            echo '<p>No cars available.</p>';
        }
        ?>
    </main>
</body>
</html>
