<?php
// update-cart.php

header('Content-Type: application/json');

$servername = "db";
$username = "infinitea";
$password = "infinitea_password";
$dbname = "infinitea";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Récupérer les données POST
$data = json_decode(file_get_contents('php://input'), true);

// Vérifier que les données ont été reçues
if (!$data || !isset($data['productId']) || !isset($data['quantity']) || !isset($data['weight'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit();
}

$productId = intval($data['productId']);
$quantity = intval($data['quantity']);
$weight = intval($data['weight']);

// Préparer la requête SQL
$sql = "UPDATE carts SET quantity = ?, weight = ? WHERE product_id = ?";
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a réussi
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit();
}

// Lier les paramètres et exécuter la requête
$stmt->bind_param("iii", $quantity, $weight, $productId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Execute failed: ' . $stmt->error]);
}

// Fermer la déclaration et la connexion
$stmt->close();
$conn->close();
?>
