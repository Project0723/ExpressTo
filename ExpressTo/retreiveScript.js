import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getDatabase, ref, child, get } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-database.js";

const firebaseConfig = {
    // Your Firebase config
};
const app = initializeApp(firebaseConfig);
const db = getDatabase();

document.getElementById('retrieveDataBtn').addEventListener('click', function() {
    const shipmentId = document.getElementById('retrieveShipId').value;
    const dbRef = ref(db);

    get(child(dbRef, 'ShipmentSet/' + shipmentId)).then((snapshot) => {
        if (snapshot.exists()) {
            document.getElementById('displaySname').textContent = snapshot.val().sendername;
            document.getElementById('displaySphone').textContent = snapshot.val().senderphone;
            document.getElementById('displayRname').textContent = snapshot.val().receivername;
            document.getElementById('displayRphone').textContent = snapshot.val().receiverphone;
            // Display more fields as needed
            document.getElementById('shipmentDetails').style.display = 'block';
        } else {
            alert("No data found for shipment ID: " + shipmentId);
        }
    }).catch((error) => {
        console.error(error);
    });
});
