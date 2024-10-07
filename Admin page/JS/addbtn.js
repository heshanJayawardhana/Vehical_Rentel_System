document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('insertBtnCustomer').addEventListener('click', function() {
        // Get the table where rows are added
        const table = document.querySelector('#myTable'); // Ensure this targets the right table
    
        // Create a new row element
        const newRow = document.createElement('tr');
        
        // Create cells with input fields
        newRow.innerHTML = `
            <form method='POST' action='../PHP/insertcustomers.php'>
                <td><input type='text' name='user_id' value='' placeholder='Enter ID'></td>
                <td><input type='text' name='first_name' value='' placeholder='Enter First Name'></td>
                <td><input type='text' name='last_name' value='' placeholder='Enter Last Name'></td>
                <td><input type='date' name='date_of_birth' value=''></td>
                <td>
                    <input type='radio' name='gender' value='male'>Male&nbsp
                    <input type='radio' name='gender' value='female'>Female
                </td>
                <td><input type='text' name='nic_number' value='' placeholder='Enter NIC'></td>
                <td><input type='text' name='licence_number' value='' placeholder='Enter License'></td>
                <td><input type='text' name='address' value='' placeholder='Enter Address'></td>
                <td><input type='tel' name='mobile' value='' placeholder='Enter Mobile'></td>
                <td><input type='email' name='email' value='' placeholder='Enter Email'></td>
                <td><input type='text' name='nic_pdf' value='' placeholder='Enter NIC PDF'></td>
                <td><input type='text' name='profile_image' value='' placeholder='Enter Profile Image'></td>
                <td><input type='password' name='password' value='' placeholder='Enter Password'></td>
                <td><input type='date' name='created_at' value='' placeholder='Enter Creation Date'></td>
                <td><input type='submit' name='submitBtn' value='save'></td>
                <td><button type='button' class='deleteRow'>Delete</button></td>
            
        `;
    
        // Append the new row to the table
        table.appendChild(newRow);
    
        // Add functionality to delete the row when clicking the delete button
        newRow.querySelector('.deleteRow').addEventListener('click', function() {
            this.closest('tr').remove();
        });
    });
});
