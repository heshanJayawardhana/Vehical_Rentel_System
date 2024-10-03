<?php
require 'config.php';

$sql = "SELECT ID,firstname, lastname, email, subject_, message_ FROM contact_requests";

$result = $con->query($sql);

    if($result-> num_rows > 0 )
    {   
        echo "<table border= '1'>";
        while($row=$result->fetch_assoc())
        {   
            echo "<tr>";
            echo "<td>".$row["ID"]."</td>"."<td>".$row["firstname"]."</td>"."<td>".$row["lastname"]."</td>"."<td>".$row["email"]."</td>"."<td>".$row["subject_"]."</td>"."<td>".$row["message_"]."</td>";
             echo "</tr>";
        }
        echo "</table>";
    }

    else {
        echo "No results";
    }

$con->close();

?>

<br><br>
<link rel="stylesheet" href="ContactUs.css">

<fieldset>
            <form method="post" action="update.php" > 

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
            <button type="submit" value="update" style="text-decoration: none; color:white;">Update</button>
            </form>
</fieldset>
                <p style = "text-align:center;"><b>OR</b></p>
<fieldset>
        <form method="post" action="delete.php" >
               
            <lable class="label">Enter the ID to  delete the table</lable><br>
            <input type="text" name="ID" placeholder="Enter the ID "><br>
            <button type="submit" value="delete"><a href="delete.php" style="text-decoration: none; color:white;">DELETE</button>
          
        </form>
</fieldset>
       
