// view_script.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getDatabase, ref, child, get } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-database.js";

// Initialize Firebase - use your own configuration here
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

// Function to retrieve and display data
function retrieveAndDisplayData() {
  const shipmentId = document.getElementById('shipmentid').value.trim();
  if (!shipmentId) {
    alert("Please enter a shipment ID.");
    return;
  }

  const dbRef = ref(db);
  get(child(dbRef, `ShipmentSet/${shipmentId}`)).then((snapshot) => {
    if (snapshot.exists()) {
      const data = snapshot.val();
      populateTable(data);
    } else {
      alert(`No data found for shipment ID: ${shipmentId}`);
    }
  }).catch((error) => {
    console.error("Error fetching data: ", error);
  });
}

// Function to populate the table with retrieved data
function populateTable(data) {
  const tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
  tableBody.innerHTML = ''; // Clear existing table data

  let newRow = tableBody.insertRow();

  const senderAddress = `${data.senderunit || ''} ${data.senderstreet || ''}, <br> ${data.sendercity || ''}, ${data.senderprovince || ''}, ${data.senderpostal || ''}`;
  const receiverAddress = `${data.receiverunit || ''} ${data.receiverstreet || ''}, <br> ${data.receivercity || ''}, ${data.receiverprovince || ''}, ${data.senderpostal || ''}`;

  // Assume data structure has sendername, senderphone, etc. Adjust as per your actual structure.
                const cell1 = newRow.insertCell(0);
                cell1.textContent = data.sendername || 'N/A';
                const cell2 = newRow.insertCell(1);
                cell2.textContent = data.senderphone || 'N/A';
                const cell3 = newRow.insertCell(2);
                cell3.innerHTML = senderAddress || 'N/A';
                const cell4 = newRow.insertCell(3);
                cell4.textContent = data.receivername || 'N/A';
                const cell5 = newRow.insertCell(4);
                cell5.textContent = data.receiverphone || 'N/A';
                const cell6 = newRow.insertCell(5);
                cell6.innerHTML = receiverAddress || 'N/A';
                const cell7 = newRow.insertCell(6);
                cell7.innerHTML = data.weight || 'N/A';
                const cell8 = newRow.insertCell(7);
                cell8.innerHTML = data.type || 'N/A';
                const cell9 = newRow.insertCell(8);
                cell9.innerHTML = data.status || 'N/A';
}

// Event listener for the retrieve button
document.getElementById('RetBtn').addEventListener('click', retrieveAndDisplayData);
