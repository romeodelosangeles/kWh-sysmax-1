<?php
require 'TuyaCloud.php';

$options = [
  'baseUrl' => 'https://openapi-ueaz.tuyaus.com', // URL API of Tuya
  'accessKey' => 'vmjspjt3hks4aagqratn', // access key 
  'secretKey' => '0a678287cdf64fb8a4a99a520be9c30d', // access secret 
];

$tuya = new TuyaCloud($options);
try {
    $response = $tuya->getDevice('65e6a732254c5669aceikp');
    $kWh = $response['result'][0];
    $status = $response['result'][10];
    $tempCurrent = $response['result'][11];
    // echo (json_encode($tempCurrent, JSON_PRETTY_PRINT));
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
