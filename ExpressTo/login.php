<?php
session_start();

$login_error = ''; // Initialize the error message variable

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

            if ($_SESSION['role'] == 'admin') {
                header("Location: shipment.php");
                exit();
            } else if ($_SESSION['role'] == 'customer') {
                header("Location: view_customer.php");
                exit();
            }
        } else {
            $login_error = "Invalid Username or Password. Please note that both are case-sensitive.";
        }
    } else {
        $login_error = "Invalid Username or Password. Please note that both are case-sensitive.";
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
                <form action="login.php" method="post">
                    <div class="form_body">
                        <input required type="text" placeholder="Username" name='username'>
                        <input required type="password"  placeholder="Password" name='password'>
                        <button class="login">Log in</button>

                        <!-- Error message display -->
                        <?php if (!empty($login_error)): ?>
                            <p class="error" style="color:red;"><?php echo $login_error; ?></p>
                        <?php endif; ?>

                        <p class="forget"><a href="forgotpassword.html">Forget Password</a></p>
                        <hr>
                        <button class="create"><a href="signup.php">Sign up</a></button>
                    </div>
                </form>
            </div>
        </div>
       <!-- <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT> -->

        <script>
        window.history.pushState(null, "", window.location.href);  
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };
    </script>
        
</body>
</html>
