<?php
require 'TuyaCloud.php';

$options = [
  'baseUrl' => 'https://openapi-ueaz.tuyaus.com', // URL API of Tuya
  'accessKey' => 'vmjspjt3hks4aagqratn', // access key 
  'secretKey' => '0a678287cdf64fb8a4a99a520be9c30d', // access secret 
];

$tuya = new TuyaCloud($options);
try {

  /*$response = $tuya->getDevice('6520fc0a00a365c22als9f');
  echo '<pre>';
    print_r($response);
  echo '</pre>';
  

$commands = [
  "commands" => [
    [
      "code" => "switch",
      "value" => true // cambia a false para apagar
    ]
  ]
];

$response = $tuya->setDevice('6520fc0a00a365c22als9f', $commands);

echo '<pre>';
print_r($response);
echo '</pre>';
*/
  $response = $tuya->getDevice('6520fc0a00a365c22als9f');
    $kWh = $response['result'][0];
    $status = $response['result'][10];
    $tempCurrent = $response['result'][13];
/*foreach ($response['result'] as $dp) {
  if ($dp['code'] === 'total_forward_energy') {
    echo "Energía total consumida: {$dp['value']} kWh\n";
  }
}*/


} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
