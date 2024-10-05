<?php include_once'../includes/header.php';?>

      <link rel="stylesheet" href="terms and condition page.css">
    
          <div class="container">
          <div class="content-terms"> 
          <h1><b><i>Terms and Conditions</i></b></h1>
             
            <b><h2>1. Eligibility</h2></b>
            <p>To use our services, you must be at least 18 years old, Possess a valid driver’s license issued by your country or region, hold a valid credit or debit card for payment and agree to provide accurate and complete personal and payment information.</p>

            <b><h2>2.Rental Period </h2></b>
            <p>The rental period begins when you pick up the vehicle and ends when the vehicle is returned to the designated EasyRide location, or an alternate location agreed upon.Late returns may be subject to additional fees as specified in your rental agreement.</p>
      
            <b><h2>3.Vehicle Condition  </h2></b>
            <p> The vehicle must be returned in the same condition as when it was rented, barring normal wear and tear.Renters must inspect the vehicle before departure and report any existing damages.The vehicle may only be used for lawful purposes and must not be used for commercial purposes (unless explicitly allowed in the rental agreement).In any illegal activities.</p>
      
            <b><h2>4. Booking and Payment </h2></b>
            <p>Full payment is required at the time of booking, or as specified in your rental agreement.Accepted payment methods include credit and debit cards. All transactions are securely processed through our payment gateway.Cancellation and refund policies are outlined during the booking process. Failure to cancel within the specified period may result in a full or partial charge </p>
          
		    <div id="more-content" class="hidden">  
		    <b><h2> 5.Insurance and Liability  </h2></b>
			<p> EasyRide provides basic insurance coverage as part of the rental package. You may be liable for any damage to the vehicle not covered under the insurance policy.Renters are encouraged to review insurance options and consider additional coverage where necessary.You are responsible for any damage, theft, or loss caused to the vehicle during the rental period, unless otherwise covered by insurance.</p>
		
		    <b><h2> 6. Accidents and Breakdowns </h2></b>
			<p> In the event of an accident or breakdown, you must notify EasyRide immediately. Failure to report incidents in a timely manner may result in additional charges.We provide 24/7 roadside assistance to ensure your safety and minimize any disruptions during your rental period.In case of vehicle malfunction that is not your fault, a replacement vehicle may be provided based on availability.</p>

            <b><h2> 7. Damage and Repairs</h2></b>
            <p>You are liable for any damages caused to the vehicle during the rental period, including interior and exterior damage.Unauthorized repairs or alterations to the vehicle are prohibited. Any necessary repairs must be handled through EasyRide or authorized partners.</p>

            <b> <h2> 8. Prohibited Use</h2></b>
            <p> Do not use the vehicle for illegal activities, overloading, or unauthorized ride-hailing services.</p>

            <b> <h2> 9.Limitation of Liability </h2></b>
            <p> EasyRide is not responsible for any indirect, incidental, or consequential damages arising from the use of our services or vehicles.In case of vehicle unavailability due to unforeseen circumstances (such as a breakdown), EasyRide’s liability will be limited to providing a replacement vehicle or refunding any payments made for unused rental days.</p>
		
            <b> <h2> 10.Governing Law </h2></b>
            <p> These terms are governed by the local laws where EasyRide operates.</p>
        </div>
		<button id="btn1">See More</button>
		</div>
		</div>
		 <script>
          document.getElementById('btn1').addEventListener('click', function() {
              var moreContent = document.getElementById('more-content');
              var button = document.getElementById('btn1');
              
              /* Show more content */
              moreContent.classList.remove('hidden');
              
              /* Remove the button after clicking */
              button.style.display = 'none';

          });
      </script>
<?php include_once'../includes/footer.php'; ?>		