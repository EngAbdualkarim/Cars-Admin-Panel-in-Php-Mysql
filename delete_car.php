<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if (isset($_GET['id'])) {
    $carId = $_GET['id'];
    $selectCarSql = "SELECT * FROM cars WHERE car_id = $carId";
    $carResult = mysqli_query($conn, $selectCarSql);
    if (mysqli_num_rows($carResult) > 0) {
        $carData = mysqli_fetch_assoc($carResult);
        $deleteCarSql = "DELETE FROM cars WHERE car_id = $carId";
        if (mysqli_query($conn, $deleteCarSql)) {
            $imageFilePath = "./uploadCars/" . $carData['image_name'];
            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
            }
            header('location:show_cars.php');
        } else {
            echo "Error deleting car: " ;
            header('location:show_cars.php');
        }
    } else {
        echo "Car not found!";
        header('location:show_cars.php');
    }
} else {
    header("Location: index.php");
    exit();
}
?>

