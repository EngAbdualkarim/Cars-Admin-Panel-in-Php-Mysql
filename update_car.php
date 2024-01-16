<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if (isset($_GET['id'])) {
    $carId = $_GET['id'];
    $selectCarSql = "SELECT * FROM cars WHERE car_id = $carId";
    $carResult = mysqli_query($conn, $selectCarSql);
    if (mysqli_num_rows($carResult) > 0) {
        $carData = mysqli_fetch_array($carResult, MYSQLI_ASSOC);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $rentalPrice = $_POST['rental_price'];
            $updateCarSql = "UPDATE cars SET brand = '$brand', model = '$model', year = $year, rental_price = $rentalPrice WHERE car_id = $carId";
            if (mysqli_query($conn, $updateCarSql)) {
                header('location:show_cars.php');
            } else {
                echo "Error updating car information: " ;
            }
        }
    } else {
        echo "Car not found!";
    }
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/insert.css">
    <title>Update Cars</title>
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
    <main>
        <h2>Update Car Information</h2>
        <form method="post" action="update_car.php?id=<?= $carId ?>" >
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" value="<?= $carData['brand'] ?>" required>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" value="<?= $carData['model'] ?>" required>
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" value="<?= $carData['year'] ?>" required>
            <label for="rental_price">Rental Price:</label>
            <input type="text" name="rental_price" id="rental_price" value="<?= $carData['rental_price'] ?>" required>
            <br>
            <button type="submit">Update Car</button>
        </form>
    </main>
</body>
</html>
