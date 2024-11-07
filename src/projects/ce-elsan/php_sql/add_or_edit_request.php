<?php
session_start();
require_once('../php_sql/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $company_name = $_POST['company_name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $category = $_POST['category_id'];
    $status = $_POST['status']; // Récupérer le statut
    $request_id = $_POST['request_id'] ?? null;

    // Initialiser la variable pour l'URL de l'image
    $image_url = null;

    // Si on est en mode édition, récupérer l'image actuelle
    if ($request_id) {
        $sql = "SELECT image_url FROM requests WHERE current_request_id = :request_id";
        $query = $db->prepare($sql);
        $query->bindValue(':request_id', $request_id, PDO::PARAM_INT);
        $query->execute();
        $image_url = $query->fetchColumn(); // Garder l'URL de l'image existante
    }

    // Gérer l'upload de l'image seulement si une nouvelle image est envoyée
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $upload_dir = '../images/uploads/';
        $file_tmp = $_FILES['image_url']['tmp_name'];
        $file_extension = strtolower(pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($file_extension, $valid_extensions)) {
            die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
        }

        $unique_file_name = uniqid('img_', true) . '.' . $file_extension;
        $target_file = $upload_dir . $unique_file_name;

        // Si une image existe déjà pour cette demande, la supprimer
        if ($image_url && file_exists($image_url)) {
            unlink($image_url); // Supprime l'ancienne image
        }

        // Déplacer le fichier uploadé vers le répertoire cible
        if (!move_uploaded_file($file_tmp, $target_file)) {
            die("Erreur lors du téléchargement de l'image.");
        }

        // Mettre à jour l'image URL seulement si une nouvelle image est uploadée
        $image_url = $target_file;
    }

    try {
        if ($request_id) {
            // Mise à jour de la demande (éviter la duplication)
            $sql = "
                UPDATE requests 
                SET company_name = :company_name, description = :description, address = :address, category = :category, status = :status" . 
                ($image_url ? ", image_url = :image_url" : "") . " 
                WHERE current_request_id = :request_id
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':request_id', $request_id, PDO::PARAM_INT);
            $query->bindValue(':company_name', $company_name);
            $query->bindValue(':description', $description);
            $query->bindValue(':address', $address);
            $query->bindValue(':category', $category);
            $query->bindValue(':status', $status);

            // Ajouter la nouvelle image si elle a été téléchargée
            if ($image_url) {
                $query->bindValue(':image_url', $image_url);
            }
        } else {
            // Insertion d'une nouvelle demande (si aucune request_id n'est fournie)
            $sql = "
                INSERT INTO requests (company_name, description, address, image_url, category, status) 
                VALUES (:company_name, :description, :address, :image_url, :category, :status)
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':company_name', $company_name);
            $query->bindValue(':description', $description);
            $query->bindValue(':address', $address);
            $query->bindValue(':image_url', $image_url ?: null); // S'assurer que `null` est bien géré
            $query->bindValue(':category', $category);
            $query->bindValue(':status', $status);
        }

        $query->execute();
        $_SESSION['info_message'] = "Demande enregistrée avec succès.";
        header("Location: ../pages/back_office_current_requests.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['info_message'] = "Erreur lors de l'enregistrement de la demande : " . $e->getMessage();
        header("Location: ../pages/back_office_current_requests.php");
        exit();
    }
} else {
    $_SESSION['info_message'] = "Erreur lors du traitement de la requête";
    header("Location: ../pages/back_office_current_requests.php");
    exit();
}
