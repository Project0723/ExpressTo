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
    <title>Shipment Admin</title>
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
                    <h2 class="hi">Hi, <?php echo htmlspecialchars($username); ?>!</h2><!--need kapangalan ng user na nag log in-->
                    <hr>
                    <button class="shipment"><a href="shipment.php"><img src="image/shipment.png" alt="Create" class="ship"><br>Create Shipment</a></button>
                    <button class="shipment"><a href="update.php"><img src="image/manage.png" alt="Update" class="ship"><br>Update Shipment</a></button>
                    <button class="shipment"><a href="view.php"><img src="image/transaction.png" alt="View" class="ship"><br>View Shipment</a></button>
                    <button class="shipment"><a href="login.php">Log out</a></button>
                </section>
            </div>
            <div class="maincontent">
                    <h1 class="cs">Create Shipment</h1>
                    <div class="box">
                    <section class="section">
                    <form action="" id="shipmentform">
                    <div class="form_body">
                    <h3 class="sub_title">Shipment Number</h3>
                    <input required type="text" placeholder="ET000"class="same" id="shipid">
                    <h3 class="sub_title">Sender Information</h3>
                            <div class="name">
                                <input required type="text" placeholder="Sender Name" class="same" id="sname">
                                <input required type="tel" placeholder="Phone Number" class="same" id="sphone">
                             </div>
                             <div class="name"> 
                                <input required type="text" placeholder="Suite No./Unit" class="same" id="sunit">
                                <input required type="text" placeholder="Street" class="same" id="sstreet">
                                <input required type="text" placeholder="City" class="same" id="scity">
                                <div class="type">
                                    <select required id="sprovince" name="province">
                                        <option disabled selected value="" class="same">Province</option>
                                        <option value="bags" class="same">Alberta</option>
                                        <option value="bagm" class="same">British Columbia</option>
                                        <option value="bagl" class="same">Manitoba</option>
                                        <option value="boxs" class="same">New Brunswick</option>
                                        <option value="boxm" class="same">Newfoundland</option>
                                        <option value="boxl" class="same">Labrador</option>
                                        <option value="boxl" class="same">Nova Scotia</option>
                                        <option value="boxl" class="same">Ontario</option>
                                    </select>
                                </div>
                                <input required type="text" placeholder="Postal Code" class="same" id="spostal">
                            </div>
                </section>
                <hr>
                <section class="section">
                    <h3 class="sub_title">Receiver Information</h3>
                        <div class="form_body">
                            <div class="name">
                                <input required type="text" placeholder="Receiver Name" class="same" id="rname">
                                <input required type="tel" placeholder="Phone Number" class="same" id="rphone">
                             </div>
                             <div class="name"> 
                                <input required type="text" placeholder="Suite No./Unit" class="same" id="runit">
                                <input required type="text" placeholder="Street" class="same" id="rstreet">
                                <input required type="text" placeholder="City" class="same" id="rcity">
                                <div class="type">
                                <select required id="rprovince" name="province">
                                    <option disabled selected value="" class="same">Province</option>
                                    <option value="bags" class="same">Alberta</option>
                                    <option value="bagm" class="same">British Columbia</option>
                                    <option value="bagl" class="same">Manitoba</option>
                                    <option value="boxs" class="same">New Brunswick</option>
                                    <option value="boxm" class="same">Newfoundland</option>
                                    <option value="boxl" class="same">Labrador</option>
                                    <option value="boxl" class="same">Nova Scotia</option>
                                    <option value="boxl" class="same">Ontario</option>
                                </select>
                                </div>
                                <input required type="text" placeholder="Postal Code" class="same" id="rpostal">
                            </div>
                </section>
                <hr>
                <section class="section">
                    <h3 class="sub_title">Package Details</h3>
                        <div class="form_body">
                            <div class="name">
                                <input required type="text" placeholder="Weight in kg" class="same" id="weight">
                                <div class ="type">
                                <select required id="type" name="Type">
                                    <option disabled selected value="">Choose Type</option>
                                    <option value="Bag - Small">Bag - Small</option>
                                    <option value="Bag - Medium">Bag - Medium</option>
                                    <option value="Bag - Large">Bag - Large</option>
                                    <option value="Box - Small">Box - Small</option>
                                    <option value="Box - Medium">Box - Medium</option>
                                    <option value="Box - Large">Box - Large</option>
                                </select>
                                <select required id="status" name="status">
                                    <option disabled selected value="">Staus</option>
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
                                <textarea required class="content" id="content" name="content" rows="4" cols="50" placeholder="Content Details"></textarea>
                            </div>
                    
                </section>
                                <!--------------------------------------------------------------------------------->
                <button class="submit" id="AddBtn">Submit</button>
                </form>
                <!--<button class="submit" id="RetBtn">Retreive</button>
                <button class="submit" id="UpdBtn">Update</button>
                <button class="submit" id="DelBtn">Delete</button>-->
            </div>
        </div>
    </div>
    </div>
    <script src="script.js" type="module"></script>
    <SCRIPT LANGUAGE="JavaScript">
        history.forward()
        </SCRIPT>
</body>
</html>