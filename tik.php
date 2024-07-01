<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
if (isset($_GET['url'])) {
    $original_url = $_GET['url'];
    $api_url = 'http://yangtautauaja.xp3.biz/v1/tiktokDownloader.php?url=$original_url';
    
    $ch = curl_init($api_url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if ($response !== false) {
        $data = json_decode($response, true);

   
            $short_url = $data['downloadsUrl']['video2'];
         

                $api_url = 'https://is.gd/create.php?format=json&url=' . urlencode($short_url);
//MADE BY NEP DEVS(@DEVSNP)
    $ch = curl_init($api_url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
         $data = json_decode($response, true);
         
          $short_url = $data['shorturl'];
         
//MADE BY NEP DEVS(@DEVSNP)
            $output = ['video' => $short_url, 'join' => 't.me/Yagami_x4light'];
            echo json_encode($output);
    } else {
        echo json_encode(['error' => 'API Error', 'contact' => '@Yagami_x4light']);
    }
    curl_close($ch);
} else {
    echo json_encode(['error' => 'Missing "text" parameter']);
}
//MADE BY @Yagami_x4light