
<?php
include("readProf.php"); //Including the PHP file to read the profile details from the database
?>


<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">

    <head>
        <title>User Account - EasyRide.com</title>

         <!------------------------Include the CSS file which has styles for HTML tags--------------------------------------------------->

        <link rel="stylesheet" href="../CSS/styles.css">
   
    </head>

    <body>

            <header>
            <!------------------------------------------adding an image slider for the header section --------------------------------------------------------->

            <img class="image-slider active" src="../Image/aqua.jpg" alt="img1">       <!--To set thefirst image as the currently visible image-->
            <img class="image-slider" src="../Image/benz.jpg" alt="img2">              <!--To set the other images invisible until they are active-->
            <img class="image-slider" src="../Image/caravan.jpg" alt="img3">
            <img class="image-slider" src="../Image/benz2.webp" alt="img4">
            <img class="image-slider" src="../Image/civic2.jpg" alt="img5">
            <img class="image-slider" src="../Image/civilian.jpg" alt="img6">
            <img class="image-slider" src="../Image/leaf.jpg" alt="img7">
            <img class="image-slider" src="../Image/kdh.jpg" alt="img8">
            <img class="image-slider" src="../Image/luxury.jpg" alt="img9">
            <img class="image-slider" src="../Image/noah.jpeg" alt="img10">
            <img class="image-slider" src="../Image/oldsunny.jpg" alt="img11">
            <img class="image-slider" src="../Image/outlander.jpg" alt="img11">

            <!-------------------------------------------to set image transitions, the JS file is added------------------------------------------------------------- -->  

            <script src="../js/image slider.js"></script> 

         <!-----------------------------------------------designing the logo---------------------------------------------------------------------------------------->   

        <div id="ride">
            <img src="../images/logo.jpeg" alt="logo" height="50" width="50" >&nbsp   <!--logo image-->
            <a href="www.EasyRide.com" >EasyRide.com</a>     <!--text with link-->
        </div>


        <!----------------------------------------------Create the profile section---------------------------------------------------------------------------------->

            <div class="profile">

            <a href="#useraccount"><img src="../images/profile temp.avif" alt="profile" height="50" width="50"></a>  <!--profile image with a link(clickable)---->

            <button type="button" id="logout"><a href="#home">Log Out</a></button>   <!------logout button which redirect to the home------->

            </div><br><br><br><br>

            <!----------------------------------------------Create the navigation bar---------------------------------------------------------------------------------->

            <ul id="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#vehicles">Vehicles</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#view">View</a></li>
                <li><a href="#contactus">Contact Us</a></li>
                <li><a href="#help">Help</a></li>
            </ul>

        </header> <!--end of the header section--->

        <!-----------------------------------------------------------Table and form------------------------------------------------------------------------------->
        <div style="position:relative;">  <!----to make this a reference point---->

        <!-----------------------------------------------------------------form container---------------------------------------------------------->
        <div>
        <form action="update_dataV.php" method="get">  <!--once clicked submit directed to php file which has the information regarding update of data----->

        <!--------------------------------------------------------------Table inside the form---------------------------------------------------------------------->
            <table style="width:60%;">
                <!------------------------------------ specify the width of each column dynamically----------------------------------------------------------->
                <colgroup>
                    <col class="firstCol" style="width:11%;">
                    <col class="secCol" style="width:25%;">
                    <col class="thirdCol" style="width:20%;background-color:rgb(221, 249, 249);">  <!--Style the third column differently--->
                    <col class="fourthCol" style="width:11%;">
                    <col class="fifthCol" style="width:27%;">
                </colgroup>
            
                <!----------------------------------------Group the first  row of the table-------------------------------------------------------------------->
                <thead>
                <tr>

                    <!---------------------------------------------------Current bio(not modifiable, just displaying)--------------------------------------------------->

                    <th  colspan="5" style="font-size:20px;text-align:center;font-style:italic;color:white;padding:5%;background-color:rgb(4, 6, 46);" ><p class="bio" id="BioDisplay" ><?php echo htmlspecialchars($bio); ?></p>

                    <!-------------------------------------------------Edit bio button✏️----------------------------------------------------------------------------------->

                    <span id="editBio" class="bio" style="cursor: pointer;display:none;">✏️</span>

                    <!---------------------------------------------------New bio----------------------------------------------------------------------------------------->
                    
                    <textarea id="BioNew" name="BioI" style="display:none;"></textarea></th>


                </tr>
                </thead>

                <!----------------------------------------ends the first  row of the table-------------------------------------------------------------------->

                <!----------------------------------------Second row of the table-------------------------------------------------------------------->

                <tr>
                     
                    <td class="colA">Name:</td>
                    
                    <td class="colB">
                        
                    <!--Name modifiable field-->  
                    <input type="text" id="NameModify" name="name" value="<?php echo htmlspecialchars($fname.' '.$lname); ?>" disabled required>

                    <!--Edit name button-->
                    <span id="editName" style="cursor: pointer;display:none;">✏️</span></td>

                    <td rowspan="5" style="width:10%"><center><img src="../Image/woman.png" alt="profile" height="150" width="100"></td></center>

                    <!--Current gender(not modifiable)-->
                    <td class="colA" style="border:none;">Gender </td><td class="colB"><span id="GenderDisplay"><?php echo htmlspecialchars($gender); ?></span>

                    <!--Edit gender button-->
                    <span id="editGender" style="cursor: pointer;display:none;">✏️</span>

                    <!--New gender-->
                    <span style="display:none" id="GenderNew"><input type="radio" name="gender" value="male">Male&nbsp
                    <input type="radio" name="gender" value="female">Female&nbsp
                    <input type="radio" name="gender" value="other">Other</span></td>


                </tr>

                <!----------------------------------------ends the second  row of the table-------------------------------------------------------------------->

                <!----------------------------------------third row of the table-------------------------------------------------------------------->

                <tr>
                       
                    <td class="colA">Username </td><td><input type="text" name="name" value="<?php echo htmlspecialchars($UN); ?>" disabled></td>

                    <!------------------------------------------------------------------Password field------------------------------------------------------------>

                    <td class="colA">Password </td>
                    
                    <!-------------------------------------------------------------------PW modifiable field------------------------------------------------------->

                    <td><input type="text" name="pw" id="PWModify" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo htmlspecialchars($PW); ?>" disabled>

                    <!-------------------------------------------------Edit Password button✏️----------------------------------------------------------------------------------->

                    <span id="editPW" style="cursor: pointer;display:none;">✏️</span></td>

                </tr>

                <!----------------------------------------ends the third  row of the table-------------------------------------------------------------------->

                <!----------------------------------------fourth row of the table-------------------------------------------------------------------->

                <tr>

                    
                    <td class="colA">DOB </td>
                    
                    <!--Current DOB(not modifiable)--> 
                    <td><input type="text" name="DOB" id="DOBDisplay" value="<?php echo htmlspecialchars($DOB); ?>"  disabled>

                    <!--Edit BD button-->
                    <span id="editBD" style="cursor: pointer;display:none;">✏️</span>

                    <!--New DOB-->
                    <span style="display:none" id="BDNew"><input type="date" name="DOBI" value="<?php echo htmlspecialchars($DOB); ?>"></span></td>


                    <td class="colA">age </td>
                    
                    <!--Current age(not modifiable)--> 
                    <td><input type="text" name="age" id="AgeDisplay" value="<?php echo htmlspecialchars($age); ?>" disabled>

                    <!--Edit age button-->
                    <span id="editAge" style="cursor: pointer;display:none;">✏️</span>

                    <!--New age-->
                    <input type="number" name="ageI" id="AgeNew" style="display:none;background-color:white;" max="100" min="12"></td>



                </tr>
                <tr>
                       
                    <td class="colA">Tel No </td>


                    <td style="position:relative;"><ul style="padding:0;margin:0;list-style-type:none;" id="tel_list">
                        <ul>
                         <?php 
                         if(isset($telArray)){
                            $count="1";
                    
                            foreach ($telArray as $tel){ ?>
                                <li>
                                    <!--tel modifiable field-->
                                    <span>
                                    <input type="tel"  id="TelModify-<?php echo $count; ?>" pattern="[0-9]{10}" value="<?php echo htmlspecialchars($tel); ?>" disabled onchange="updateHiddenField(<?php echo $count; ?>)">
                                    </span>

                                    <!-- Hidden field for the new value when input is disabled -->
                                    <input type="hidden" name="tel[<?php echo $count; ?>][new]" value="<?php echo htmlspecialchars($tel); ?>">

                                    <!-- Hidden field for storing the old value -->
                                    <input type="hidden" name="tel[<?php echo $count; ?>][old]" value="<?php echo htmlspecialchars($tel); ?>">
                                    <!--Edit tel button-->
                                    <span id="editTel-<?php echo $count; ?>" style="cursor: pointer;display:none;" >✏️</span>

                                    <!--Remove tel button-->
                                    <span id="removeTel-<?php echo $count; ?>" style="cursor:pointer;display:none;" onclick="telRemover(<?php echo $count; ?>)">(-)</span>
                                </li>

                                <?php 
                                $count++;

                            }
                            }
                            ?></ul>
                       
                            <!--Add tel button-->
                            <span id="TelPlus" style="cursor: pointer;display:none;"><img src="../Image/plusBlue.png" id="imgTel" style="width:30px; height:30px;position:relative;right:0;"></span> 
                            <!--<input type="tel" name="tel" pattern="[0-9]{10}" style=";display:none;">--></td>

                    <td class="colA">Email </td>
                    <td>
                        <ul style="padding:0;margin:0;list-style-type:none;" id="email_list">
                        <?php
                        $no=1; 
                        foreach ($emailArray as $email) : ?>
                                <li>

                                    <!--email modifiable field-->
                                <span>
                                    <input type="email" id="EmailModify-<?php echo $no; ?>" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value="<?php echo htmlspecialchars($email); ?>" disabled onchange="updateHiddenField(<?php echo $no; ?>)">

                                </span>

                                <!-- Hidden field for the new value when input is disabled -->
                                <input type="hidden" name="email[<?php echo $no; ?>][new]" value="<?php echo htmlspecialchars($email); ?>">

                                <!-- Hidden field for storing the old value -->
                                <input type="hidden" name="email[<?php echo $no; ?>][old]" value="<?php echo htmlspecialchars($email); ?>">



                                    <!--<span class=""><?php// echo htmlspecialchars($email); ?></span>-->

                                    <!--Edit Email button-->
                                    <span id="editEmail-<?php echo $no; ?>" style="cursor: pointer;display:none;">✏️</span>

                                    <!--Remove Email button-->
                                    <span id="removeEmail-<?php echo $no; ?>" style="cursor:pointer;display:none;" onclick="emailRemover('<?php echo $no; ?>')">(-)</span>
                                </li>
                            <?php 
                            $no++;
                            endforeach; ?></ul>

                            <!--Add Email button-->
                            <span id="EmailPlus" style="cursor: pointer;display:none;"><img src="../Image/plusBlue.png" id="imgEmail" style="width:30px;height:30px;position:relative;right:0;"></span> 
                            <!--<input type="email" name="email" pattern= style="display:none;">-->
                        </td>

                </tr>
                <tr>
                       
                    <td class="colA">Address </td>


                    <!--address modifiable field-->
                    <td><textarea name="address" id="AddressModify" rows="1" style="resize:none;height:50px;width:100%;" disabled><?php echo htmlspecialchars($address); ?></textarea>

                    <!--Edit Address button-->
                    <span id="editAddress" style="cursor: pointer;display:none;">✏️</span></td>

                    <!--edit button of profile details-->
                    <td class="colA" colspan="2"><button class="edit_button" id="editBtn" onclick="edit(event)">Edit</button>

                    <!--save button of profile details-->
                    <!--<input type="submit" id="saveBtn" class="save_button" name="save_button" style="display:none;" value="save">-->
                    <button id="saveBtn" type="submit" class="save_button" name="save_button" style="display:none;">Save</button></td>
                    

                </tr>
            </table>

          </form>
        </div>

        <!----------------------------------------------------Image link-------------------------------------------------------------------------------------------------->

        <div class="ImageButton">

        <!---------------------------------First clickable image------------------------------------------------>

            <div id="pair" style="margin-left:25px">
                <a href="display data.php?name=pair1" target="_self">    <!--Link  and the value that is passed-->
                <img src="../Image/past_activity.png" width="50" height="50" ><br> <!--Image--->
                <br>Past Activity</a><br><br>  <!--description-->
        
            </div>

            <!---------------------------------Second clickable image------------------------------------------------>
        
            <div id="pair">
                <a href="display data.php?name=pair2" target="_self">
                <img src="../Image/current_activity.png" width="50" height="50"><br>
                <br>Current Activity</a><br><br>
        
            </div>

            <!---------------------------------Third clickable image------------------------------------------------>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/fav_rides.png" width="50" height="50"><br>
                <br>Favourite Rides</a><br><br>
        
        
            </div>

            <!---------------------------------Fourth clickable image------------------------------------------------>
        
            <div id="pair" style="margin-left:25px">
        
                <a href="#">
                <img src="../Image/fav_drivers.png" width="50" height="50"><br>
                <br>Favourite Drivers</a><br><br>
        
            </div>

            <!---------------------------------Fifth clickable image------------------------------------------------>
        
            <div id="pair">
                <a href="display data.php?name=pair3" target="_self">
                <img src="../Image/payment.png" width="50" height="50"><br>
                <br>Payment History</a><br><br>
        
            </div>

            <!---------------------------------Sixth clickable image------------------------------------------------>
        
            <div id="pair">
                <a href="#">
                <img src="../Image/fav_destinations.png" width="50" height="50"><br>
                <br>Favourite Destinations</a><br><br>
        
            </div>
        </div>
    </div>

    <script src="../JS/editButton.js" defer>  </script> 
    </body>


</html>

