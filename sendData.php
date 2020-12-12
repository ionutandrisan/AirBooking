<?php
    session_start();
    $myFile = "res/clienti.json";
    $arr_data = array();
	$formdata = array();
    $struct=array();
    
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['phonenumber']) && isset($_POST['age']) && isset($_POST['country']) && isset($_POST['cnp'])) {
        $firstname = $_POST['firsname'];
        $lastname = $_POST['lastname'];
        $mail = $_POST['mail'];
        $phonenumber = $_POST['phonenumber'];
        $age = $_POST['age'];
        $country = $_POST['country'];
        $cnp = $_POST['cnp'];

        try {
           
                $struct = array(
                    'firstname'=> $_POST['firstname'],
                    'lastname'=> $_POST['lastname'],
                    'mail'=> $_POST['mail'],
                    'phonenumber'=> $_POST['phonenumber'], 
                    'age'=> $_POST['age'],
                    'country'=> $_POST['country'],
                    'cnp' => $_POST['cnp'],
                );
                
                $arr_data = json_decode(file_get_contents($myFile), true);
                if($arr_data==null)
                {
                    $arr_data=array();
                }
                array_push($arr_data,$struct);
                $formdata=$arr_data;
                $jsondata = json_encode($formdata, JSON_PRETTY_PRINT);
                if(file_put_contents($myFile, $jsondata)){
                    $message="Locul dumneavoastra a fost rezervat!";
                    
                }
                else {
                    $message="EROARE! Locul dumneavoastra nu a fost rezervat!";
                }

            }
            catch (Exception $e) {
                $message = "$e->getMessage()";  
                }
        }	
    echo "<script type='text/javascript'>alert('$message');</script>"; 
    echo "<script type='text/javascript'>window.location.href = './flights.php';</script>";
?>