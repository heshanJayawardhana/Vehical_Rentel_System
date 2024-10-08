document.addEventListener('DOMContentLoaded', function() {

    // Update button click event listener access each update button
    document.querySelectorAll('#updateBtn').forEach(function(updateBtn) {
        updateBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get the row that contains the clicked update button
            const row = this.closest('tr');

            // Make all input fields in the row editable
            row.querySelectorAll('input').forEach(function(input) {
            input.removeAttribute('readonly'); // Remove readonly to allow editing
            });

            // Hide the update button and show the save button
            row.querySelector('#updateBtn').style.display = 'none';
            const submitBtn = row.querySelector('.submitBtn');
            if (submitBtn) {
                submitBtn.style.display = 'block'; // Show the save button
            } else {
                console.error('Save button not found in the row.'); // Use console.error for debugging
            }

            if(document.querySelector('input[name="gender"]')){
                document.querySelector('input[name="gender"]').style.display='none';
            }

            
            
            row.querySelectorAll('div').forEach(function(div){
                div.style.display='inline';
            });

           
        });
    });
});
