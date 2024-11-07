<?php 
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php?");
    exit();}
if (($_SESSION['role']) !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php?");
    exit();}

include '../php_sql/db_connect.php'; // Inclure le fichier de connexion à la base de données

// Récupérer les utilisateurs en attente d'approbation
$sql = "SELECT first_name, last_name, user_id FROM users where role = 'to_approve'";
$query = $db->prepare($sql);
$query->execute();
$users_to_approve = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Elsan</title>
</head>
<body class="pb-8">
<?php include '../includes/nav.php';?>

<h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les utilisateurs</h1>
<main class="p-1 flex flex-col gap-4 flex-wrap max-w-screen-2xl mx-auto">

<section class="w-[96%] bg-blue-600 mx-auto p-4 max-w-xl text-gray-100 rounded">
    <?php
    if ($users_to_approve){
        echo'
    <h2 class="m-4 mb-6 text-3xl text-center font-bold">Inscriptions en attente</h2>';
    foreach ($users_to_approve as $user_to_approve){
        echo '<div class="container flex justify-between items-center max-w-[420px] mx-auto">';
        echo '<a href="../php_sql/change_user_status.php?role=blocked&user_id='.$user_to_approve['user_id'].'">';
        echo '<img src="../images/icons/delete_white.png" alt"Refuser l\'inscription" class="h-12">';
        echo '</a>';
        echo '<p class="text-xl">'. $user_to_approve['first_name'] .' '. $user_to_approve['last_name'] . '</p>';
        echo '<a href="../php_sql/change_user_status.php?role=user&user_id='.$user_to_approve['user_id'].'">';
        echo '<img src="../images/icons/checked.png" alt"Accepter l\'inscription" class="h-12">';
        echo '</a>';
        echo '</div>';
    }


}
    ?>
</section><section class="w-[96%] bg-blue-600 mx-auto p-4 max-w-xl text-gray-100 rounded">
    
    <h2 class="m-4 mb-8 text-3xl text-center font-bold">Tous les utilisateurs</h2>

    <div class="p-4">
  <!-- Barre de recherche -->
  <input type="text" id="searchInput" class="border p-2 rounded w-full mb-4 text-blue-600" placeholder="Rechercher par nom, prénom ou email...">

  <!-- Sélecteur de rôle -->
  <select id="roleSelect" class="border p-2 rounded w-full mb-4  text-blue-600">
    <option value="">Tous les rôles</option>
    <option value="admin">Administrateurs</option>
    <option value="user">Utilisateurs</option>
    <option value="blocked">Bloqués</option>
  </select>

  <!-- Liste des utilisateurs -->
  <div id="userList" class="space-y-2">
    <!-- Les utilisateurs seront listés ici -->
  </div>
</div>

