<?php
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true); // Decodifica il JSON ricevuto

$filePath = 'path/to/your/file.json'; // Percorso al file JSON

// Controlla se il file esiste e legge i dati esistenti
if (file_exists($filePath)) {
    $currentData = json_decode(file_get_contents($filePath), true);
} else {
    $currentData = [];
}

// Aggiunge o aggiorna il link nel file
$currentData['link'] = $data['link'];

// Scrive i dati aggiornati nel file
if (file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT))) {
    echo json_encode(['message' => 'File aggiornato con successo']);
} else {
    echo json_encode(['message' => 'Errore durante l\'aggiornamento del file']);
}
