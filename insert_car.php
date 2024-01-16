<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $rental_price = $_POST['rental_price'];
    if (isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_unique_name = uniqid('car_') . '_' . $image_name;
        $upload_path = './uploadCars/' . $image_unique_name;
        move_uploaded_file($image_tmp, $upload_path);
    }
    $sql = "INSERT INTO cars (brand, model, year, rental_price, image_name) 
            VALUES ('$brand', '$model', '$year', '$rental_price', '$image_unique_name')";
    if (mysqli_query($conn, $sql)) {
        header('location:show_cars.php');
    } else {
        echo 'Error: ';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/insert.css">
    <title>Insert Cars</title>
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
        <h2>Add Car Information</h2>
        <form method="post" action="insert_car.php" enctype="multipart/form-data">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" required>
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" required>
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" required>
            <label for="rental_price">Rental Price:</label>
            <input type="text" name="rental_price" id="rental_price" required>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="file-input" required>
            <br>
            <button type="submit">Add Car</button>
        </form>
    </main>
</body>
</html>