<script>
// Fonction pour récupérer et afficher les utilisateurs
function fetchUsers() {
  const searchInput = document.getElementById('searchInput').value;
  const roleSelect = document.getElementById('roleSelect').value;

  // Appel AJAX pour récupérer les utilisateurs
  fetch(`back_office_get_users.php?search=${searchInput}&role=${roleSelect}`)
    .then(response => response.json())
    .then(users => {
      // Sélectionner l'élément où lister les utilisateurs
      const userList = document.getElementById('userList');
      userList.innerHTML = ''; // Vider la liste d'utilisateurs précédente

      // Afficher les utilisateurs dans le DOM
      users.forEach(user => {
        const userDiv = document.createElement('div');
        userDiv.className = 'p-2 flex flex-col mt-4';

        // Construire le HTML pour chaque utilisateur
        let userHTML = `
        <div class="container flex justify-between">
            <p class="text-xl font-bold">${user.first_name} ${user.last_name}</p>`;

        // Afficher le rôle uniquement si le filtre est sur "Tous les rôles"
        if (roleSelect === "") {
          userHTML += `<p><em>(${user.role})</em></p>`;
        }

        userHTML += `</div>
        <div class="relative h-8 flex items-center">
            <p class="mx-12">${user.email}</p>
            <span class="absolute right-0 edit_user_btn"><img src="../images/icons/edit.png" alt="Éditer l'utilisateur" class="h-8 w-8"></span>
            <span class="absolute right-0 edit_user_close text-2xl hover:text-4xl">X</span>
        </div>`;

        if (user.role === "user") {
          userHTML += `
            <div class="edit_user_zone flex justify-around mt-4">
              <div class="flex flex-col items-center">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=admin">
                <img src="../images/icons/promote_admin.png" class="h-12 w-12" alt="Promouvoir administrateur">
              </a>
                <p class="">Passer admin</p>
              
              </div>
              <div class="flex flex-col items-center">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=blocked">
                <img src="../images/icons/block.png" class="h-12 w-12" alt="Bloquer l'utilisateur">
              </a>
                <p class="">Bloquer</p>
              </div>
              <div class="flex flex-col items-center delete_user">
              
                <img src="../images/icons/delete_white.png" class="h-12 w-12" alt="Supprimer l'utilisateur">
              
                <p class="">Supprimer</p>
              </div>
              <div class="flex flex-col items-center confirm_delete_user">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=deleted">
                <img src="../images/icons/cancel.png" class="h-12 w-12" alt="Confirmer suppresion de l'utilisateur">
              </a>
                <p class="text-red-400 font-bold">Confirmer</p>
              </div>
              
            </div>
            <p class="cancel_user_delete text-center mt-4 font-bold text-red-400">Annuler la suppression</p>`;
        }

        if (user.role === "admin") {
          userHTML += `
            <div class="edit_user_zone flex justify-around mt-4">
              <div class="flex flex-col items-center">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=user">
                <img src="../images/icons/down_user.png" class="h-12 w-12" alt="Passer en utilisateur">
              </a>
                <p class="">Passer user</p>
              </div>
              <div class="flex flex-col items-center">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=blocked">
                <img src="../images/icons/block.png" class="h-12 w-12" alt="Bloquer l'utilisateur">
              </a>
                <p class="">Bloquer</p>
              </div>
              <div class="flex flex-col items-center delete_user">
              
                <img src="../images/icons/delete_white.png" class="h-12 w-12" alt="Supprimer l'utilisateur">
              
                <p class="">Supprimer</p>
              </div>
              <div class="flex flex-col items-center confirm_delete_user">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=deleted">
                <img src="../images/icons/cancel.png" class="h-12 w-12" alt="Confirmer suppresion de l'utilisateur">
              </a>
                <p class="text-red-400 font-bold">Confirmer</p>
              </div>
              
            </div>
            <p class="cancel_user_delete text-center mt-4 font-bold text-red-400">Annuler la suppression</p>`;
        }

        if (user.role === "blocked") {
          userHTML += `
            <div class="edit_user_zone flex justify-around mt-4">
              <div class="flex flex-col items-center">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=user">
                <img src="../images/icons/checked.png" class="h-12 w-12" alt="Débloquer">
              </a>
                <p class="">Débloquer</p>
              </div>
              <div class="flex flex-col items-center delete_user">
              
                <img src="../images/icons/delete_white.png" class="h-12 w-12" alt="Supprimer l'utilisateur">
              
                <p class="">Supprimer</p>
              </div>
              <div class="flex flex-col items-center confirm_delete_user">
              <a href="../php_sql/change_user_status.php?user_id=${user.user_id}&role=deleted">
                <img src="../images/icons/cancel.png" class="h-12 w-12" alt="Confirmer suppresion de l'utilisateur">
              </a>
                <p class="text-red-400 font-bold">Confirmer</p>
              </div>
              
            </div>
            <p class="cancel_user_delete text-center mt-4 font-bold text-red-400">Annuler la suppression</p>`;
        }

        userDiv.innerHTML = userHTML;
        userList.appendChild(userDiv);
      });

      // Ajout des événements après que les utilisateurs soient ajoutés au DOM
      addEventListeners();
    })
    .catch(error => console.error('Erreur:', error));
}

// Fonction pour ajouter les gestionnaires d'événements
function addEventListeners() {
  document.querySelectorAll('.edit_user_btn').forEach((editBtn, index) => {
    const editZone = document.querySelectorAll('.edit_user_zone')[index]; // Récupère la zone d'édition correspondante
    const closeBtn = document.querySelectorAll('.edit_user_close')[index]; // Récupère le bouton de fermeture correspondant

    // Au clic sur le bouton d'édition
    editBtn.addEventListener('click', () => {
      editZone.style.display = 'flex'; // Affiche la zone d'édition
      editBtn.style.display = 'none';  // Masque le bouton d'édition
      closeBtn.style.display = 'block'; // Affiche le bouton de fermeture
    });

    // Au clic sur le bouton de fermeture
    closeBtn.addEventListener('click', () => {
      editZone.style.display = 'none'; // Masque la zone d'édition
      editBtn.style.display = 'block'; // Réaffiche le bouton d'édition
      closeBtn.style.display = 'none';  // Masque le bouton de fermeture
    });

    // Masque initialement les zones d'édition et les boutons de fermeture
    editZone.style.display = 'none';
    closeBtn.style.display = 'none';
  });

  // Gestion des événements pour supprimer un utilisateur
  document.querySelectorAll('.delete_user').forEach((deleteBtn, index) => {
    const confirmDelete = document.querySelectorAll('.confirm_delete_user')[index]; // Récupère la zone de confirmation
    const cancelDelete = document.querySelectorAll('.cancel_user_delete')[index]; // Récupère le bouton d'annulation

    // Au clic sur le bouton de suppression
    deleteBtn.addEventListener('click', () => {
      deleteBtn.style.display = 'none';  // Masque le bouton de suppression
      confirmDelete.style.display = 'flex'; // Affiche la confirmation de suppression
      cancelDelete.style.display = 'block'; // Affiche le bouton d'annulation
    });

    // Au clic sur le bouton d'annulation
    cancelDelete.addEventListener('click', () => {
      deleteBtn.style.display = 'flex';  // Réaffiche le bouton de suppression
      confirmDelete.style.display = 'none'; // Masque la confirmation de suppression
      cancelDelete.style.display = 'none'; // Masque le bouton d'annulation
    });

  });
}

// Ajout des événements pour la recherche en direct et la sélection du rôle
document.getElementById('searchInput').addEventListener('input', fetchUsers);
document.getElementById('roleSelect').addEventListener('change', fetchUsers);

// Appel initial pour afficher tous les utilisateurs
fetchUsers();

</script>

</section>
    
</main> 
</body>
</html>
