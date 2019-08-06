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
    echo curl_exec($local);
    //echo $finalURL;
    $result = json_decode(curl_exec($local), true);
    curl_close($local);
    $respone = [
        "lat" => $result["lat"],
        "lon" => $result["lon"],
    ];
    return json_encode($respone);
}

if ($_POST["task"] == "getIP"){
    echo $_SERVER['REMOTE_ADDR'];
}
if ($_POST["task"] == "getLocation"){
    
    echo getLoc();
}

if ($_POST["task"] == "getWeather"){
    $loc = json_decode(getLoc(), true);
    echo $loc["lat"]."\n";
    $appID = "8c63037e7c695e142fcf7638969a6d2e";
    $url = "api.openweathermap.org/data/2.5/weather";
    $query = [
        "lat" => $loc["lat"],
        "lon" => $lon["lon"],
        "appid" => $appID
    ];
    $finalURL = $url."?".http_build_query($query);
    echo $finalURL;
    $respone = file_get_contents($finalURL);
    echo $respone;
}

?>