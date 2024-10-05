
<!DOCTYPE html>
<html>
<head>
   <title>EasyRide - Help Page</title>
   <link rel = "stylesheet" href="help.css">
</head>
<body>

    <div class="logo">
        <img src="logo.jpg" class="logo">
    </div>

    <div class = "name">
        <h2>EasyRide</h2 class = "name">
    </div>


    <div class="user-section">
        <div class="user-profile">
            <img src="download.png" alt="Profile Icon">
        </div>
    
        <button class="logout-btn">LogOut</button>
    </div>

    <div class="navbar">
<ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Vehicles</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">View</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="#">Help</a></li>
</ul>
</div>

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



    <footer>
        <div class="footer-sections">
            <div class="footer-column">
                <h4>Solution</h4>
                <ul>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Commerce</a></li>
                    <li><a href="#">Insights</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">API Status</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Claim</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h4>Get the latest news and updates</h4>
                <form action="#">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <p>&copy; 2024 EasyRide. All rights reserved.</p>
    </footer>
</body>
</html>
