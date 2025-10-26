<?php
// update.php - Ponte tra Render e Google Apps Script
// Autore: ChatGPT x Domenico Bonura

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Metodo non consentito"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['codice']) || !isset($data['nuovaQuantita'])) {
    echo json_encode(["status" => "error", "message" => "Dati mancanti"]);
    exit;
}

$codice = $data['codice'];
$nuovaQuantita = $data['nuovaQuantita'];
$origin = $_SERVER['HTTP_ORIGIN'] ?? 'magazzino-bridge.onrender.com';

// Link Google Apps Script
$google_script_url = "https://script.google.com/macros/s/AKfycbydkAb5oBGLPXZYC9JZr5r3seN2tnlemosZKzT8jTr0nS-Z0g0RWCudFVLYnFjMdLAa/exec";

// Prepara la richiesta POST verso Google
$post_fields = json_encode([
    "codice" => $codice,
    "nuovaQuantita" => $nuovaQuantita,
    "origin" => $origin
]);

$ch = curl_init($google_script_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo json_encode(["status" => "error", "message" => "Errore cURL: " . $error]);
} else {
    echo json_encode(["status" => "success", "message" => trim($response)]);
}
?>
