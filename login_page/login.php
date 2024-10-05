<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Sign In | Easy Ride Rentals</title>

    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="frame">

        <div class="logo">
            <img src="../images/logo/logo_yellow.png" alt="logo-png">
        </div>

        <div class="formBlock">

            <h2>Login</h2>

            <div class="errorMsg">
                <?php
                    session_start();

                    // Check if there's an error message in the session
                    if (isset($_SESSION['error_message'])) {
                        echo '<p>' . $_SESSION['error_message'] . '</p>';
                        // Unset the error message after displaying it
                        unset($_SESSION['error_message']);
                    }
                    
                    session_destroy();
                ?>
            </div>

            <form action="./loginAction.php" method="post">
                <p>Don't have an account? <a href="../signUp_page/signUp.html">Create now</a></p>

            <div class="inputBlock">
                <label for="userEmail">E-mail</label>
                <input type="email" name="userEmail" id="userEmail" placeholder="example@gmail.com">
            </div>

            <div class="inputBlock">
                <label for="userPassword">Password</label>
                <input type="password" name="userPassword" id="userPassword" placeholder="@#*%">

                <div class="eyeBtn">
                    <img id="eye" src="../images/eye-slash-solid.svg" alt="eye-button" onclick="toggleVisibility('eye', 'userPassword')">
                </div>
            </div>

            <a href="">Forgot Password?</a>
            <button type="submit">Login</button>
            </form>
        </div>
    </div>
    
    <script src="./login.js"></script>

</body>
</html>