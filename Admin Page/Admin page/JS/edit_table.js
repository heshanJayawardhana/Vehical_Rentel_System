document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("click", function(event) {
        // Handle update button click
        if (event.target.classList.contains("updateBtn")) {
            event.preventDefault(); // Prevent the form from submitting immediately

            const form = event.target.closest('form');
            const row = event.target.closest('tr'); // Get the current row
            const cells = row.querySelectorAll("td:not(:last-child):not(:nth-last-child(2))"); // Select all cells except the last two

            // Make cells editable
            cells.forEach(cell => {
                cell.contentEditable = true; // Make cells editable
            });

            event.target.style.display = "none"; // Hide update button
            row.querySelector(".saveBtn").style.display = "block"; // Show save button
        }

        // Handle save button click
        if (event.target.classList.contains("saveBtn")) {
            event.preventDefault(); // Prevent form submission

            const form = event.target.closest('form');
            const row = event.target.closest('tr'); // Get the current row
            const cells = row.querySelectorAll("td:not(:last-child):not(:nth-last-child(2))"); // Select all cells except the last two

            // Collect primary key and other values

            if(form.querySelector('input[name="customer_id"]')?.value){
                const customerID = form.querySelector('input[name="customer_id"]').value;
                var updatedData = { CID: customerID };

                sendData(customerID,updatedData);


            }

            if(form.querySelector('input[name="driver_id"]')?.value){
                const driver_id = form.querySelector('input[name="driver_id"]').value;
                var updatedData = { driverID: driver_id };

                sendData(driver_id,updatedData);


            }

            if(form.querySelector('input[name="branch_id"]')?.value){
                const branch_id = form.querySelector('input[name="branch_id"]').value;
                var updatedData = { branch_id: branch_id };

                sendData(branch_id,updatedData);


            }

            if(form.querySelector('input[name="payment_id"]')?.value){
                const payment_id = form.querySelector('input[name="payment_id"]').value;
                var updatedData = { payment_id: payment_id };

                sendData(payment_id,updatedData);


            }

            if(form.querySelector('input[name="rental_id"]')?.value){
                const rental_id = form.querySelector('input[name="rental_id"]').value;
                var updatedData = { rental_id: rental_id };

                sendData(rental_id,updatedData);


            }

            if(form.querySelector('input[name="reservation_id"]')?.value){
                const reservation_id = form.querySelector('input[name="reservation_id"]').value;
                var updatedData = { reservation_id: reservation_id };

                sendData(reservation_id,updatedData);


            }

            //---------------------------------------sending data of branchcontact table-------------------------------------

            const branID = form.querySelector('input[name="branID"]')?.value;
            const telB = form.querySelector('input[name="telB"]')?.value;

            if(branID && telB){
                //document.write("branID amd telB are assigned to JS variables<br>");
                //document.write(branID);
                //document.write(telB);
                //const branID = form.querySelector('input[name="branID"]').value;
                //const telB = form.querySelector('input[name="telB"]').value;
                var updatedData = { branID: branID, telB: telB };

                sendDataNew(branID,telB,updatedData);


            }

            const cusID = form.querySelector('input[name="cusID"]')?.value;
            const telC = form.querySelector('input[name="telC"]')?.value;

            if(cusID && telC){
                //document.write("branID amd telB are assigned to JS variables<br>");
                //document.write(branID);
                //document.write(telB);
                //const branID = form.querySelector('input[name="branID"]').value;
                //const telB = form.querySelector('input[name="telB"]').value;
                var updatedData = { cusID: cusID, telC: telC };

                sendDataNew(cusID,telC,updatedData);


            }

            const ctmID = form.querySelector('input[name="ctmID"]')?.value;
            const emailC = form.querySelector('input[name="emailC"]')?.value;

            if(ctmID && emailC){
                //document.write("branID amd telB are assigned to JS variables<br>");
                //document.write(branID);
                //document.write(telB);
                //const branID = form.querySelector('input[name="branID"]').value;
                //const telB = form.querySelector('input[name="telB"]').value;
                var updatedData = { ctmID: ctmID, emailC: emailC };

                sendDataNew(ctmID,emailC,updatedData);


            }
        }

            if (event.target.classList.contains("deleteBtn")) {
                alert('Inside delete button');
                event.preventDefault(); // Prevent form submission
                const form = document.getElementById('deleteForm');
                //alert(form);
                /*const form = event.target.closest('form');
                alert(form);*/
                //alert('Hi');
                const row = event.target.closest('tr'); // Get the current row
                //alert(row);
                //const cells = row.querySelectorAll("td:not(:last-child):not(:nth-last-child(2))"); // Select all cells except the last two
    
                // Collect primary key and other values
    
                if(form.querySelector('input[name="customer_id"]')?.value){
                    const customerID = form.querySelector('input[name="customer_id"]').value;
                    //alert(customerID);
                    tname='customer';
    
                    const deleteDataList={ID:customerID,delT:tname,deltid:'CusID'};
                    deleteData(deleteDataList,row);
    
    
                }
            }
        
    /*----------------------------------------------------------------------------------------------------------------------------------
                if(form.querySelector('input[name="driver_id"]')?.value){
                    const driver_id = form.querySelector('input[name="driver_id"]').value;
                    tname='driver';
                    deleteData(driver_id,tname,row,'');
    
    
                }
    
                if(form.querySelector('input[name="branch_id"]')?.value){
                    const branch_id = form.querySelector('input[name="branch_id"]').value;
                    tname='branch';
                    deleteData(branch_id,tname,row);
    
    
                }
    
                if(form.querySelector('input[name="payment_id"]')?.value){
                    const payment_id = form.querySelector('input[name="payment_id"]').value;
                    tname='payment';
                    deleteData(payment_id,tname,row);
    
    
                }
    
                if(form.querySelector('input[name="rental_id"]')?.value){
                    const rental_id = form.querySelector('input[name="rental_id"]').value;
                    tname='rental';
                    deleteData(rental_id,tname,row);
    
    
                }
    
                if(form.querySelector('input[name="reservation_id"]')?.value){
                    const reservation_id = form.querySelector('input[name="reservation_id"]').value;
                    tname='reservation';
                    
                    deleteData(reservation_id,tname,row);
    
    
                }
-------------------------------------------------------------------------------------------------------------------------------*/
                function deleteData(list,row) {
                    alert('Inside delete function');

                    /*alert("ID:" +id);
                    alert("tname:" +tname);
                    alert("row:" +row);
                    alert("tid:" +tid);

                    // Create an object with the data you want to send
                    const requestData = {
                        delID: id,
                        delT: tname,
                        deltid: tid
                    };*/
            
                    // Corrected: log the object in a more readable format
                    //console.log('Sending data:', JSON.stringify(requestData, null, 2)); // Pretty print JSON object
            
                    fetch('../PHP/deletetables.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(list) // Send the object as JSON
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data); // Log response data for debugging
                        if (data.status === 'success') { // Check for success in response
                            row.style.display = 'none'; // Hide the row only on success
                        } else {
                            alert(data.message || 'Failed to delete the record.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error); // Handle errors in the request
                    });
                }
            
    
                /*//---------------------------------------sending data of branchcontact table-------------------------------------
    
                const branID = form.querySelector('input[name="branID"]')?.value;
                const telB = form.querySelector('input[name="telB"]')?.value;
    
                if(branID && telB){
                    //document.write("branID amd telB are assigned to JS variables<br>");
                    //document.write(branID);
                    //document.write(telB);
                    //const branID = form.querySelector('input[name="branID"]').value;
                    //const telB = form.querySelector('input[name="telB"]').value;
                    var updatedData = { branID: branID, telB: telB };
    
                    sendDataNew(branID,telB,updatedData);
    
    
                }
    
                const cusID = form.querySelector('input[name="cusID"]')?.value;
                const telC = form.querySelector('input[name="telC"]')?.value;
    
                if(cusID && telC){
                    //document.write("branID amd telB are assigned to JS variables<br>");
                    //document.write(branID);
                    //document.write(telB);
                    //const branID = form.querySelector('input[name="branID"]').value;
                    //const telB = form.querySelector('input[name="telB"]').value;
                    var updatedData = { cusID: cusID, telC: telC };
    
                    sendDataNew(cusID,telC,updatedData);
    
    
                }
    
                const ctmID = form.querySelector('input[name="ctmID"]')?.value;
                const emailC = form.querySelector('input[name="emailC"]')?.value;
    
                if(ctmID && emailC){
                    //document.write("branID amd telB are assigned to JS variables<br>");
                    //document.write(branID);
                    //document.write(telB);
                    //const branID = form.querySelector('input[name="branID"]').value;
                    //const telB = form.querySelector('input[name="telB"]').value;
                    var updatedData = { ctmID: ctmID, emailC: emailC };
    
                    sendDataNew(ctmID,emailC,updatedData);
    
    
                }

            



            /*const customerID = form.querySelector('input[name="customer_id"]').value;
            const driverID = form.querySelector('input[name="driver_id"]').value;
            const branchID = form.querySelector('input[name="branch_id"]').value;
            const branID = form.querySelector('input[name="branID"]').value;
            const telB = form.querySelector('input[name="telB"]').value;
            const cusID = form.querySelector('input[name="cusID"]').value;
            const telC = form.querySelector('input[name="telC"]').value;
            const ctmID = form.querySelector('input[name="ctmID"]').value;
            const emailC = form.querySelector('input[name="emailC"]').value;
            const payment_id = form.querySelector('input[name="payment_id"]').value;
            const rental_id = form.querySelector('input[name="rental_id"]').value;
            const reservation_id = form.querySelector('input[name="reservation_id"]').value;*/

            // Create an object to hold updated data 



        function sendData(ID,updatedData){
            if(ID){
            //if (form.querySelector('input[name="customer_id"]').value) {
                //const customerID = form.querySelector('input[name="customer_id"]').value;
                //let updatedData = { CID: customerID };

                // Loop through the cells and get updated values
                //document.write(cells+"<br>");
                cells.forEach((cell, index) => {
                    updatedData[index] = cell.innerText; // Get the updated text for each cell
                    //document.write(updatedData);
                });

                // Send the updated data to the server
                fetch('updatetables.php', {//----------------------------------------
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(updatedData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Handle success or error response here
                })
                .catch(error => {
                    console.error('Error:', error); // Handle errors in the request
                });
            }

            // Make cells non-editable again, regardless of success
            cells.forEach(cell => {
                cell.contentEditable = false; // Make cells non-editable again
            });

            // Toggle buttons back
            event.target.style.display = "none"; // Hide save button
            row.querySelector(".updateBtn").style.display = "block"; // Show update button again
        }

            //-------------------------------------- Create an object to hold updated data for multivalued tables-----------------------------------------------------------
            
            function sendDataNew(ID1,ID2,updatedData){
                //document.write("Hi");
                if(ID1 && ID2){
                    //document.write(ID1+"<br>");
                    //document.write(ID2+"<br>");
                //if (form.querySelector('input[name="customer_id"]').value) {
                    //const customerID = form.querySelector('input[name="customer_id"]').value;
                    //let updatedData = { CID: customerID };
    
                    // Loop through the cells and get updated values
                    //document.write(cells+"<br>");
                    cells.forEach((cell, index) => {
                        updatedData[index] = cell.innerText; // Get the updated text for each cell
                    });
                    //document.write(updatedData);
    
                    // Send the updated data to the server
                    fetch('updatetablesnew.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(updatedData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Handle success or error response here
                    })
                    .catch(error => {
                        console.error('Error:', error); // Handle errors in the request
                    });
                }
    
               
            }

             // Make cells non-editable again, regardless of success
             cells.forEach(cell => {
                cell.contentEditable = false; // Make cells non-editable again
            });

            // Toggle buttons back
            event.target.style.display = "none"; // Hide save button
            row.querySelector(".updateBtn").style.display = "block"; // Show update button again
        });
    });
    
    
