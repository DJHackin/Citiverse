<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$prompt = $data["prompt"] ?? "";
if (!$prompt) {
    echo json_encode(["response" => "Aucun message reçu."]);
    exit;
};

$apiKey = getenv("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");

$payload = [
  "model" => "gpt-3.5-turbo",
  "messages" => [
    ["role" => "system", "content" => "Tu es un guide touristique, parlant plusieurs langues, spécialisé dans l'histoire et les monuments du monde. Réponds de façon immersive et engageante."],
    ["role" => "user", "content" => $prompt]
  ],
  "temperature" => 1
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
  ],
  CURLOPT_POSTFIELDS => json_encode($payload)
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
echo json_encode(["response" => $result['choices'][0]['message']['content'] ?? "Erreur de réponse"]);
