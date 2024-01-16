<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $insertQuery = "INSERT INTO customers (username, password, email) VALUES ('$username', '$password', '$email')";    
    if (mysqli_query($conn, $insertQuery)) {
        header('location:show_cars.php');
        exit();
    } else {
        echo "Error: ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/auth.css">
    <style>
    </style>
</head>
<body class="bodindex bodycenter">
    <header>
        <h1>Car Rental Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Register</a></li>
            <li><a href="show_cars.php">Show All Cars</a></li>
        </ul>
    </nav>
    <form method="post" action="registration.php">
    <h2>Register As Customer</h2>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
