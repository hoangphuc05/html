<html>
<head>
    <title>Analyze Image Sample</title>
</head>
<body>
<?php
//echo "????";
// Replace <Subscription Key> with a valid subscription key.
$ocpApimSubscriptionKey = 'b1fac06b60764f09b5deba7177059f2a';

// You must use the same location in your REST call as you used to obtain
// your subscription keys. For example, if you obtained your subscription keys
// from westus, replace "westcentralus" in the URL below with "westus".
$uriBase = 'https://eastus.api.cognitive.microsoft.com/vision/v2.0/detect';
//$uriBase = 'https://hookb.in/3OmEwP3prGCKeKj2M3z6';
$imageUrl = 'https://goberoi.github.io/cloudy_vision/input_images/subway.jpg';

$header = [
    // Request headers
    'Content-Type: application/json',
    'Ocp-Apim-Subscription-Key: '.$ocpApimSubscriptionKey
];
$data = [
    'url' => $imageUrl
];

$dataString = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uriBase);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $dataString);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response, true);
echo var_dump($response);
?>
</body>
</html>