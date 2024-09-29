<?php

// connection
include '../includes/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="review.css">
</head>
<body>
    
    <div id="big_box">
        <div class="topic">Reviews</div>
        
        <div class="review_block">
        <?php

session_start();

// Check if session variables are set
if (isset($_SESSION['type'], $_SESSION['user_id'])) {
    // Prepare the base SQL query
    $feedback_sql = "SELECT c.first_name, c.last_name, c.profile_image, r.id, r.review, r.rate 
                     FROM reviews r 
                     JOIN Customers c ON r.customer_id = c.user_id
                     WHERE r.customer_id = '" . $_SESSION['user_id'] . "'";

    $get_feedback = $conn->query($feedback_sql);

    if ($get_feedback && $get_feedback->num_rows > 0) {
        while ($user_review = $get_feedback->fetch_assoc()) {
            
                    echo '<div class="review_box">
                            <div class="profile_box">
                                <div class="profile_pic">
                                    <img src="' . $user_review['profile_image'] . '" alt="profile picture">
                                </div>
                                <div class="profile_name">' . $user_review['first_name'] . ' ' . $user_review['last_name'] . '</div>
                            </div>
                            <div class="comment_box">
                                <p>' . addslashes($user_review['review']) . '</p>
                                <div class="rate">';
            
                    // Display filled stars
                    for ($i = 0; $i < $user_review['rate']; $i++) {
                        echo '<div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="#ffe500" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                </svg>
                              </div>';
                    }
            
                    // Display empty stars
                    for ($i = $user_review['rate']; $i < 5; $i++) {
                        echo '<div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="#cfc678" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                                </svg>
                              </div>';
                    }
            
                    echo '        </div>
                            </div>
                            <div class="side-options">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </div>
                                <div class="option-box">
                                    <a href="./deleteReview.php?id='.$user_review['id'].'">
                                        <div class="vector">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>
                                        </div>
                                    </a>
                                    <div class="vector" onClick="updateForm(\'' . addslashes($user_review['review']) . '\', ' . $user_review['rate'] . ', \'' . $user_review['id'] . '\')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="currentColor" d="M368.4 18.3L312.7 74.1 437.9 199.3l55.7-55.7c21.9-21.9 21.9-57.3 0-79.2L447.6 18.3c-21.9-21.9-57.3-21.9-79.2 0zM288 94.6l-9.2 2.8L134.7 140.6c-19.9 6-35.7 21.2-42.3 41L3.8 445.8c-3.8 11.3-1 23.9 7.3 32.4L164.7 324.7c-3-6.3-4.7-13.3-4.7-20.7c0-26.5 21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48c-7.4 0-14.4-1.7-20.7-4.7L33.7 500.9c8.6 8.3 21.1 11.2 32.4 7.3l264.3-88.6c19.7-6.6 35-22.4 41-42.3l43.2-144.1 2.7-9.2L288 94.6z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>';

        }


    }

}

// ===================================================================================================
// show other reviews
$review_sql = "SELECT c.first_name, c.last_name, c.profile_image, r.review, r.rate 
                FROM reviews r 
                JOIN Customers c ON r.customer_id = c.user_id";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $review_sql .= " WHERE r.customer_id != '" . $_SESSION['user_id'] . "'";
}

// Execute the query
$reviews = $conn->query($review_sql);

// Check if the query was successful
if ($reviews) {
    // Fetch and format the results
    while ($feedbacks = $reviews->fetch_assoc()) {

        // echo '{name: "' . $feedbacks['first_name'] . ' ' . $feedbacks['last_name'] . '", img: "' . $feedbacks['profile_image'] . '", review: "' . addslashes($feedbacks['review']) . '", rate: ' . (int)$feedbacks['rate'] . '},';
        echo '<div class="review_box">
                <div class="profile_box">
                    <div class="profile_pic">
                        <img src="' . $feedbacks['profile_image'] . '" alt="profile picture">
                    </div>
                    <div class="profile_name">' . $feedbacks['first_name'] . ' ' . $feedbacks['last_name'] . '</div>
                </div>
                <div class="comment_box">
                    <p>' . addslashes($feedbacks['review']) . '</p>
                    <div class="rate">';

        // Display filled stars
        for ($i = 0; $i < $feedbacks['rate']; $i++) {
            echo '<div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="#ffe500" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                    </svg>
                  </div>';
        }

        // Display empty stars
        for ($i = $feedbacks['rate']; $i < 5; $i++) {
            echo '<div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="#cfc678" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                    </svg>
                  </div>';
        }

        echo '        </div>
                </div>
            </div>';

    }
} else {
    echo "Oops! Something went wrong ..";
}

