<?php

$urlTop = "https://newsapi.org/v2/top-headlines";
$apiKey = "ad839156b20e4117ac95d2307988b619";

$query = array(
    'apiKey' => $apiKey,
    'sources' => "google-news",
);

$final = $urlTop."?".http_build_query($query);
$response = file_get_contents($final);
echo "hi\n";
echo $final."\n";
echo $response;

?>