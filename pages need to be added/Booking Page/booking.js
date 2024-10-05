

 //Booking page forms hiding 
  document.addEventListener('DOMContentLoaded', () => {
	  
	  const planTripButton = document.getElementById('planTripButton');
	  const updateBookingButton = document.getElementById('updateBookingButton');
	 

	  
	  const planTripFields = document.getElementById('planTripForm');
	  const updateBookingFields = document.getElementById('updateBookingForm');
	  

	  // Show Quick Rent form by default
	  planTripFields.classList.remove('hidden');

	  planTripButton.addEventListener('click', () => {
		  planTripFields.classList.remove('hidden');
		  updateBookingFields.classList.add('hidden');
		 
	  });

	  updateBookingButton.addEventListener('click', () => {
		  planTripFields.classList.add('hidden');
		  updateBookingFields.classList.remove('hidden');
		
		  
	  });
  });




//calculate amount when user select date time
function calculateTotalAmount() {
	// Get the input values for pickup and return dates
	var pickupDate = new Date(document.getElementById('pickup_date').value);
	var returnDate = new Date(document.getElementById('return_date').value);

	// Ensure both dates are selected
	if (!document.getElementById('pickup_date').value || !document.getElementById('return_date').value || pickupDate >= returnDate) 
	{
		document.getElementById('total_amount').innerHTML = "Please select valid dates!";

		return ;
	}

	// Calculate the difference in time (in milliseconds)
	var timeDifference = returnDate.getTime() - pickupDate.getTime();

	// Convert time difference to days
	var days = timeDifference / (1000 * 3600 * 24);

	// Define rates based on the duration
	var amount = 0;
	
	if (days <= 1) {
		amount = 3000; // 1 day
		 
	}else if(days>=1 && days<7){
		amount = days * 2600;
		 
	} else if (days <= 7) {
		amount = 20000; // 1 week
		 
	} else if (days <= 30) {
		amount = 100000; // 1 month
		 
	} else if (days <= 90) {
		amount = 300000; // 3 months
		 
	} else {
		amount = 50000 ;// More than 6 months
		
	}


	var driver = document.querySelector('input[name="driver"]:checked').value;
    if (driver === 'yes') {
        amount += 5000; // Add driver cost
    }

	if (typeof amount === "number") {
		amount = amount.toFixed(2);//2 decimal places
	}

	// Display the total amount
	document.getElementById('total_amount').innerHTML = "Total Amount:-Rs: " +amount;
	
}



//disable check box-booking form
function enableButton()
{
	if(document.getElementById("chkBox").checked){
		
		document.getElementById("submitbtn").disabled=false;
	}
	else
	{
		document.getElementById("submitbtn").disabled=true;
	}
	
	
}
//update form
function enableButton2()
{
	if(document.getElementById("chkBox2").checked){
		
		document.getElementById("submitbtn").disabled=false;
	}
	else
	{
		document.getElementById("submitbtn").disabled=true;
	}
	
	
}




  
