<?php
session_start();
require_once('../php_sql/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $date = $_POST['date'];
    $start_hour = $_POST['start_hour'];
    $start_minute = $_POST['start_minute'];
    $end_hour = $_POST['end_hour'];
    $end_minute = $_POST['end_minute'];
    $representative = $_POST['representative'];
    $permanence_id = $_POST['permanence_id'] ?? null;

    // Formatter l'heure
    $time = $start_hour . 'h' . $start_minute . '/' . $end_hour . 'h' . $end_minute;

    // Convertir la date au format JJ/MM/AA
    $date = date('d/m/y', strtotime($date));

    try {
        if ($permanence_id) {
            // Mise à jour de la permanence
            $sql = "
                UPDATE permanences 
                SET date = :date, time = :time, representative = :representative 
                WHERE permanence_id = :permanence_id
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':permanence_id', $permanence_id, PDO::PARAM_INT);
        } else {
            // Insertion d'une nouvelle permanence
            $sql = "
                INSERT INTO permanences (date, time, representative) 
                VALUES (:date, :time, :representative)
            ";
            $query = $db->prepare($sql);
        }

        // Lier les valeurs
        $query->bindValue(':date', $date); // La date formatée est maintenant utilisée
        $query->bindValue(':time', $time);
        $query->bindValue(':representative', $representative);
        $query->execute();

        // Rediriger vers la page de confirmation ou d'accueil
        $_SESSION['info_message'] = "Permanence enregistrée avec succès.";
        header("Location: ../pages/back_office_permanences.php");
        exit();
    } catch (Exception $e) {
        // Gérer les erreurs
        $_SESSION['info_message'] = "Erreur lors de l'enregistrement de la permanence : " . $e->getMessage();
        header("Location: ../pages/back_office_permanences.php");
        exit();
    }
} else {
    // Rediriger si la requête n'est pas POST
    $_SESSION['info_message'] = "Erreur lors du traitement de la requête";
    header("Location: ../pages/back_office_permanences.php");
    exit();
}
?>
