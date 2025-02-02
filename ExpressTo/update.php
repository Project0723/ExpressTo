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
    <title>Update Shipment</title>
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
                    <h2 >Hi, Lily!</h2><!--need kapangalan ng user na nag log in-->
                    <hr>
                    <button class="shipment"><a href="shipment.php"><img src="image/shipment.png" alt="Create" class="ship"><br>Create Shipment</a></button>
                    <button class="shipment"><a href="update.php"><img src="image/manage.png" alt="Update" class="ship"><br>Update Shipment</a></button>
                    <button class="shipment"><a href="view.php"><img src="image/transaction.png" alt="View" class="ship">View Shipment</a></button>
                    <button class="shipment"><a href="login.php">Log out</a></button>
                </section>
            </div>
            <div class="maincontent">
                <h1 class="cs">Update Shipment</h1>
                <div class="box">
                    <h3 class="sub_title">Shipment ID</h3>
                    <input type="text" id="update_shipmentid" placeholder="ET000" class="same flex">
                    <button class="ret" id="UpdateBtn">Select</button> 
                    <hr>
                    <h3 class="sub_title">Sender Information</h3>
                    <div class="form_body">
                        <div class="name">
                            <input type="text" placeholder="Sender Name" class="same" id="update_sname">
                            <input type="tel" placeholder="Phone Number" class="same" id="update_sphone">
                            <input type="text" placeholder="Suite No./Unit" class="same" id="update_sunit"> 
                            <input type="text" placeholder="Street" class="same" id="update_sstreet">
                            <input type="text" placeholder="City" class="same" id="update_scity">
                            <select id="update_sprovince" class="same">
                                <option disabled selected value="" class="same">Province</option>
                                <option value="Alberta" class="same">Alberta</option>
                                <option value="British Columbia" class="same">British Columbia</option>
                                <option value="Manitoba" class="same">Manitoba</option>
                                <option value="New Brunswick" class="same">New Brunswick</option>
                                <option value="Newfoundland" class="same">Newfoundland</option>
                                <option value="Labrador" class="same">Labrador</option>
                                <option value="Nova Scotia" class="same">Nova Scotia</option>
                                <option value="Ontario" class="same">Ontario</option>
                            </select>
                            <input type="text" placeholder="Postal Code" class="same" id="update_spostal">
                        </div>
                    </div>
                    <hr>
                    <h3 class="sub_title">Receiver Information</h3>
                    <div class="form_body">
                        <div class="name">
                            <input type="text" placeholder="Receiver Name" class="same" id="update_rname">
                            <input type="tel" placeholder="Phone Number" class="same" id="update_rphone">
                            <input type="text" placeholder="Suite No./Unit" class="same" id="update_runit"> 
                            <input type="text" placeholder="Street" class="same" id="update_rstreet">
                            <input type="text" placeholder="City" class="same" id="update_rcity">
                            <select id="update_rprovince" class="same">
                                <option disabled selected value="" class="same">Province</option>
                                <option value="Alberta" class="same">Alberta</option>
                                <option value="British Columbia" class="same">British Columbia</option>
                                <option value="Manitoba" class="same">Manitoba</option>
                                <option value="New Brunswick" class="same">New Brunswick</option>
                                <option value="Newfoundland" class="same">Newfoundland</option>
                                <option value="Labrador" class="same">Labrador</option>
                                <option value="Nova Scotia" class="same">Nova Scotia</option>
                                <option value="Ontario" class="same">Ontario</option>
                            </select>
                            <input type="text" placeholder="Postal Code" class="same" id="update_rpostal">
                        </div>
                    </div>
                    <hr>
                    <h3 class="sub_title">Package Information</h3>
                    <div class="form_body">
                        <div class="name">
                            <input type="text" placeholder="Weight in kg" class="same" id="update_weight">
                            <div class ="type">
                            <select id="update_type" name="Type">
                                <option disabled selected value="">Choose Type</option>
                                <option value="Bag - Small">Bag - Small</option>
                                <option value="Bag - Medium">Bag - Medium</option>
                                <option value="Bag - Large">Bag - Large</option>
                                <option value="Box - Small">Box - Small</option>
                                <option value="Box - Medium">Box - Medium</option>
                                <option value="Box - Large">Box - Large</option>
                            </select>
                            <select id="update_status" name="status">
                                <option disabled selected value="">Status</option>
                                <option value="Pending">Pending</option>
                                <option value="In Transit">In Transit</option>
                                <option value="Out for Delivery">Out for Delivery</option>
                                <option value="Failed Attempt">Failed Attempt</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Returned">Returned</option>
                            </select>
                            </div>
                         </div>
                         <div class="name"> 
                            <textarea class="content" id="update_content" name="content" rows="4" cols="50" placeholder="Content Details"></textarea>
                        </div>
                    </div>
                    <button class="save" id="SaveUpdateBtn">Save</button> <button class="del" id="DeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="update_script.js" type="module"></script>
    <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT>
</body>
</html>
