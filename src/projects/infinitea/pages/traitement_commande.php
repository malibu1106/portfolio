<?php
// Récupération des données depuis $_POST
$data = $_POST;
$id = $_POST['user_id'];


// Assurez-vous que les données ont été correctement envoyées et qu'elles contiennent ce dont vous avez besoin
if (!isset($data) || empty($data)) {
    echo "Aucune donnée reçue.";
    exit;
}

$productInfo = ''; // Initialisation de la variable pour éviter les problèmes de portée

// Boucle pour traiter chaque produit
foreach ($data as $key => $value) {
    // Vérifiez si la clé commence par 'product_name'
    if (strpos($key, 'product_name') === 0) {
        // Extraction de l'indice numérique à partir de la clé
        $index = substr($key, 12);

        // Récupération des autres valeurs associées à ce produit
        $productName = $data['product_name' . $index];
        $productId = $data['product_id' . $index];
        $quantity = $data['quantity' . $index];
        $weight = isset($data['weight' . $index]) ? $data['weight' . $index] : null;

        // Ajout des informations du produit dans la variable $productInfo
        $productInfo .= '<div class="product">';
        $productInfo .= '<p>Product ID: ' . htmlspecialchars($productId, ENT_QUOTES, 'UTF-8') . '</p>';
        $productInfo .= '<p>Product Name: ' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '</p>';
        if ($weight !== null) {
            $productInfo .= '<p>Weight: ' . htmlspecialchars($weight, ENT_QUOTES, 'UTF-8') . ' g</p>';
        }
        $productInfo .= '<p>Quantity: ' . htmlspecialchars($quantity, ENT_QUOTES, 'UTF-8') . '</p>';
        $productInfo .= '</div>';
        $productInfo .= '<br>';
    }
}

require_once ('../elements/open_bdd.php');

try {
    // Sélection des informations de l'utilisateur
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id);
    $query->execute();
    $userInfos = $query->fetch(PDO::FETCH_ASSOC);

    if (!$userInfos) {
        throw new Exception('Utilisateur non trouvé.');
    }

    // Insertion de la commande
    $sql = "INSERT INTO orders (first_name, last_name, email, content, price, user_id)
            VALUES (:first_name, :last_name, :email, :content, :price, :user_id)";
    $query = $db->prepare($sql);
    $query->bindValue(':first_name', $userInfos['first_name']);
    $query->bindValue(':last_name', $userInfos['last_name']);
    $query->bindValue(':email', $userInfos['email']);
    $query->bindValue(':content', $productInfo);
    $query->bindValue(':price', $data['price']);
    $query->bindValue(':user_id', $id);
    $query->execute();

    require_once("../elements/close_bdd.php");

    // Redirection
    header('Location: ../index.php?page=paiement#main');
    exit;

} catch (Exception $e) {
    // Gestion des erreurs
    echo 'Erreur : ' . $e->getMessage();
    require_once("../elements/close_bdd.php");
    exit;
}
?>
