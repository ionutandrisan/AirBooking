<?php
	session_start();
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Book</title>
</head>
<body>
    
<div class="banner_booking">
<div class="top_block">
            <ul>
                <li><a href="index.php"><span style="font-size: 30px;">Home</span>
                <li><a href="flights.php?originVal=bestdeals"><span style="font-size: 30px;">Best Deals</span></a></li>
                <li style="float:right"><a href="flights.php"><span style="font-size: 30px;">Flights</span></a></li>
            </ul>
        </div>
        <div class="main_section_booking">
            <div class="main_section_booking_trip">
                <?php
                    
                    // if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['modifica']))
                    // {
                        $id_f = $_GET['id_f'];
                        if($id_f <= 10)
                            $zboruri = json_decode(file_get_contents("res/flights.json"), true);
                        else
                        $zboruri = json_decode(file_get_contents("res/bestdeals.json"), true);
                        $zbor = null;
                        foreach($zboruri as $zbor) { 
                             if($zbor["id"] == $id_f): ?> 
                                <h4>
                                    <span><?php echo $zbor['origin']; ?></span>
                                    <img src="./Images/icon2.png">
                                    <span><?php echo $zbor['destination']; ?></span>
                                </h4>
                                <h6>
                                    <span><?php echo $zbor['zi']; ?>-</span> 
                                    <span><?php echo $zbor['luna']; ?>-</span>
                                    <span><?php echo $zbor['an']; ?></span>

                                </h6>
                    
                        <?php 
                            endif;
                        
                        }
                    // }
                ?>
            </div>
            <form name="contact" action='./sendData.php'  method='post'>
                <br><input type="text" placeholder="First name" name="firstname" value=""><br>
                <input type="text" placeholder="Last name" name="lastname" value=""><br>
                <input type="text" placeholder="somebody@example.com" name="mail" value=""><br>
                <input type="tel" placeholder="Phone Number" name="phonenumber" value=""><br>
                <input type="number" placeholder="Age" name="age" value=""><br>
                <input type="text" placeholder="Country" name="country" value=""><br>
                <input type="text" placeholder="CNP" name="cnp" value=""><br><br>
                <button type="submit" name="bookbutton" >Book</button>
            </form>
        </div>
</div>
    
</body>
</html>