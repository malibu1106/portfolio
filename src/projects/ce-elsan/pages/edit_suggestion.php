<?php 
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['info_message'] = "Vous devez être connecté pour accéder à cette page";
    header("Location: ../index.php");
    exit();
}

if ($_SESSION['role'] !== "admin") {
    $_SESSION['info_message'] = "Vous n'avez pas l'autorisation pour accéder à cette page";
    header("Location: ../pages/home.php");
    exit();
}

require_once('../php_sql/db_connect.php');
$categories = []; // Initialiser un tableau pour stocker les catégories

// Récupérer la liste des catégories
$sql = "SELECT * FROM categories";
$query = $db->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les catégories

if (isset($_GET['suggestion_id'])) {
    // Récupération de l'suggestion à éditer
    $sql = "
    SELECT * 
    FROM suggestions 
    WHERE suggestion_id = :suggestion_id
    ";
    $query = $db->prepare($sql);
    $query->bindValue(':suggestion_id', $_GET['suggestion_id'], PDO::PARAM_INT);
    $query->execute();
    $suggestion_to_edit = $query->fetch(PDO::FETCH_ASSOC); // Récupérer une seule ligne
    $image_url = $suggestion_to_edit['image_url'] ?? ''; // Récupérer l'URL de l'image existante
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <script src="../js/login.js"></script>
    <title>Elsan</title>
</head>
<body class="pb-8">

    <?php include '../includes/nav.php'; ?>
    
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les suggestions</h1>
    <main class="p-1 flex flex-col gap-8 lg:flex-row lg:p-4 max-w-screen-2xl mx-auto">

        <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4">
            <h2 class="text-gray-100 font-bold text-3xl text-center m-4">
                Éditer suggestion
            </h2>
            <form class="flex flex-col p-4" action="../php_sql/edit_suggestion.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="suggestion_id" value="<?php echo $suggestion_to_edit['suggestion_id']; ?>">

                <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" placeholder="Nom de l'entreprise" name="company_name" value="<?php echo htmlspecialchars($suggestion_to_edit['company_name']); ?>" required>
                <textarea class="mb-6 h-48 text-3xl p-4 resize-none text-blue-600" id="description" name="description" placeholder="Description" required><?php echo htmlspecialchars($suggestion_to_edit['description']); ?></textarea>

<!-- Champ de sélection de la catégorie -->
<select name="category_id" class="mb-6 h-16 text-3xl text-blue-600" required>
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo htmlspecialchars($category['name']); ?>"
            <?php echo ($suggestion_to_edit && $suggestion_to_edit['category'] === $category['name']) ? 'selected' : ''; ?>>
            <?php echo ucfirst(htmlspecialchars($category['name'])); ?>
        </option>
    <?php endforeach; ?>
</select>


                <div class="container flex flex-col gap-4 justify-center items-center">
                    <img class="max-w-64 max-h-32 bg-white p-1" id="imgPreview" src="<?php echo htmlspecialchars($image_url); ?>" alt="Aperçu de l'image">
                    <div class="mb-6 h-16 flex items-center justify-center">
                        <label class="bg-gray-100 text-blue-600 text-3xl p-4 cursor-pointer max-w-[250px] text-center truncate" for="image_url" <?php echo $suggestion_to_edit ? '' : 'required'; ?>>
                            <?php echo $suggestion_to_edit ? 'Changer l\'image' : 'Choisir l\'image'; ?>
                        </label>
                        <input type="file" id="image_url" name="image_url" accept="image/*" class="hidden">
                    </div>
                </div>

                <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" id="address" name="address" placeholder="Adresse" value="<?php echo htmlspecialchars($suggestion_to_edit['address']); ?>" required>
                
                <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
            </form>
        </section>
    </main>    

    <script>
    const imageUrlInput = document.getElementById('image_url');
    const imgPreview = document.getElementById('imgPreview');
    const label = document.querySelector('label[for="image_url"]');
    const originalImageUrl = imgPreview.src;

    imageUrlInput.addEventListener('change', function() {
        const file = this.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                label.textContent = file.name;
            };
            reader.readAsDataURL(file);
        } else {
            imgPreview.src = originalImageUrl;
            label.textContent = 'Changer l\'image';
        }
    });
    </script>
</body>
</html>
