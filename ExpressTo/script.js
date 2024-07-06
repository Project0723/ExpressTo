
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyBp6eX0X0KbqO-i8ydB6nf-GgqwzboKhrM",
    authDomain: "expressto-a2c6b.firebaseapp.com",
    projectId: "expressto-a2c6b",
    storageBucket: "expressto-a2c6b.appspot.com",
    messagingSenderId: "235241795115",
    appId: "1:235241795115:web:3567207a5e70bfac8e846e"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  
  import{getDatabase, ref, child, get, set, update, remove} from "https://www.gstatic.com/firebasejs/10.9.0/firebase-database.js";

  const db = getDatabase();

  let shipid = document.getElementById('shipmentid');
  let shipmentid = document.getElementById('shipid');
  let sname = document.getElementById('sname');
  let sphone = document.getElementById('sphone');
  let sunit= document.getElementById('sunit'); 
  let sstreet = document.getElementById('sstreet');
  let scity = document.getElementById('scity');
  let sprovince = document.getElementById('sprovince');
  let spostal = document.getElementById('spostal');

  let rname = document.getElementById('rname');
  let rphone = document.getElementById('rphone');
  let runit = document.getElementById('runit'); 
  let rstreet = document.getElementById('rstreet');
  let rcity = document.getElementById('rcity');
  let rprovince = document.getElementById('rprovince');
  let rpostal = document.getElementById('rpostal');

  let weight = document.getElementById('weight');
  let type = document.getElementById('type');
  let status = document.getElementById('status');
  let content = document.getElementById('content');

  let AddBtn = document.getElementById('AddBtn');
  let RetBtn = document.getElementById('RetBtn');
  let UpdBtn = document.getElementById('UpdBtn');
  let DelBtn = document.getElementById('DelBtn');

  document.getElementById('shipmentform').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevents the default form submission
    AddData();
});

function AddData(){
    // Form validation check
    if (!document.getElementById('shipmentform').checkValidity()) {
        alert("Please fill all required fields.");
        return; // Stop the function if validation fails
    }

    // Proceed if the form is valid
    const dbRef = ref(db, 'ShipmentSet/' + shipmentid.value.trim());

    get(dbRef).then((snapshot) => {
        if (snapshot.exists()) {
            alert("Shipment ID already exists. Please use a unique ID.");
        } else {
            set(ref(db, 'ShipmentSet/' + shipmentid.value), {    
            shipmentid: shipmentid.value,
            sendername: sname.value,
            senderphone: sphone.value,
            senderunit: sunit.value,
            sendercity: sstreet.value,
            senderstreet: scity.value,
            senderprovince: sprovince.value,
            senderpostal: spostal.value,

            receivername: rname.value,
            receiverphone: rphone.value,
            receiverunit: runit.value,
            receiverstreet: rstreet.value,
            receivercity: rcity.value,
            receiverprovince: rprovince.value,
            receiverpostal: rpostal.value,

            weight: weight.value,
            type: type.value,
            status: status.value,
            content: content.value

        }).then(() => {
            alert("Data Added Successfully");
        }).catch((error) => {
            console.error("Error adding data: ", error);
            alert("Unsuccessful data addition");
        });
    }
}).catch((error) => {
    console.error("Error checking shipment ID: ", error);
});
}

    function RetreiveData() {
        const dbRef = ref(db);
        // Make sure you are using "shipmentid" consistently.
        const shipIdValue = shipid.value.trim(); // Using trim() to remove any whitespace.
    
        get(child(dbRef, 'ShipmentSet/' + shipIdValue)).then((snapshot) => {
            if (snapshot.exists()) {
                const data = snapshot.val(); // Get the data for the specific shipment ID.
    
                // Reference the table's tbody element and clear its contents.
                let tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = ''; // Clear any existing data.
    
                // Create a new row in the table for each piece of data retrieved.
                let newRow = tableBody.insertRow();

                const cell1 = newRow.insertCell(0);
                cell1.textContent = data.sendername || 'N/A';
                const cell2 = newRow.insertCell(1);
                cell2.textContent = data.senderphone || 'N/A';
                const cell3 = newRow.insertCell(2);
                cell3.textContent = data.senderunit || 'N/A';
                const cell4 = newRow.insertCell(3);
                cell4.textContent = data.senderstreet || 'N/A';
                const cell5 = newRow.insertCell(4);
                cell5.textContent = data.sendercity || 'N/A';
                const cell6 = newRow.insertCell(5);
                cell6.textContent = data.senderprovince || 'N/A';
                const cell7 = newRow.insertCell(6);
                cell7.textContent = data.senderpostal || 'N/A';
                const cell8 = newRow.insertCell(7);
                cell8.textContent = data.receivername || 'N/A';
                const cell9 = newRow.insertCell(8);
                cell9.textContent = data.receiverphone || 'N/A';
                const cell10 = newRow.insertCell(9);
                cell10.textContent = data.receiverunit || 'N/A';
                const cell11 = newRow.insertCell(10);
                cell11.textContent = data.receiverstreet || 'N/A';
                const cell12 = newRow.insertCell(11);
                cell12.textContent = data.receivercity || 'N/A';
                const cell13 = newRow.insertCell(12);
                cell13.textContent = data.receiverprovince || 'N/A';
                const cell14 = newRow.insertCell(13);
                cell14.textContent = data.receiverpostal || 'N/A';
                const cell15 = newRow.insertCell(14);
                cell15.textContent = shipIdValue;  // ID comes from input, not data
              
              
                // If you need an action button in the last cell.
                let actionCell = newRow.insertCell(15);
                actionCell.innerHTML = '<button>Action</button>'; // Modify as needed.
    
            } else {
                alert("No data found for shipment ID: " + shipIdValue);
            }
        }).catch((error) => {
            console.error("Failed to retrieve data: ", error);
            alert("Unsuccessful data retrieval");
        });
    }
    
    
    
    

    function UpdateData(){
        update(ref(db, 'ShipmentSet/' + shipmentid.value),{

            sendername: sname,
            senderphone: sphone,
            senderunit: sunit,
            sendercity: scity,
            senderprovince: sprovince,
            senderpostal: spostal,

            receivername: rname,
            receiverphone: rphone,
            receiverunit: runit,
            receivercity: rcity,
            receiverprovince: rprovince,
            receiverpostal: rpostal,

            weight: weight,
            type: type,
            content: content

        }).then(()=>{
            alert("Data Updated Successfully");
        }).catch(()=>{
            alert("Unsucessful")
            console.log(error);
        })
    }

    function DeleteData(){
        remove(ref(db, 'ShipmentSet/' + shipmentid.value))
        .then(()=>{
            alert("Data Deleted Successfully");
        }).catch(()=>{
            alert("Unsucessful")
            console.log(error);
        })
    }

    AddBtn.addEventListener('click', AddData);
    //RetBtn.addEventListener('click', RetreiveData);
    //UpdBtn.addEventListener('click', UpdateData);
    //DelBtn.addEventListener('click', DeleteData);

