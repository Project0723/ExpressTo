import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getDatabase, ref, child, get, update, remove } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-database.js";


const firebaseConfig = {
    apiKey: "AIzaSyBp6eX0X0KbqO-i8ydB6nf-GgqwzboKhrM",
    authDomain: "expressto-a2c6b.firebaseapp.com",
    projectId: "expressto-a2c6b",
    storageBucket: "expressto-a2c6b.appspot.com",
    messagingSenderId: "235241795115",
    appId: "1:235241795115:web:3567207a5e70bfac8e846e"
  };

const app = initializeApp(firebaseConfig);
const db = getDatabase();

document.getElementById('UpdateBtn').addEventListener('click', function() {
    const shipmentId = document.getElementById('update_shipmentid').value;
    const shipmentRef = ref(db, 'ShipmentSet/' + shipmentId);

    get(shipmentRef).then((snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            document.getElementById('update_sname').value = data.sendername;
            document.getElementById('update_sphone').value = data.senderphone;
            document.getElementById('update_sunit').value = data.senderunit;
            document.getElementById('update_sstreet').value = data.senderstreet;
            document.getElementById('update_scity').value = data.sendercity;
            document.getElementById('update_sprovince').value = data.senderprovince;
            document.getElementById('update_spostal').value = data.senderpostal;
            document.getElementById('update_rname').value = data.receivername;
            document.getElementById('update_rphone').value = data.receiverphone;
            document.getElementById('update_runit').value = data.receiverunit;
            document.getElementById('update_rstreet').value = data.receiverstreet;
            document.getElementById('update_rcity').value = data.receivercity;
            document.getElementById('update_rprovince').value = data.receiverprovince;
            document.getElementById('update_rpostal').value = data.receiverpostal;
            document.getElementById('update_weight').value = data.weight;
            document.getElementById('update_type').value = data.type;
            document.getElementById('update_status').value = data.status;
            document.getElementById('update_content').value = data.content;
            // Populate other fields as necessary.
        } else {
            alert("No data found for this shipment ID.");
        }
    }).catch((error) => {
        console.error("Error fetching data: ", error);
    });
});

document.getElementById('SaveUpdateBtn').addEventListener('click', function() {
    const shipmentId = document.getElementById('update_shipmentid').value;
    const updateRef = ref(db, 'ShipmentSet/' + shipmentId);
    
    const updatedData = {
        sendername: document.getElementById('update_sname').value,
        senderphone: document.getElementById('update_sphone').value,
        senderunit: document.getElementById('update_sunit').value,
        senderstreet: document.getElementById('update_sstreet').value,
        sendercity: document.getElementById('update_scity').value,
        senderprovince: document.getElementById('update_sprovince').value,
        senderpostal: document.getElementById('update_spostal').value,
        receivername: document.getElementById('update_rname').value,
        receiverphone: document.getElementById('update_rphone').value,
        receiverunit: document.getElementById('update_runit').value,
        receiverstreet: document.getElementById('update_rstreet').value,
        receivercity: document.getElementById('update_rcity').value,
        receiverprovince: document.getElementById('update_rprovince').value,
        receiverpostal: document.getElementById('update_rpostal').value,
        weight: document.getElementById('update_weight').value,
        type: document.getElementById('update_type').value,
        status: document.getElementById('update_status').value,
        content: document.getElementById('update_content').value,
        
    };

    update(updateRef, updatedData).then(() => {
        alert("Data updated successfully.");
    }).catch((error) => {
        console.error("Error updating data: ", error);
    });
});


document.getElementById('DeleteBtn').addEventListener('click', function() {
    const shipmentId = document.getElementById('update_shipmentid').value;
    
    if (!shipmentId) {
        alert("Please enter a shipment ID.");
        return;
    }

    const deleteRef = ref(db, 'ShipmentSet/' + shipmentId);

    if (confirm("Are you sure you want to delete this shipment?")) {
        remove(deleteRef).then(() => {
            alert("Shipment deleted successfully.");
            // Clear the form or take any other necessary action
            clearForm();
        }).catch((error) => {
            console.error("Error deleting data: ", error);
            alert("Failed to delete the shipment.");
        });
    }
});

// Optional: Function to clear the form fields after deletion
function clearForm() {
    document.getElementById('update_shipmentid').value = '';
    document.getElementById('update_sname').value = '';
    document.getElementById('update_sphone').value = '';
    document.getElementById('update_sunit').value = '';
    document.getElementById('update_sstreet').value = '';
    document.getElementById('update_scity').value = '';
    document.getElementById('update_sprovince').value = '';
    document.getElementById('update_spostal').value = '';
    document.getElementById('update_rname').value = '';
    document.getElementById('update_rphone').value = '';
    document.getElementById('update_runit').value = '';
    document.getElementById('update_rstreet').value = '';
    document.getElementById('update_rcity').value = '';
    document.getElementById('update_rprovince').value = '';
    document.getElementById('update_rpostal').value = '';
    document.getElementById('update_weight').value = '';
    document.getElementById('update_type').value = '';
    document.getElementById('update_status').value = '';
    document.getElementById('update_content').value = '';
}
