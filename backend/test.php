<?php

// CONFIGURACIÓN
$ACCESS_ID = 'vmjspjt3hks4aagqratn';
$SECRET_KEY = '0a678287cdf64fb8a4a99a520be9c30d';
$BASE_URL = 'https://openapi-ueaz.tuyaus.com'; // Reemplaza si usas otro entorno
$SCHEMA = 'tuya'; // Reemplaza con el schema exacto de tu app

// OBTENER ACCESS TOKEN
function getAccessToken($ACCESS_ID, $SECRET_KEY, $BASE_URL) {
    $timestamp = round(microtime(true) * 1000);
    $path = '/v1.0/token?grant_type=1';
    $stringToSign = $ACCESS_ID . $timestamp;

    $sign = strtoupper(hash_hmac('sha256', $stringToSign, $SECRET_KEY));

    $headers = [
        'client_id: ' . $ACCESS_ID,
        'sign: ' . $sign,
        't: ' . $timestamp,
        'sign_method: HMAC-SHA256'
    ];

    $ch = curl_init($BASE_URL . $path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['result']['access_token'])) {
        return $data['result']['access_token'];
    }

    die("❌ Error al obtener token: " . json_encode($data, JSON_PRETTY_PRINT));
}

// FIRMAR Y HACER PETICIÓN
function getDevices($ACCESS_ID, $SECRET_KEY, $BASE_URL, $accessToken, $SCHEMA) {
    $timestamp = round(microtime(true) * 1000);
    $path = '/v1.0/devices';
    $queryParams = [
        'schema' => $SCHEMA,
        'page_no' => 1,
        'page_size' => 20
    ];
    $queryString = http_build_query($queryParams);
    $fullPath = $path . '?' . $queryString;

    $body = '';
    $contentHash = hash('sha256', $body);

    $stringToSign = "GET\n$contentHash\n\n$path";
    $signStr = $ACCESS_ID . $accessToken . $timestamp . $stringToSign;
    $sign = strtoupper(hash_hmac('sha256', $signStr, $SECRET_KEY));

    $headers = [
        'client_id: ' . $ACCESS_ID,
        'sign: ' . $sign,
        't: ' . $timestamp,
        'sign_method: HMAC-SHA256',
        'access_token: ' . $accessToken,
        'Content-Type: application/json'
    ];

    $ch = curl_init($BASE_URL . $fullPath);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// EJECUCIÓN
$token = getAccessToken($ACCESS_ID, $SECRET_KEY, $BASE_URL);
$result = getDevices($ACCESS_ID, $SECRET_KEY, $BASE_URL, $token, $SCHEMA);

echo json_encode($result, JSON_PRETTY_PRINT);
