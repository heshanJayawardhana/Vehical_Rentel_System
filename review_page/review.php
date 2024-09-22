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
        <div id="review_frame"></div>
    </div>
    <div id="add" class="add">Add your comment... 
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d=  "M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>
    </div>

    
    
    <div id="model_popup" style="display: none">

        <?php 
            session_start();

            if (isset($_SESSION['type'], $_SESSION['user_id'])) { 

                $sql = 'SELECT * FROM ' . $_SESSION['type'] . 'WHERE user_id = ' $_SESSION['user_id'] ;
                $details = $conn -> query($sql);

                if ( ! ($details -> num_rows > 0) ) {
                    echo "Internal Error !!";
                } else {
                    $data = $details -> fetch_assoc();
                }

            } else {
                // Set error message in session
                session_start();
                $_SESSION['error_message'] = 'You are not worthy! (Login First)';
                header('Location: ./login.php'); // Redirect to your login page
                exit();
            }
        ?>

        <form action="./reviewAction.php" method="post">
            
            <div class="profile">
                <div class="profile_pic">
                    <img src="../images/review_page_images/istockphoto-694184490-612x612.jpg" alt="profile_picture">
                </div>

                <div class="name">
                    <p><?php echo $driver_data['first_name'].' '.$driver_data['last_name'] ?></p>
                </div>
            </div>
        
            <textarea name="comment" id="comment" placeholder="Enter your comment..."></textarea>

            <div class="rate-bar" id="starBar">     
            </div>
            <input type="hidden" id="rate_amount" name="rate_amount" value="0">
            <input type="hidden" name="user" value='<?php echo $driver_data['user_id'] ?>'>

            <div>

                <button id="resetBtn" type="reset" class="btn">Cancel</button>
                <button type="submit" class="btn">Submit</button>

            </div>
        
        </form>

    </div>


    <script>
        let reviews = [
            {name: 'Alice Johnson', img: '../images/review_page_images/istockphoto-1138008134-612x612.jpg', review: 'Fantastic service and a great experience. Highly recommended!', rate: 5},
            {name: 'Bob Smith', img: '../images/review_page_images/istockphoto-1372641610-612x612.jpg', review: 'Good quality but the delivery was delayed. Would use again.', rate: 3},
            {name: 'Fiona Gallagher', img: '../images/review_page_images/istockphoto-1384357158-612x612.jpg', review: 'Not what I expected. The product didn’t match the description.', rate: 2},
            {name: 'Charlie Brown', img: '../images/review_page_images/istockphoto-2065805265-612x612.jpg', review: 'Amazing product! Exceeded my expectations. Will buy again.', rate: 5},
            {name: 'Diana Prince', img: '../images/review_page_images/istockphoto-1323164739-612x612.jpg', review: 'Decent quality for the price. Some minor issues, but overall good.', rate: 4},
            {name: 'Ethan Hunt', img: '../images/review_page_images/istockphoto-1923379318-612x612.jpg', review: 'Terrible customer service. The product was fine, but the support was lacking.', rate: 1}
        ];

        var frame = document.getElementById("review_frame");

        function showReview(array) {
            let htmlArray = [];

            array.forEach(element => {
                let starsHtml = '';
                
                for(let i = 0; i < element.rate; i++){
                    starsHtml += `
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#ffe500" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                    </svg>
                </div>`;
                }
                
                for (let i = 0; i < (5 - element.rate); i++) {
                    starsHtml += `<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#cfc678" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg></div>`;
                }

                let content = `
                    <div class="review_box">
                        <div class="profile_box">
                            <div    class="profile_pic">
                                <img src="${element.img}" alt="profile picture">
                            </div>
                            <div class="profile_name">${element.name}
                            </div>
                        </div>
                        <div class="comment_box">
                            <p>${element.review}</p>
                            <div class="rate">
                                ${starsHtml}
                            </div>
                        </div>
                    </div>
                `;
                
                htmlArray.push(content);
            });

            frame.innerHTML = htmlArray.join('');  // Correctly join the array into a single string
        }

        showReview(reviews);


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


        // cancel button 
        document.getElementById('resetBtn').addEventListener('click', () => {
            document.getElementById('rate_amount').value = 0;
            ratings(0);
            document.getElementById('model_popup').style.display = 'none';
        });

    </script>

</body>
</html>
