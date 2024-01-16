<?php
$conn = mysqli_connect("localhost:3307", "root", "", "carsrental");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    if ($role === 'admin') {
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('location:show_cars.php');
            exit();
        } else {
            echo "Invalid admin credentials.";
        }
    } elseif ($role === 'customer') {
        $sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            header('location:show_cars.php');
            exit();
        } else {
            echo "Invalid customer credentials.";
        }
    } else {
        echo "Invalid role selected.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/auth.css">
    <title>Login</title>
</head>
<body class="bodindex">
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
    <form method="post" action="">
    <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
        </select>
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
