<?php
$url = "http://ip-api.com/json/";

function getLoc(){
    global $url;
    $address = $_SERVER['REMOTE_ADDR'];
    $local = curl_init();
    $finalURL = $url.$address;
    curl_setopt($local, CURLOPT_URL, $finalURL);
    //curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($local,CURLOPT_RETURNTRANSFER, true);
    //echo curl_exec($local);
    //echo $finalURL;
    $result = json_decode(curl_exec($local), true);
    curl_close($local);
    $respone = [
        "lat" => $result["lat"],
        "lon" => $result["lon"],
    ];
    echo json_encode($respone);
}

if ($_POST["task"] == "getIP"){
    echo $_SERVER['REMOTE_ADDR'];
}
if ($_POST["task"] == "getLocation"){
    
    getLoc();
}
if ($_POST["task"] == "getWeather"){
    $loc = json_decode(getLoc(), true);
    
}

?>