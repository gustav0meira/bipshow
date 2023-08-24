<?php
// Dados do payload
$payload = json_encode([
    "listaCpf" => ["08139175579"]
]);

$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => $payload
    ]
];

$context = stream_context_create($options);
$response = file_get_contents("https://apigateway.conectagov.estaleiro.serpro.gov.br/api-cpf-light-trial/v2/consulta/cpf", false, $context);

if ($response !== false) {
    $data = json_decode($response, true);
    print_r($data);
} else {
    echo "Erro na consulta.";
}
?>
