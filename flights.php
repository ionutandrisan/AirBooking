<?php
	session_start();
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Flights</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
<div class="banner-flight">
    <div class="top_block">
        <ul>
            <li><a href="index.php"><span style="font-size: 30px;">Home</span>
            <li><a href="flights.php?originVal=bestdeals"><span style="font-size: 30px;">Best Deals</span></a></li>
            <li style="float:right"><a href="flights.php"><span style="font-size: 30px;">Flights</span></a></li>
        </ul>
    </div>
<div class="main_section">
    <h2>Flights</h2>
    <?php 
            echo "<table id=\"myTable\"> <tr><th>ID</th><th>From</th><th>To</th><th>Date</th><th>Leaves</th><th>Arrives</th><th>Price</th></tr>";
                    
                    $produs = null;
                    $originVal = $_GET['originVal'];
                    $destVal = $_GET['destVal'];
                    if($originVal == 'bestdeals') {
                        $produse = json_decode(file_get_contents("res/bestdeals.json"), true);
                        foreach($produse as $produs){
                            echo "<tr><td>" .$produs["id"]. "</td>";
                            echo "<td>" .$produs["origin"]. "</td>";
                            echo "<td>" .$produs["destination"]. "</td>";
                            echo "<td>" .$produs["zi"]. "-" .$produs["luna"]. "-" .$produs["an"]. "</td>";
                            echo "<td>" .$produs["leave"]. "</td>";
                            echo "<td>" .$produs["arrive"]. "</td>";
                            echo '<form action="booking.php?id_f='.$produs["id"].'" method="post">';
                            if($produs['liber'] > 0)
                                echo "<td><button class='button-booking' name='modifica'>From " .$produs["pret"]. " lei</button></td>";
                            else
                                echo "<td><button class='button-booking' name='modifica' disabled>No seats avalabile</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                    }
                    else {
                        $produse = json_decode(file_get_contents("res/flights.json"), true);
                        if(!$originVal && !$destVal) {    
                            foreach($produse as $produs){
                                echo "<tr><td>" .$produs["id"]. "</td>";
                                echo "<td>" .$produs["origin"]. "</td>";
                                echo "<td>" .$produs["destination"]. "</td>";
                                echo "<td>" .$produs["zi"]. "-" .$produs["luna"]. "-" .$produs["an"]. "</td>";
                                echo "<td>" .$produs["leave"]. "</td>";
                                echo "<td>" .$produs["arrive"]. "</td>";
                                echo '<form action="booking.php?id_f='.$produs["id"].'" method="post">';
                                if($produs['liber'] > 0)
                                echo "<td><button class='button-booking' name='modifica'>From " .$produs["pret"]. " lei</button></td>";
                            else
                                echo "<td><button class='button-booking' name='modifica' disabled>No seats avalabile</button></td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                        } else if($originVal && !$destVal) {
                            foreach($produse as $produs){
                                if($produs['origin'] == $originVal) {
                                    echo "<tr><td>" .$produs["id"]. "</td>";
                                    echo "<td>" .$produs["origin"]. "</td>";
                                    echo "<td>" .$produs["destination"]. "</td>";
                                    echo "<td>" .$produs["zi"]. "-" .$produs["luna"]. "-" .$produs["an"]. "</td>";
                                    echo "<td>" .$produs["leave"]. "</td>";
                                    echo "<td>" .$produs["arrive"]. "</td>";
                                    echo '<form action="booking.php?id_f='.$produs["id"].'" method="post">';
                                    if($produs['liber'] > 0)
                                    echo "<td><button class='button-booking' name='modifica'>From " .$produs["pret"]. " lei</button></td>";
                                else
                                    echo "<td><button class='button-booking' name='modifica' disabled>No seats avalabile</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                            }
                        } else if(!$originVal && $destVal) {
                            foreach($produse as $produs){
                                if($produs['destination'] == $destVal) {
                                    echo "<tr><td>" .$produs["id"]. "</td>";
                                    echo "<td>" .$produs["origin"]. "</td>";
                                    echo "<td>" .$produs["destination"]. "</td>";
                                    echo "<td>" .$produs["zi"]. "-" .$produs["luna"]. "-" .$produs["an"]. "</td>";
                                    echo "<td>" .$produs["leave"]. "</td>";
                                    echo "<td>" .$produs["arrive"]. "</td>";
                                    echo '<form action="booking.php?id_f='.$produs["id"].'" method="post">';
                                    if($produs['liber'] > 0)
                                echo "<td><button class='button-booking' name='modifica'>From " .$produs["pret"]. " lei</button></td>";
                            else
                                echo "<td><button class='button-booking' name='modifica' disabled>No seats avalabile</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                            }
                        } else if($originVal && $destVal) {
                            foreach($produse as $produs){
                                if($produs['origin'] == $originVal && $produs['destination'] == $destVal) {
                                    echo "<tr><td>" .$produs["id"]. "</td>";
                                    echo "<td>" .$produs["origin"]. "</td>";
                                    echo "<td>" .$produs["destination"]. "</td>";
                                    echo "<td>" .$produs["zi"]. "-" .$produs["luna"]. "-" .$produs["an"]. "</td>";
                                    echo "<td>" .$produs["leave"]. "</td>";
                                    echo "<td>" .$produs["arrive"]. "</td>";
                                    echo '<form action="booking.php?id_f='.$produs["id"].'" method="post">';
                                    if($produs['liber'] > 0)
                                echo "<td><button class='button-booking' name='modifica'>From " .$produs["pret"]. " lei</button></td>";
                            else
                                echo "<td><button class='button-booking' name='modifica' disabled>No seats avalabile</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
    ?>
    </div>
</div>    

</body>
</html>