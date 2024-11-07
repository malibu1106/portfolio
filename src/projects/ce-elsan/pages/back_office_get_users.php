<?php

header('Content-Type: application/json'); // Déclarer le header JSON

// Inclure le fichier de connexion à la base de données
include '../php_sql/db_connect.php'; 
session_start(); // Démarrer la session pour accéder à l'utilisateur connecté

try {
    // Connexion à la base de données (assurez-vous que $db est bien initialisé)
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $role = isset($_GET['role']) ? $_GET['role'] : '';
    $current_user_id = $_SESSION['user_id']; // Récupérer l'utilisateur connecté

    // Requête SQL
    $sql = "SELECT first_name, last_name, email, role, user_id 
            FROM users 
            WHERE (first_name LIKE :search OR last_name LIKE :search OR email LIKE :search) 
            AND role != 'to_approve' 
            AND user_id != :current_user_id"; // Exclure l'utilisateur connecté

    // Filtrer par rôle si un rôle est sélectionné
    if ($role) {
        $sql .= " AND role = :role";
    }

    // Préparation de la requête
    $query = $db->prepare($sql);
    $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $query->bindValue(':current_user_id', $current_user_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur connecté

    if ($role) {
        $query->bindValue(':role', $role, PDO::PARAM_STR);
    }

    // Exécuter la requête
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les utilisateurs sous forme de JSON
    echo json_encode($users);

} catch (Exception $e) {
    // Si une erreur survient, retourner une réponse JSON contenant l'erreur
    echo json_encode(['error' => $e->getMessage()]);
}
