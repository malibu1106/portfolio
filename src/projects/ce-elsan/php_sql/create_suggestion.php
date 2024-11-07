<?php
session_start();
require_once 'db_connect.php'; // Inclusion du fichier de connexion à la base de données

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $company_name = $_POST['company_name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id']; // Récupérer l'user_id de la session
    $category = $_POST['category']; // Récupérer la catégorie

    // Gérer l'upload de l'image
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $upload_dir = '../images/uploads/'; // Répertoire où les fichiers seront stockés
        $file_tmp = $_FILES['image_url']['tmp_name'];

        // Obtenir l'extension du fichier uploadé
        $file_extension = strtolower(pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION));
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Vérifier que l'extension du fichier est valide
        if (!in_array($file_extension, $valid_extensions)) {
            die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
        }

        // Générer un nom de fichier unique avec uniqid() et l'extension d'origine
        $unique_file_name = uniqid('img_', true) . '.' . $file_extension;
        $target_file = $upload_dir . $unique_file_name;

        // Déplacer le fichier uploadé vers le répertoire cible
        if (!move_uploaded_file($file_tmp, $target_file)) {
            die("Erreur lors du téléchargement de l'image.");
        }
    } else {
        die("Veuillez télécharger une image valide.");
    }

    // Insertion des données dans la base de données
    $sql = "INSERT INTO suggestions (company_name, description, image_url, address, user_id, category) 
            VALUES (:company_name, :description, :image_url, :address, :user_id, :category)";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':company_name' => $company_name,
        ':description' => $description,
        ':image_url' => $target_file, // Chemin de l'image sur le serveur
        ':address' => $address,
        ':user_id' => $user_id,
        ':category' => $category // Insérer la catégorie
    ]);

    // Redirection après succès
    $_SESSION['info_message'] = "Suggestion ajoutée avec succès";
    header("Location: ../pages/suggestions.php?");
    exit();
} else {
    die("Méthode de requête non autorisée.");
}
?>
