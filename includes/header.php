<?php

    session_start();

    if (isset($_SESSION['type'], $_SESSION['user_id'])) {
        $is_logged_in = TRUE;
    } else {
        $is_logged_in = FALSE;
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../includes/styles/headerStyles.css">

    <style>
        <?php

        if ($is_logged_in) {
            echo '
            .sub_header .mini_header .header_act:nth-child(1) {
                display: none;
            }
            ';    
        } else {
            echo '
            .sub_header .mini_header .header_act:nth-child(2) {
                display: none;
            }
            '; 
        }
        
        
        ?>
    </style>

</head>
<body>
    <header>

        <div class="main_header">

            <div class="sub_header">
                <img src="../images/logo/logo_without_text.png" alt="logo">
                <h3>Easy Ride Rentals</h3>
            </div>

            <div class="sub_header">
                <div class="mini_header">
                    <a class="header_link" href="../home_page/index.php">Home</a>
                    <a class="header_link" href="../aboutpage/about.php">About</a>
                    <a class="header_link" href="../contact_us_page/ContactUs.php">Contact us</a>
                    
                    <div class="header_link">
                        View

                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                        </div>
                        
                        <div class="header_drop dropdown">
                            <a href="../services_page/services.php">Services</a>
                            <a href="../vehicle_page/vehiclepg.php">vehicle</a>
                            <a href="../review_page/review.php">Reviews</a>
                        </div>
                    
                    </div>
                    
                    <a class="header_link" href="">Help</a>
                </div>
                
                <div class="mini_header">
                    <div class="header_act">
                        <a class="buttons" href="../signUp_page/signUp.html">Sign Up</a>
                        <a class="buttons" href="../login_page/login.php">Sign In</a>
                    </div>
                    <div class="header_act">
                        <img src="<?php echo $_SESSION['profile_image'] ?>" alt="Profile_Image">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                        </div>
                        <div class="user_drop dropdown">
                            <a href="../dashboard/customer_profile.php">profile</a>
                            <a href="../includes/logout.php">log out</a>
                        </div>
                    </div>
                </div>
            
            </div>

        </div>

    </header>
</body>
</html>