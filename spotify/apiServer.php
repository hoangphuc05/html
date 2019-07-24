<?php 
    
$urlApi = "https://accounts.spotify.com/api/token";
$refreshToken = "AQBsfznI_ZtCdzKce2gFI8ujtyZfr-OXDxD0MN4k1llDhH0Y1Cz-tky4ru-vyj0D5uydUqmFr9xER5zpuXTEw2QsOu9q6kLmV2W7w25o3KU9smOtsr5Su-8rkAMBzGSXeSaWrw";
$clientID = "17e0bdac640c48a39849fa7e28a7fd97";
$clientSecret = "2498d0468ec04db38e551b19c0e79229";
$data = [
    "grant_type"=>"refresh_token",
    "refresh_token"=>$refreshToken
];
//$header = ['Authorization: Basic '.base64_encode($clientID.":".$clientSecret)];
$header = [
'Authorization: Basic '.base64_encode($clientID.":".$clientSecret),
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Encoding: gzip, deflate',
'Accept-Language: en-US,en;q=0.5',
'Cache-Control: no-cache',
'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
];
$dataString = http_build_query($data);
//echo "in file";
if (isset($_POST['action'])) {
    //echo "in if";
    switch ($_POST['action']) {
        case 'refresh':
            //echo "in refresh";
            refresh();
            break;
        case 'next':
            nextSong($_POST['key']);
            break;
        case 'prev':
            previous($_POST['key']);
            break;
        case 'current':
            getCurrent($_POST['key']);
            break;
    }
}

function refresh(){
    global $urlApi, $refreshToken, $clientID, $clientSecret, $dataString, $header;
    $header = ['Authorization: Basic '.base64_encode($clientID.":".$clientSecret)];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $dataString);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    echo $response['access_token'];
}
function nextSong($access){
    echo "key is".$access;
    $urlApi = "https://api.spotify.com/v1/me/player/next";
    //$urlApi = "https://hookb.in/E7oB3Nl7BphegeaZ9QxJ";
    $header =  ["Authorization: Bearer ".$access,
                "Content-length: 0"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    //$response = json_decode($response, true);
    echo $response;
}

function previous($access){
    $urlApi = "https://api.spotify.com/v1/me/player/previous";
    //$urlApi = "https://hookb.in/E7oB3Nl7BphegeaZ9QxJ";
    $header =  ["Authorization: Bearer ".$access,
                "Content-length: 0"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
 
    echo $response;
}

function getCurrent($access){
    $urlApi = "https://api.spotify.com/v1/me/player/currently-playing";
    //$urlApi = "https://hookb.in/E7oB3Nl7BphegeaZ9QxJ";
    $header =  ["Authorization: Bearer ".$access,
                "Content-length: 0"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch,CURLOPT_GET, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    //$response = json_decode($response, true);
    echo $response;
}



?>