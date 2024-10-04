function addRow(event) {
    //alert("Add button clicked!");
    const target = event.target;  // Get the target from the event

    // Get the closest button span (if it exists)
    const buttonSpan = target.closest('[id^="addRowButton"]');
    if (!buttonSpan) return;  // Exit if the closest span is not found

    alert('Target ID: ' + buttonSpan.id);  // This will show the correct ID

    // Get the table from the DOM
    const table = document.getElementById('myTable'); // Directly get the table by its ID
    if (!table) {
        alert('No table found!');
        return;  // Exit if no table is found
    }

    alert('Table ID: ' + table.id);  // This should now show the correct table ID
    const tbody = table.querySelector('tbody');  // Get the tbody from that table
    
    // Check if tbody is found
    if (!tbody) {
        alert("No tbody found in the table");
        return;  // Exit if tbody is not found
    }

    //alert("We're here!");
    
    // Create a new row
    const newRow = document.createElement('tr');
    
    // Create cells for the new row
    
if(buttonSpan.id=='addRowButtonCustomer'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    const col5 = document.createElement('td');
    const col6 = document.createElement('td');
    const col7 = document.createElement('td');
    const col8 = document.createElement('td');
    const col9 = document.createElement('td');
    const col10 = document.createElement('td');
    const col11 = document.createElement('td');
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="text" style="border:none;">';
    col3.innerHTML = '<input type="text" style="border:none;">';
    col4.innerHTML = '<input type="text" style="border:none;">';
    col5.innerHTML = '<input type="password" style="border:none;">';
    col6.innerHTML = '<input type="text" style="border:none;">';
    col7.innerHTML = '<input type="radio" name="gender" value="male" style="border:none;">Male&nbsp<input type="radio" name="gender" value="female" style="border:none;">Female&nbsp<input type="radio" name="gender" value="other" style="border:none;">Other&nbsp';
    col8.innerHTML = '<input type="date" style="border:none;">';
    col9.innerHTML = '<textarea name="address" style="border:none;">';
    col10.innerHTML = '<textarea name="bio" style="border:none;">';
    col11.innerHTML = '<input type="text" name="pic" style="border:none;">';

    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    editButton.onclick = () => toggleEdit(newRow, editButton, saveButton); // Pass in the buttons to toggle their state
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}


if(buttonSpan.id=='addRowButtonStaff'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    const col5 = document.createElement('td');
    const col6 = document.createElement('td');
    const col7 = document.createElement('td');
    const col8 = document.createElement('td');
    const col9 = document.createElement('td');
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="text" style="border:none;">';
    col3.innerHTML = '<input type="number" style="border:none;">';
    col4.innerHTML = '<input type="text" style="border:none;">';
    col5.innerHTML = '<input type="text" style="border:none;">';
    col6.innerHTML = '<input type="number" style="border:none;">';
    //col7.innerHTML = '<input type="radio" name="gender" value="male" style="border:none;">Male&nbsp<input type="radio" name="gender" value="female" style="border:none;">Female&nbsp<input type="radio" name="gender" value="other" style="border:none;">Other&nbsp';
    col7.innerHTML = '<textarea style="border:none;">';
    col8.innerHTML = '<input type="number" style="border:none;">';
    col9.innerHTML = '<input type="date" style="border:none;">';
   

    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    editButton.onclick = () => toggleEdit(newRow, editButton, saveButton); // Pass in the buttons to toggle their state
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4,col5,col6,col7,col8,col9];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonDriver'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="number" style="border:none;">';
    col3.innerHTML = '<input type="text" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    //editButton.onclick = () => toggleEdit(newRow, editButton, saveButton); // Pass in the buttons to toggle their state
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonRentalagent'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    
    
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="number" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonBranch'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    
    
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="email" style="border:none;">';
    col3.innerHTML = '<textarea style="border:none;">';
    col4.innerHTML = '<input type="text" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonBranchcontact'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="tel" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}


if(buttonSpan.id=='addRowButtonCuscontact'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="tel" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonCusemail'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    
    
    
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="email" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}


if(buttonSpan.id=='addRowButtonPayment'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    const col5 = document.createElement('td');
    const col6 = document.createElement('td');

    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="number" style="border:none;">';
    col3.innerHTML = '<input type="text" style="border:none;">';
    col4.innerHTML = '<input type="number" style="border:none;">';
    col5.innerHTML = '<input type="text" style="border:none;">';
    col6.innerHTML = '<input type="date" style="border:none;">';

    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4,col5,col6];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonRental'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    const col5 = document.createElement('td');
    

    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="number" style="border:none;">';
    col3.innerHTML = '<input type="number" style="border:none;">';
    col4.innerHTML = '<input type="text" style="border:none;">';
    col5.innerHTML = '<input type="text" style="border:none;">';
    

    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4,col5];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}

