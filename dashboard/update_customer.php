<?php 
include '../includes/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Edite Profile | Easy Ride Rentals</title>
    <link rel="stylesheet" href="./styles/update_customer.css">
</head>
<body>

<?php
    include '../includes/header.php';
?>
    
    <main>

    <?php

    $user_sql = "SELECT * FROM customers WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $user_query = $conn->query($user_sql); // Corrected to use $user_sql

    if ($user_query->num_rows > 0) {
        $user = $user_query->fetch_assoc();
    } else {
        echo 'Internal Error!';
    }

    ?>

        <div class="form_frame">
            <h1>Update Customer</h1>
            <form action="./update_customer_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                <section>
                    <fieldset>
                        <div class="form_box">
                            <label for="">First Name :</label>
                            <input type="text" name="f_name" id="f_name" value="<?php echo $user['first_name'] ?>">
                        </div>
                        <div class="form_box">
                            <label for="">NIC No. :</label>
                            <input type="text" name="nic" id="nic" value="<?php echo $user['nic_number'] ?>">
                        </div>
                        <div class="form_box">
                            <label for="">Contact :</label>
                            <input type="text" name="contact" id="contact" value="<?php echo $user['mobile'] ?>">
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form_box">
                            <label for="">Last Name :</label>
                            <input type="text" name="l_name" id="l_name" value="<?php echo $user['last_name'] ?>">
                        </div>
                        <div class="form_box">
                            <label for="">Licence :</label>
                            <input type="text" name="licen" id="licen" value="<?php echo $user['licence_number'] ?>">
                        </div>
                        <div class="form_box">
                            <label for="">Email :</label>
                            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
                        </div>
                    </fieldset>
                </section>
                <div class="form_box address_box">
                    <label for="">Address :</label>
                    <textarea name="address" id="address"><?php echo $user['address'] ?></textarea>
                </div>
                <div class="form_box">
                    <label for="img">
                        <img id="showPic" src="<?php echo $user['profile_image'] ?>" alt="profile_picture">
                        <input type="file" name="img" id="img" hidden>
                    </label>
                </div>
                
                <div class="button_row">
                    <button type="reset">cancel</button>
                    <button type="submit">update</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // image upload
        let getImg = document.getElementById('img');
        getImg.addEventListener('change', (event) => {
            let pic = event.target.files[0];
            if (pic) {
                let showImg = document.getElementById('showPic');
                let newSrc = URL.createObjectURL(pic);

                showImg.src = newSrc;
                showImg.onload = () => URL.revokeObjectURL(newSrc)
            }
        });
    </script>

<?php
    include '../includes/footer.php';
?>

</body>
</html>