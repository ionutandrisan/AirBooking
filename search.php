<?php
    if (!isset($_GET['origin'])) {
        echo '{"error": "Origin not provided"}';
        exit();
    }

    
    $limit = 5;

    $origin = $_GET['origin'];
    $coins = json_decode(file_get_contents('./res/orase.json'), true);
    $results = []; 
    
    foreach ($coins as $c) {
        if ($limit == 0) 
            break;
        if (strpos(strtolower($c['origin']), strtolower($origin)) !== false) {
            $results[] = [
                'origin' => $c['origin']
            ];
            $limit--;
        }
    }

    echo '{"results":' . json_encode($results) . '}';
?>