<?php
require 'config.php'; 
?>

<link rel="stylesheet" type="text/css" href="ContactUs.css"> <!-- Linking external CSS file -->
<script src ="Contact.js"></script>

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
    <li><a href="/">Home</a></li>
    <li><a href="/Vehiclpg.html">Vehicles</a></li>
    <li><a href="/services.html">Services</a></li>
    <li><a href="#">View</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="helppg.html">Help</a></li>
</ul>
</div>

<div class="container">
    <div class="section-left">
        <h2>Contact Us..</h2>

        <p>
            Welcome to our contact page! If you have any questions or querise, please don't hesitate to reach out. 
            Our team is here to assist you with any concerns or inquiries you may have. We'd love to hear
            from you and help however we can!
        </p>
        <h3>Location</h3>
        <p>No:118,<br>Colombo 10<br>Sri Lanka</p>

        <h3>Email</h3>
        <P>easyride@gmail.com</p>

        <h3>Contact Number</h3>
        <p>+94703431740</p>

        <h3>Follow Us</h3>
        <div class="social-media-icon">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>  
    </div>
    <div class="section-right">
    <h2>Message Us</h2>
    <div class="container-form">
        <form method="post" action="insert.php">

        <div class="group-form">
                <label for="ID">ID</label>
                <input type="text" id="ID" name="ID" required>
            </div>
            <div class="group-form">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="group-form">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="group-form">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="group-form">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>    
            <div class="group-form">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="sub_edit_field">
            <button type="submit" value="submit">Submit</button>
            <button type="submit" value="read"><a href="read.php" style="text-decoration: none; color:white;">Edit Feedback</button>
            </div>
            
            </form>
        </div>
    </div>
</div>
   
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