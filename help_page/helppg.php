
<!DOCTYPE html>
<html>
<head>
   <title>EasyRide - Help Page</title>
   <link rel = "stylesheet" href="help.css">
</head>
<body>

<?php
    include '../includes/header.php';
?>

<div class="para"> <h2 style="font-style: italic;">Welcome to the Help Center !!!</h2></div>

    <ul class="accordian">
        <li>
            <input type="radio" name="accordian"  id= "first" checked>
            <label for="first"><b>Get Started</b></label>
            <div class="content">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sapiente quasi placeat cumque itaque eos at, 
                    voluptatum odio neque blanditiis exercitationem omnis possimus velit cupiditate, quis vel optio cum porro!
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere blanditiis alias tempora. Aliquam distinctio dolore eveniet veritatis placeat suscipit ut,
                   enim, voluptas nihil officia iure sit voluptatem dignissimos ad labore?</p>
            </div>
        </li>

        <li>
            <input type="radio" name="accordian"  id="second">
            <label for="second"><b>Booking A Vehicle</b></label>
            <div class="content">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sapiente quasi placeat cumque itaque eos at, 
                    voluptatum odio neque blanditiis exercitationem omnis possimus velit cupiditate, quis vel optio cum porro!
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere blanditiis alias tempora. Aliquam distinctio dolore eveniet veritatis placeat suscipit ut,
                   enim, voluptas nihil officia iure sit voluptatem dignissimos ad labore?</p>
            </div>
        </li>

        <li>
            <input type="radio" name="accordian"  id="third">
            <label for="third"><b>Pickup & Return</b></label>
            <div class="content">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sapiente quasi placeat cumque itaque eos at, 
                    voluptatum odio neque blanditiis exercitationem omnis possimus velit cupiditate, quis vel optio cum porro!
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere blanditiis alias tempora. Aliquam distinctio dolore eveniet veritatis placeat suscipit ut,
                   enim, voluptas nihil officia iure sit voluptatem dignissimos ad labore?</p>
            </div>
        </li>

        <li>
            <input type="radio" name="accordian"  id="fourth">
            <label for="fourth"><b>Manage Your Account</b></label>
            <div class="content">

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sapiente quasi placeat cumque itaque eos at, 
                    voluptatum odio neque blanditiis exercitationem omnis possimus velit cupiditate, quis vel optio cum porro!
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere blanditiis alias tempora. Aliquam distinctio dolore eveniet veritatis placeat suscipit ut,
                   enim, voluptas nihil officia iure sit voluptatem dignissimos ad labore?</p>
            </div>
        </li>
    </ul>
    
    <div class="container"></div>
    <button id="issue-button">Submit Issue</button>
        <h2>Enter Your Issues and Concerns.</h2>
        <form id="issueForm">
            <textarea id="comments" placeholder="Type your comments." required></textarea>
            <button type="submit" id="submitBtn">Submit</button>
        </form>
    </div>

    <button id="issue-button">Submit Issue</button>
    <div id="issue-form">
      <textarea id="issue-textarea" placeholder="Enter your issues and concerns"></textarea>
      <button type="submit" id = "submitBtn">Submit</button>
    </div>

    <script src="help.js"></script>

<?php
    include '../includes/footer.php';
?>

</body>
</html>
