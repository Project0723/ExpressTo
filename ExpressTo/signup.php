<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM registration WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // Use JavaScript alert for user feedback
            echo "<script>alert('User already exists');</script>";
        } else {
            $insertSql = "INSERT INTO registration (username, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $insertSql);

            if ($stmt === false) {
                die(mysqli_error($con));
            }

            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            $insertResult = mysqli_stmt_execute($stmt);

            if ($insertResult) {
                // Use JavaScript alert for user feedback
                header("Location: login.php");
            } else {
                // Display error as alert
                echo "<script>alert('Error during registration');</script>";
            }
        }
    } else {
        // Display error as alert
        echo "<script>alert('Database query failed');</script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account.css">
    <title>Signup</title>
</head>
<body>
    <header>
        <div class="main">
            <div class="left">
                <img src="image/Express.To_logo.png" alt="Express.To">
            </div>
            <div class="right">
                <form action="signup.php" method="post">
                    <div class="form_body">
                        <input required type="text" placeholder="New Username" id="fname" name="username">
                        <input required type="password"  placeholder="New Password" id="password" name="password">
                        <button type="submit" class="create">Sign up</button>
                        <hr>
                        <button class="login"><a href="login.php">Log In</a></button>
                    </div>
                </form>
            </div>
        </div>
        <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT>
</body>
</html>
