<?php
$servername = "db";
$username = "infinitea";
$password = "infinitea_password";
$dbname = "infinitea";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    echo json_encode(['exists' => $count > 0]);
}

$conn->close();
?>