<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();
    
}

include '../php_sql/db_connect.php'; // Inclure le fichier de connexion à la base de données

// Récupérer les informations de l'utilisateur connecté
$user_id = $_SESSION['user_id']; // Suppose que l'utilisateur est connecté et que l'ID est stocké dans la session
$query = "SELECT first_name, last_name, email FROM users WHERE user_id = :user_id";
$stmt = $db->prepare($query);
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch();

// Récupérer les suggestions de l'utilisateur
$sql = "
SELECT 
    s.company_name, 
    s.image_url, 
    s.date, 
    COALESCE(SUM(v.vote_value), 0) AS total_score
FROM suggestions s
LEFT JOIN votes v ON s.suggestion_id = v.suggestion_id
WHERE s.user_id = :user_id
GROUP BY s.suggestion_id, s.company_name, s.image_url, s.date
ORDER BY s.date DESC";

$query = $db->prepare($sql);
$query->execute([':user_id' => $_SESSION['user_id']]); // Utiliser l'user_id de la session
$suggestions = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <script src="js/script.js"></script>
  <!-- <script src="../js/login.js"></script> -->
  <title>Elsan</title>
</head>
<body class="pb-8">
<?php include '../includes/nav.php';?>

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Mon profil</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-4 max-w-xl text-gray-100 rounded">

<!-- Afficher le prénom et nom de l'utilisateur -->
<h2 class="text-3xl text-center mt-8"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
<h2 class="text-2xl text-center mt-8 mb-12"><?php echo htmlspecialchars($user['email'])?></h2>

<!-- Boutons pour changer l'email et le mot de passe -->
<button id="modify_mail_button" class="bg-gray-100 h-16 w-[80%] block mx-auto text-xl lg:text-2xl font-semibold text-blue-600">Modifier mon adresse mail</button>
<button id="cancel_mail_change" style="display: none;" class="bg-gray-100 h-16 w-[50%] block mx-auto text-3xl font-semibold text-red-700">Annuler</button>

<button id="modify_password_button" class="bg-gray-100 h-16 w-[80%] block mx-auto text-xl lg:text-2xl font-semibold text-blue-600 mt-8">Modifier mon mot de passe</button>
<button id="cancel_password_change" style="display: none;" class="bg-gray-100 h-16 w-[50%] block mx-auto text-3xl font-semibold text-red-700">Annuler</button>

<!-- Formulaire pour changer l'adresse mail -->
<form id="change_mail_form" class="flex flex-col p-4" action="../php_sql/edit_email.php" method="POST" style="display: none;">
    <input id="new_email" class="mb-6 h-16 text-2xl text-center text-blue-600" type="mail" placeholder="Nouvelle adresse mail" name="new_email" autocomplete="off" required>
    <div class="relative">
        <input id="password" class="mb-6 h-16 text-2xl text-center w-[100%] text-blue-600" type="password" placeholder="Mot de passe" name="password" required>
        <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('password', this)">
            <img class="show-hide-password w-8" src="../images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
        </span> 
    </div>
    <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
</form>


<!-- Formulaire pour changer le mot de passe -->
<form id="change_password_form" class="flex flex-col p-4" action="../php_sql/edit_password.php" method="POST" style="display: none;">
    <div class="relative mb-6">
        <input id="current_password" class="h-16 text-2xl text-center w-[100%] text-blue-600" type="password" placeholder="Mot de passe actuel" name="current_password" required>
        <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('current_password', this)">
            <img class="show-hide-password w-8" src="../images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
        </span> 
    </div>
    <div class="relative mb-6">
        <input id="new_password" class="h-16 text-2xl text-center w-[100%] text-blue-600" type="password" placeholder="Nouveau mot de passe" name="new_password" required>
        <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('new_password', this)">
            <img class="show-hide-password w-8" src="../images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
        </span> 
    </div>
    <div class="relative mb-6">
        <input id="confirm_new_password" class="h-16 text-2xl text-center w-[100%] text-blue-600" placeholder="Confirmer nouveau mot de passe" type="password" name="confirm_new_password" required>
        <span class="toggle-password absolute right-0 p-4" onclick="togglePassword('confirm_new_password', this)">
            <img class="show-hide-password w-8" src="../images/icons/show_password.png" alt="Afficher/Masquer mot de passe">
        </span> 
    </div>
    <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
</form>




<div id="user_suggestions">
<?php 
if($suggestions){
   
    echo'
<h2 class="text-2xl mt-8 p-4">Mes suggestions</h2>';
foreach ($suggestions as $suggestion){
    $date = new DateTime($suggestion['date']);
    $formattedDate = $date->format('d/m/y');
echo
'<article class="mt-4 w-full mx-auto pb-4">
<div class="suggestion_row_prez flex justify-between gap-1">
    <div class="w-1/5 flex items-center justify-center">
        <img src="' . $suggestion['image_url'] . '" alt="logo de l\'entreprise" class="bg-white p-1 h-[50px]">
    </div>
    <div class="company_name_and_votes flex gap-2 justify-between">

        <div class="flex flex-col text-center justify-center">
            <p class="">' . $suggestion['company_name'] . '</p>
            <p class="">' . $suggestion['total_score'] . '</p>                                               
        </div>

    </div>
    <div class="date_and_name px-2">
        <p class="pr-4">' . $formattedDate . '</p>                 
    </div>        
</div>
</article>';}

}
?>
</div>
  <script src="../js/profile.js"></script>
</section>
    
</main> 
</body>
</html>
