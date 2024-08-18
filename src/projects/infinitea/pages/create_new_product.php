<?php
// ON DEMARRE DIRECTEMENT UNE SESSION POUR GERER LES MESSAGES A AFFICHER EN CAS DE PROBLEME
session_start();

//ON VERIFIE POST + QUE LES CHAMPS NE SONT PAS VIDES ET ON RECUPERE LES VALEURS DU FORMULAIRE
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])
&& !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['description_courte'])
&& !empty($_POST['composition']) && !empty($_FILES['image_filename'])
){
    // FORMULAIRE BIEN REMPLI DONC ON GERE LES DONNEES OBLIGATOIRES
    $name = strip_tags($_POST['name']);
    $category = strip_tags($_POST['category']);
    $description = strip_tags($_POST['description']);
    $description_courte = strip_tags($_POST['description_courte']);
    $composition = strip_tags($_POST['composition']);
    
    // FORMULAIRE BIEN REMPLI DONC ON GERE LES DONNEES OPTIONNELLES
    // ON INITIALISE DES VARIABLES VIDES
    $price_kg = "";
    $price = "0";
    $weight = "";
    $temperature = "";
    $temps = "";
    $highlight = "0";

    // ET SI ELLES SONT DEFINIES DANS LE FORMULAIRE ALORS ON RECUPERE LEURS VALEURS
    if($_POST['price_kg']){
        $price_kg = strip_tags($_POST['price_kg']);}
    if($_POST['temperature']){
        $temperature = strip_tags($_POST['temperature']);}
    if($_POST['temps']){
        $temps = strip_tags($_POST['temps']);}
    if($_POST['highlight']){
        $highlight = strip_tags($_POST['highlight']);}
    if($_POST['price']){
        $price = strip_tags($_POST['price']);}
    if($_POST['weight']){
        $weight = strip_tags($_POST['weight']);}




    // FORMULAIRE BIEN REMPLI DONC ON GERE L'ID DE L'ADMIN CONNECTÉ
    $added_by = $_SESSION['user_id'];
    // ON GERE L'IMAGE 
    function generateRandomString($length = 20) { // ON GENERE UNE SUITE RANDOM DE 20 CARACTERES
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // CARACTERES UTILISES
        $charactersLength = strlen($characters); // LA LONGUEUR DE LA CHAINE DES CARACTERES AUTORISES
        $randomString = ''; // ON ITINIALISE LA VARIABLE
        for ($i = 0; $i < $length; $i++) { // LA BOUCLE SUR UNE LONGUEUR = $length
            $randomString .= $characters[rand(0, $charactersLength - 1)]; // A CHAQUE TOUR DE BOUCLE ON AJOUTE UN CARACTERE RANDOM à $randomString
        }
        return $randomString;
    }
    
    if(isset($_FILES['image_filename'])){
        $uploadDir = '../images/produits/'; // DOSSIER OU L'ON STOCKERA NOS IMAGES
        $imageFileType = strtolower(pathinfo($_FILES['image_filename']['name'], PATHINFO_EXTENSION)); // EXTENSION DU FICHIER UPLOADE
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif'); // EXTENSIONS AUTORISEES
    
        // Check if the file is an allowed image type
        if(in_array($imageFileType, $allowedTypes)){ // SI L'EXTENSION DU FICHIER UPLOADE EST AUTORISEE
            $newFileName = generateRandomString(20) . '.' . $imageFileType; // ON RENOMME L'IMAGE AVEC LA FONCTION POUR CA
            $image_filename = $uploadDir . $newFileName;}} // ON INCLUE LE CHEMIN DES DOSSIERS OU SERA STOCKEE L'IMAGE
            move_uploaded_file($_FILES['image_filename']['tmp_name'], $image_filename); // ON PUSH L'IMAGE DANS LE DOSSIER

     // CONNEXION A LA BDD
     require_once("../elements/open_bdd.php");

     // REQUETE
     $sql = "INSERT INTO products (name, category, description, description_courte, composition, weight, image_filename, price, price_kg, temperature, temps, highlight, added_by)
    VALUES (:name, :category, :description, :description_courte, :composition, :weight, :image_filename, :price, :price_kg, :temperature, :temps, :highlight, :added_by)";
 
     // PREPARATION DE LA REQUETE
     $query = $db->prepare($sql);    
         $query->bindValue(':name', $name);
         $query->bindValue(':category', $category);
         $query->bindValue(':description', $description);
         $query->bindValue(':description_courte', $description_courte);
         $query->bindValue(':composition', $composition);
         $query->bindValue(':price', $price);
         $query->bindValue(':weight', $weight);
         $query->bindValue(':image_filename', $image_filename);
         $query->bindValue(':price_kg', $price_kg);
         $query->bindValue(':temperature', $temperature);
         $query->bindValue(':temps', $temps);
         $query->bindValue(':highlight', $highlight);
         $query->bindValue(':added_by', $added_by);
     
     // EXECUTION + CLOSE BDD
     $query->execute();

     $_SESSION["message"] = "<div id='alert_message'>Produit ajouté !</div>";
    require_once("../elements/close_bdd.php");
    header('Location: ../index.php?page=product_list#main');
    }


else{
    $_SESSION["message"] = "<div id='alert_message'>Erreur de traitement !</div>";
    header('Location: ../index.php?page=control_panel');
}



?>