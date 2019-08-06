<?php
$url = "http://ip-api.com/json/";
echo $_POST["task"]."\n";
if ($_POST["task"] == "getIP"){
    echo $_SERVER['REMOTE_ADDR'];
}
if ($_POST["task"] == "getLocation"){
    
    $address = $_SERVER['REMOTE_ADDR'];
    
    $local = curl_init();
    
    $finalURL = $url.$address;
    echo $finalURL;
    curl_setopt($local, CURLOPT_URL, $finalURL);
    //curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($local,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($local);
    echo $result;
    //echo "hi";
}

?>