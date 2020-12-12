<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Air</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
    <div class="banner">
        <div class="top_block">
            <ul>
                <li><a href="index.php"><span style="font-size: 30px;">Home</span>
                <li><a href="flights.php?originVal=bestdeals"><span style="font-size: 30px;">Best Deals</span></a></li>
                <li style="float:right"><a href="flights.php"><span style="font-size: 30px;">Flights</span></a></li>
            </ul>
        </div>
        <div class="city-block">
        <form name="searchf" action='flights.php' <?php echo $_GET['originVal'].$_GET['destVal']; ?>  method='get'>
            <div class="search-container">
                <input type="text" placeholder="Origin" id="searchOriginInput" name="originVal" value=""><br>
                <ul class="search_results" id="searchOriginResults"></ul>
                <?php echo $_POST['originVal']; ?>
            </div>

            <div class="search-container">
                <input type="text" placeholder="Destination" id="searchDestinationInput" name="destVal" value=""><br>
                <ul class="search_results" id="searchDestinationResults"></ul>
            </div>
            
            <input type="date" id="departureday" value="2019-01-12" min="2019-01-12" max = "2019-03-1"><br>
            <input type="number" placeholder="Passegers"><br>
            <button >Search</button>
        </form>
        </div>


    </div>
    <br>
    <div class="offerts"> 
        <h2>Cheap flight offers**</h2> 
    </div>
    <div class="images">
        <div class="img-container">
            <img src="Images/roma3.jpg">
            <div class="img-text">
                <h3><b>Iasi to Roma</b></h3>
                <a href="booking.php?id_f=11"><b>59.99 lei</b></a>
            </div>
        </div>
        <div class="img-container">
            <img src="Images/bucuresti.jpg">
            <div class="img-text">
                <h3><b>Cluj to Bucuresti</b></h3>
                <a href="booking.php?id_f=12"><b>49.99 lei</b></a>
            </div>
        </div>
        <div class="img-container">
            <img src="Images/warsaw1.jpg">
            <div class="img-text">
                <h3><b>Iasi to Warsaw</b></h3>
                <a href="booking.php?id_f=13"><b>99.99 lei</b></a>
            </div>
        </div>
        <div class="img-container">
            <img src="Images/londra1.jpg">
            <div class="img-text">
                <h3><b>Iasi to Londra</b></h3>
                <a href="booking.php?id_f=14"><b>149.99 lei</b></a>
            </div>
        </div>
    </div>
<br>
<script type="text/javascript" src="./js/script.js"></script>
</body>

<footer> <p> &copy;AirPlane </p></footer>

</html>