<?php
// Replace <Subscription Key> with a valid subscription key.
$predictionkey = '7e65d5c235fc4383892d4b65091953e5';

// You must use the same location in your REST call as you used to obtain
// your subscription keys. For example, if you obtained your subscription keys
// from westus, replace "westcentralus" in the URL below with "westus".
$uriBase = 'https://impacthackathon.cognitiveservices.azure.com/customvision/v3.0/Prediction/ba3e7edf-5e41-4c40-a0db-d82e34efe1fa/classify/iterations/Car%20Accident%20-%20Iteration%208/image';

$imageUrl = 'predictions/prediction.jpg';

require_once 'HTTP/Request2.php';

$request = new Http_Request2($uriBase);
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Prediction-Key' => $predictionkey,
    'Content-Type' => 'application/octet-stream'

);
$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'visualFeatures' => 'Categories,Description',
    'details' => '',
    'language' => 'en'
);
$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

$file = fopen($imageUrl, "rb");
$contents = fread($file, filesize($imageUrl));
fclose($file);

// Request body parameters
$body = $contents;

// Request body
$request->setBody($body);

try
{
    $response = $request->send();
    echo json_encode(json_decode($response->getBody()), JSON_PRETTY_PRINT);
}
catch (HttpException $ex)
{
    echo "<pre>" . $ex . "</pre>";
}
?>
