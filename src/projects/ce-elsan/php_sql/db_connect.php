<?php
const DBHOST = "db_elsan";
const DBNAME = "elsan";
const DBUSER = "elsan_admin";
const DBPASS = "elsan_password";

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le mode exceptions
} catch (PDOException $error) {
    // Ne pas afficher directement les erreurs pour éviter les sorties HTML
    error_log("Erreur de connexion à la base de données : " . $error->getMessage()); // Enregistrer l'erreur dans les logs
    // Optionnel : Si tu veux arrêter le script en cas d'erreur
    $db = null; // Annuler la connexion si elle échoue
}
?>
