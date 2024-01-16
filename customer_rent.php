<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if (isset($_GET['car_id'])) {
    $carId = $_GET['car_id'];
    $insertRentalSql = "INSERT INTO rentals (car_id) VALUES ($carId)";
    if (mysqli_query($conn, $insertRentalSql)) {
        header('location:show_cars.php');
    } else {
        echo "Error selecting car for rent: " ;
        header('location:show_cars.php');
    }
} else {
    header("Location: index.php");
    exit();
}
?>
