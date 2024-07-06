<?php
session_start(); // Start the session

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username
} else {
    $username = 'Guest'; // Default to 'Guest' or handle this scenario as you prefer
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Shipment</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="topleft">
                <img src="image/Express.To_logo_sm.png" alt="Express.To">
            </div>
        </header>
        <div class="main">
        <div class="left">
            <section>
                <h2 >Hi,  <?php echo htmlspecialchars($username); ?>!</h2>
                <hr>
                <button class="shipment"><a href="shipment.php"><img src="image/shipment.png" alt="Create" class="ship"><br>Create Shipment</a></button>
                <button class="shipment"><a href="update.php"><img src="image/manage.png" alt="Update" class="ship"><br>Update Shipment</a></button>
                <button class="shipment"><a href="view.php"><img src="image/transaction.png" alt="View" class="ship">View Shipment</a></button>
                <button class="shipment"><a href="login.php">Log out</a></button>
            </section>
        </div>
        <div class="maincontent">
            <h1 class="cs">View Shipment</h1>
            <div class="box">
                    <h3 class="sub_title">Shipment ID</h3>
                                <input type="text" id="shipmentid" placeholder="ET000" class="same">
                                <button class="ret" id="RetBtn">View</button>
                                <br>
                                <table id="data-table" border="1">
                                    <thead>
                                        <tr>
                                            <th>Sender Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Receiver Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Weight</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--Data rows will be added here dynamically-->
                                    </tbody>
                                </table>
            </div>
        </div>
    </div>
    <script src="view_script.js" type="module"></script>
    <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT>
</body>
</html>
