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
    $appID = "8c63037e7c695e142fcf7638969a6d2e";
    $url = "https://api.openweathermap.org/data/2.5/weather";
    $query = [
        "lat" => $loc["lat"],
        "lon" => $loc["lon"],
        "appid" => $appID
    ];
    $finalURL = $url."?".http_build_query($query);
    $response = file_get_contents($finalURL);
    echo $response;
}

if ($_POST["task"] == "getNews"){
    $newsURL = "https://newsapi.org/v2/top-headlines";
    $apiKey = "ad839156b20e4117ac95d2307988b619";
    if (!$_POST["sources"]){
        http_response_code(400);
    } else {
        $query = [
            "sources" => $_POST["sources"],
            "apiKey" => $apiKey
        ];
        $finalURL = $newsURL."?".http_build_query($query);
        $response = file_get_contents($finalURL);
        echo $response;
    }
}

if ($_POST["task"] == "getNewsList"){
    $listURL = "https://newsapi.org/v2/sources?language=en&apiKey=ad839156b20e4117ac95d2307988b619";
    echo file_get_contents($listURL);
}

?>