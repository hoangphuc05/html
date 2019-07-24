<?php
//echo "????";
// Replace <Subscription Key> with a valid subscription key.
$ocpApimSubscriptionKey = 'b1fac06b60764f09b5deba7177059f2a';

// You must use the same location in your REST call as you used to obtain
// your subscription keys. For example, if you obtained your subscription keys
// from westus, replace "westcentralus" in the URL below with "westus".
$uriBase = 'https://eastus.api.cognitive.microsoft.com/vision/v2.0/detect';
//$uriBase = 'https://hookb.in/7ZbB1y6MKwTnqnDElwVL';
$header = [
    // Request headers
    'Content-Type: application/octet-stream',
    'Ocp-Apim-Subscription-Key: '.$ocpApimSubscriptionKey
];

//$data =$_POST;

$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);

//$dataString = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uriBase);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode($response, true);
echo json_encode($response);

//echo var_dump($_POST);
?>