if(buttonSpan.id=='addRowButtonReservation'){
    alert("I'm in");

    const col1 = document.createElement('td');
    const col2 = document.createElement('td');
    const col3 = document.createElement('td');
    const col4 = document.createElement('td');
    const col5 = document.createElement('td');
    const col6 = document.createElement('td');
    const col7 = document.createElement('td');
    const col8 = document.createElement('td');
    const col9 = document.createElement('td');
    const col10 = document.createElement('td');
    
    const actionCol1 = document.createElement('td');
    const actionCol2 = document.createElement('td');

    // Create input fields for data entry
    col1.innerHTML = '<input type="number" name="ID" style="border:none;">';
    col2.innerHTML = '<input type="number" style="border:none;">';
    col3.innerHTML = '<input type="number" style="border:none;">';
    col4.innerHTML = '<input type="text" style="border:none;">';
    col5.innerHTML = '<input type="number" style="border:none;">';
    col6.innerHTML = '<input type="number" style="border:none;">';
    col7.innerHTML = '<input type="time" style="border:none;">';
    col8.innerHTML = '<input type="time" style="border:none;">';
    col9.innerHTML = '<input type="date" style="border:none;">';
    col10.innerHTML = '<input type="date" style="border:none;">';
    
    // Create save and delete buttons
    const saveButton = document.createElement('button');
    const editButton = document.createElement('button');
    saveButton.textContent = 'Save';
    editButton.textContent = 'Edit';
    saveButton.id = 'saveBtn';
    editButton.id = 'editBtn';
    editButton.style.display='none';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol1.appendChild(editButton);
    actionCol2.appendChild(deleteButton);

    array=[col1,col2,col3,col4,col5,col6,col7,col8,col9,col10];

     for(count=0;count<array.length;count++){
         newRow.appendChild(array[count]);
    }

    newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);
    tbody.appendChild(newRow);
}
    // Create save and delete buttons
    /*const saveButton = document.createElement('button');
    saveButton.textContent = 'Save';
    saveButton.onclick = () => saveRow(newRow);

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteRow(newRow);

    // Append buttons to action column
    actionCol1.appendChild(saveButton);
    actionCol2.appendChild(deleteButton);

   /* if (table && table.rows.length > 0) {
        const numberOfCols = table.rows[0].cells.length;

    }*/

    

    /*    array=[col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11];

        for(count=0;count<array.length;count++){
            newRow.appendChild(array[count]);
        }*/

    // Append cells to the new row
    /*newRow.appendChild(col1);
    newRow.appendChild(col2);
    newRow.appendChild(col3);
    newRow.appendChild(col4);
    newRow.appendChild(col5);
    newRow.appendChild(col6);
    newRow.appendChild(col7);
    newRow.appendChild(col8);
    newRow.appendChild(col9);
    newRow.appendChild(col10);
    newRow.appendChild(col11);*/
   /* newRow.appendChild(actionCol1);
    newRow.appendChild(actionCol2);

    // Append the new row to the table body
    tbody.appendChild(newRow);  // Append to tbody*/
}

function toggleEdit(row) {
    // Get all input fields in the row
    const inputs = row.querySelectorAll('input, textarea');

    // Find the edit and save buttons inside the row
    const editButton = row.querySelector('#editBtn');  // Fetch the edit button within the row
    const saveButton = row.querySelector('#saveBtn');  // Fetch the save button within the row
    
    // Check if the edit button is already in edit mode
    if (editButton.textContent === 'Edit') {
        // Make inputs editable
        inputs.forEach(input => {
            input.disabled = false; // Enable input fields
            input.style.border = '1px solid #ccc'; // Change border style for visibility
        });
        editButton.textContent = 'Cancel'; // Change button text to "Cancel"
        saveButton.style.display = 'inline'; // Show the save button
        row.querySelector('#saveBtn').onclick = () => saveRow(row);
    } else {
        // Revert to read-only mode
        inputs.forEach(input => {
            input.disabled = true; // Disable input fields
            input.style.border = 'none'; // Change border style to none
        });
        editButton.textContent = 'Edit'; // Change button text back to "Edit"
        saveButton.style.display = 'none'; // Hide the save button
    }
}


// Function to save the row (implement your save logic here)
function saveRow(row) {
    const inputs = row.querySelectorAll('input,textarea');//captiring all the field data

    
    
    
    row.querySelector('#editBtn').style.display = 'block';
    //editButton.onclick = () => toggleEdit(newRow, editButton, saveButton);


    const data = Array.from(inputs).map(input => input.value);

    // Get the table name or ID (assuming table has an ID or data attribute)
    const table = document.getElementById('myTable');
    const tableName = table.getAttribute('name');  // You can add a custom attribute to store the table name

    // Send the data along with the table name
    fetch('insertData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ 
            tableName: tableName,  // Include table name
            data: data              // Include the array data
        }),
    })
    .then(response => response.json())  // Parse the JSON response
    .then(result => {
        console.log('Successfully saved:', result);
    })
    .catch(error => {
        console.error('Error saving data:', error);
    });

    row.querySelector('#editBtn').onclick = () => toggleEdit(row);
    row.querySelector('#saveBtn').style.display = 'none';

    inputs.forEach(input => input.disabled = true);//Disabling all fields
    


    //editButton.onclick = () => toggleEdit(newRow, editButton, saveButton); // Pass in the buttons to toggle their state
}

// Function to delete the row
function deleteRow(row) {
    row.remove();
}

// Ensure to add event listener once the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[id^="addRowButton"]').forEach(element => {
        element.addEventListener('click', addRow);
    });
});
