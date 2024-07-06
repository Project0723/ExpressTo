<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM registration WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        if ($password === $row['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            // Redirect based on the user role without using JavaScript
            if ($_SESSION['role'] == 'admin') {
                header("Location: shipment_copy.php"); // Ensure this file exists
                exit();
            } else if ($_SESSION['role'] == 'customer') {
                header("Location: transactions_customer.html"); // Ensure this file exists
                exit();
            }
        } else {
            $login_error = "Invalid Username or Password, Please try again";
        }
    } else {
        $login_error = "Invalid Username or Password, Please try again";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="main">
            <div class="left">
                <img src="image/Express.To_logo.png" alt="Express.To">
            </div>
            <div class="right">
                <form action="logincopy.php" method="post">
                    <div class="form_body">
                        <input required type="text" placeholder="Username" name='username'>
                        <input required type="password"  placeholder="Password" name='password'>
                        <button class="login">Log in</button>
                        <p class="forget">Forget Password</p>
                        <hr>
                        <button class="login"><a href="register.php">Sign up</a></button>
                    </div>
                </form>
            </div>
        </div>

        <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT>

</body>
</html>
