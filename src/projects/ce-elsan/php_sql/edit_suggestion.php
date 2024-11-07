<?php
session_start();
require_once('../php_sql/db_connect.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php");
    exit();
}

// Vérifier si l'utilisateur a le rôle d'administrateur
if ($_SESSION['role'] !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $suggestion_id = $_POST['suggestion_id'];
    $company_name = $_POST['company_name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $category = $_POST['category_id']; // Récupérer la catégorie choisie

    // Initialiser la variable pour l'URL de l'image
    $image_url = null;

    // Gérer l'upload de l'image
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $upload_dir = '../images/uploads/';
        $file_tmp = $_FILES['image_url']['tmp_name'];
        $file_extension = strtolower(pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Vérifier l'extension de fichier
        if (!in_array($file_extension, $valid_extensions)) {
            die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
        }

        $unique_file_name = uniqid('img_', true) . '.' . $file_extension;
        $target_file = $upload_dir . $unique_file_name;

        // Récupérer l'ancienne image
        $sql = "SELECT image_url FROM suggestions WHERE suggestion_id = :suggestion_id";
        $query = $db->prepare($sql);
        $query->bindValue(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
        $query->execute();
        $old_image = $query->fetchColumn();

        // Supprimer l'ancienne image si elle existe
        if ($old_image && file_exists($old_image)) {
            unlink($old_image); // Supprime l'ancienne image
        }

        // Déplacer le fichier uploadé vers le répertoire cible
        if (!move_uploaded_file($file_tmp, $target_file)) {
            die("Erreur lors du téléchargement de l'image.");
        }

        $image_url = $target_file; // Mettre à jour l'URL de l'image
    }

    try {
        // Mise à jour de la suggestion
        $sql = "
            UPDATE suggestions 
            SET company_name = :company_name, description = :description, address = :address, category = :category" .
            ($image_url ? ", image_url = :image_url" : "") . " 
            WHERE suggestion_id = :suggestion_id
        ";
        $query = $db->prepare($sql);
        $query->bindValue(':suggestion_id', $suggestion_id, PDO::PARAM_INT);
        $query->bindValue(':company_name', $company_name);
        $query->bindValue(':description', $description);
        $query->bindValue(':address', $address);
        $query->bindValue(':category', $category); // Lier la catégorie

        if ($image_url) {
            $query->bindValue(':image_url', $image_url);
        }

        $query->execute();

        $_SESSION['info_message'] = "Suggestion mise à jour avec succès.";
        header("Location: ../pages/back_office_suggestions.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['info_message'] = "Erreur lors de la mise à jour de la suggestion : " . $e->getMessage();
        header("Location: ../pages/back_office_suggestions.php");
        exit();
    }
} else {
    $_SESSION['info_message'] = "Erreur lors du traitement de la requête";
    header("Location: ../pages/back_office_suggestions.php");
    exit();
}
?>