?>

        </div>

    </div>
    <div id="add" class="add">Add your comment... 
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d=  "M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>
    </div>    
    
    <div id="model_popup" style="display: none">

<?php 

// Check if session variables are set
if (isset($_SESSION['type'], $_SESSION['user_id'])) { 

    // Prepare the SQL statement
    $stmt = $conn->prepare('SELECT * FROM ' . $_SESSION['type'] . ' WHERE user_id = ?');
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $details = $stmt->get_result();

    // Check if there are results
    if ($details->num_rows <= 0) {
        echo "Internal Error !! No details found.";
    } else {
        $data = $details->fetch_assoc();
        
        // Output the HTML directly
        echo '
        <form action="./reviewAction.php" method="post">
            <div class="profile">
                <div class="profile_pic">
                    <img src="'.$data['profile_image'].'" alt="profile_picture">
                </div>
                <div class="name">
                    <p>' . $data['first_name'] . ' ' . $data['last_name'] . '</p>
                </div>
            </div>
            <textarea name="comment" id="comment" placeholder="Enter your comment..."></textarea>
            <div class="rate-bar" id="starBar"></div>
            <input type="hidden" id="rate_amount" name="rate_amount" value="0">
            <input type="hidden" id="feedback" name="feedback" value="RVXXX">
            <input type="hidden" name="user" value="' . $data['user_id'] . '">
            <div>
                <button id="resetBtn" type="reset" class="btn">Cancel</button>
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
        ';
    }

    $stmt->close();
} else {

    echo '
    <div class="alert-box">
        <h2>You Should Sign In First!</h2>
        <a href="../login_page/login.php">Sign In</a>
    </div>
    ';
}
?>
        
    </div>


    <script>

        // =============================================================================
        // add review
        let addComment = document.getElementById("add");
        let popup = document.getElementById("model_popup");

        addComment.addEventListener("click",()=>{
            
            if(popup.style.display != "none"){
                
                popup.style.display = "none";
            }
            else{
                
                popup.style.display = "flex";
            }

        });


        // =================================================================================================
        // rating stars 
        function rate_bar(parent_div) {
            let bar = [];

            for (let i = 1; i <= 5; i++) {
                let star = `
                <div class="star" onclick="ratings(${i})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="star-icon" data-rating="${i}">
                        <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                    </svg>
                </div>
                `;
                bar.push(star);
            }

            parent_div.innerHTML = bar.join('');
        }

        rate_bar(document.getElementById('starBar'));

        let nowRate = 0;
        function ratings(index){

            let twinkle = document.querySelectorAll('.rate-bar .star');

            for(let i=0; i < 5; i++) {

                if (i < index) {
                    twinkle[i].style.color = 'gold'; // Change color for selected stars
                    document.getElementById('rate_amount').value = index;

                } 
                else {
                    twinkle[i].style.color = '#636363'; // Default color for unselected stars
                }
            }

        }

        //================================================================================================
        // cancel button 
        document.getElementById('resetBtn').addEventListener('click', () => {
            document.getElementById('rate_amount').value = 0;
            ratings(0);
            document.getElementById('model_popup').style.display = 'none';
        });

        // ================================================================================================
        // open form with pre-loaded data AKA update reviews
        function updateForm (review, rate, review_id) {

            document.getElementById('comment').value = review;
            document.getElementById('rate_amount').value = rate;
            document.getElementById('feedback').value = review_id;
            document.getElementById('model_popup').style.display = "flex";
            ratings(rate);
        }

    </script>

</body>
</html>
