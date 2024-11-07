<?php
session_start();
require_once('../php_sql/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $text = $_POST['text'];
    $actualite_id = $_POST['actualite_id'] ?? null;

    try {
        if ($actualite_id) {
            // Mise à jour de la actualite
            $sql = "
                UPDATE news 
                SET title = :title, text = :text
                WHERE news_id = :actualite_id
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':actualite_id', $actualite_id, PDO::PARAM_INT);
        } else {
            // Insertion d'une nouvelle actualite
            $sql = "
                INSERT INTO news (title, text) 
                VALUES (:title, :text)
            ";
            $query = $db->prepare($sql);
        }

        // Lier les valeurs
        $query->bindValue(':text', $text);
        $query->bindValue(':title', $title);
        $query->execute();

        // Rediriger vers la page de confirmation ou d'accueil
        $_SESSION['info_message'] = "Actualite enregistrée avec succès.";
        header("Location: ../pages/back_office_news.php");
        exit();
    } catch (Exception $e) {
        // Gérer les erreurs
        $_SESSION['info_message'] = "Erreur lors de l'enregistrement de l'actualite : " . $e->getMessage();
        header("Location: ../pages/back_office_news.php");
        exit();
    }
} else {
    // Rediriger si la requête n'est pas POST
    $_SESSION['info_message'] = "Erreur lors du traitement de la requête";
    header("Location: ../pages/back_office_news.php");
    exit();
}
?>
