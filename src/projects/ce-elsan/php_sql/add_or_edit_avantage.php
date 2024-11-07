<?php
session_start();
require_once('../php_sql/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $company_name = $_POST['company_name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];
    $avantage_id = $_POST['avantage_id'] ?? null;
    $category = $_POST['category_id']; // Récupérer la catégorie choisie

    // Initialiser la variable pour l'URL de l'image
    $image_url = null;

    // Gérer l'upload de l'image
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

        // Si une image existe déjà pour cet avantage, la supprimer
        if ($avantage_id) {
            $sql = "SELECT image_url FROM benefits WHERE benefit_id = :avantage_id";
            $query = $db->prepare($sql);
            $query->bindValue(':avantage_id', $avantage_id, PDO::PARAM_INT);
            $query->execute();
            $old_image = $query->fetchColumn();

            if ($old_image && file_exists($old_image)) {
                unlink($old_image); // Supprime l'ancienne image
            }
        }

        // Déplacer le fichier uploadé vers le répertoire cible
        if (!move_uploaded_file($file_tmp, $target_file)) {
            die("Erreur lors du téléchargement de l'image.");
        }

        $image_url = $upload_dir . $unique_file_name;
    }

    try {
        if ($avantage_id) {
            // Mise à jour de l'avantage
            $sql = "
                UPDATE benefits 
                SET company_name = :company_name, description = :description, address = :address, category = :category" .
                ($image_url ? ", image_url = :image_url" : "") . " 
                WHERE benefit_id = :avantage_id
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':avantage_id', $avantage_id, PDO::PARAM_INT);
            $query->bindValue(':company_name', $company_name);
            $query->bindValue(':description', $description);
            $query->bindValue(':address', $address);
            $query->bindValue(':category', $category); // Lier la catégorie

            if ($image_url) {
                $query->bindValue(':image_url', $image_url);
            }
        } else {
            // Insertion d'un nouvel avantage
            $sql = "
                INSERT INTO benefits (company_name, description, address, image_url, category) 
                VALUES (:company_name, :description, :address, :image_url, :category)
            ";
            $query = $db->prepare($sql);
            $query->bindValue(':company_name', $company_name);
            $query->bindValue(':description', $description);
            $query->bindValue(':address', $address);
            $query->bindValue(':image_url', $image_url);
            $query->bindValue(':category', $category); // Lier la catégorie
        }

        $query->execute();
        $_SESSION['info_message'] = "Avantage enregistré avec succès.";
        header("Location: ../pages/back_office_benefits.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['info_message'] = "Erreur lors de l'enregistrement de l'avantage : " . $e->getMessage();
        header("Location: ../pages/back_office_benefits.php");
        exit();
    }
} else {
    $_SESSION['info_message'] = "Erreur lors du traitement de la requête";
    header("Location: ../pages/back_office_benefits.php");
    exit();
}
?>
