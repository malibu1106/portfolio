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

$permanence_to_edit = null; // Initialiser la variable

if (isset($_GET['permanence_id'])) {
    require_once('../php_sql/db_connect.php');
    // Récupération de la permanence à éditer
    $sql = "
    SELECT *
    FROM permanences
    WHERE permanence_id = :permanence_id
    ";
    $query = $db->prepare($sql);
    $query->bindValue(':permanence_id', $_GET['permanence_id'], PDO::PARAM_INT);
    $query->execute();
    $permanence_to_edit = $query->fetch(PDO::FETCH_ASSOC); // Récupérer une seule ligne
}

$date = '';
$start_hour = '';
$start_minute = '';
$end_hour = '';
$end_minute = '';

if ($permanence_to_edit) {
    // Formatage de la date
    $date = date('Y-m-d', strtotime(str_replace('/', '-', $permanence_to_edit['date']))); // Changer le format de date

    // Formatage de l'heure
    list($start_time, $end_time) = explode('/', $permanence_to_edit['time']);
    list($start_hour, $start_minute) = explode(':', str_replace('h', ':', $start_time));
    list($end_hour, $end_minute) = explode(':', str_replace('h', ':', $end_time));
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
    
    <h1 class="text-blue-600 font-bold text-4xl text-center m-8">Gérer les permanences</h1>
    <main class="p-1 flex flex-col gap-8 lg:flex-row lg:p-4 max-w-screen-2xl mx-auto">

        <section class="w-[96%] bg-blue-600 mx-auto p-1 max-w-xl text-gray-100 pb-4 rounded">
            <h2 class="text-gray-100 font-bold text-3xl text-center m-4">
                <?php echo $permanence_to_edit ? 'Éditer permanence' : 'Nouvelle permanence'; ?>
            </h2>
            <form class="flex flex-col p-4" action="../php_sql/add_or_edit_permanence.php" method="POST">
            <input type="hidden" name="permanence_id" value="<?php echo $permanence_to_edit['permanence_id'] ?? ''; ?>">
                <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="date" placeholder="Date" name="date" value="<?php echo htmlspecialchars($date); ?>" required min="<?php echo date('Y-m-d'); ?>">
                
                <div class="flex items-center justify-center mb-6 text-3xl">
                    <select class="h-16 text-3xl text-center text-blue-600 mr-2" name="start_hour" required>
                        <?php for ($h = 7; $h <= 18; $h++): ?>
                            <option value="<?php echo str_pad($h, 2, '0', STR_PAD_LEFT); ?>" <?php if ($start_hour == str_pad($h, 2, '0', STR_PAD_LEFT)) echo 'selected'; ?>>
                                <?php echo str_pad($h, 2, '0', STR_PAD_LEFT); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                    <span class="text-3xl">H&nbsp;</span>

                    <select class="h-16 text-3xl text-center text-blue-600 mr-2" name="start_minute" required>
                        <option value="00" <?php if ($start_minute == '00') echo 'selected'; ?>>00</option>
                        <option value="15" <?php if ($start_minute == '15') echo 'selected'; ?>>15</option>
                        <option value="30" <?php if ($start_minute == '30') echo 'selected'; ?>>30</option>
                        <option value="45" <?php if ($start_minute == '45') echo 'selected'; ?>>45</option>
                    </select>
                </div>

                <div class="flex items-center justify-center mb-6 text-3xl">
                    <select class="h-16 text-3xl text-center text-blue-600 mr-2" name="end_hour" required>
                        <?php for ($h = 7; $h <= 18; $h++): ?>
                            <option value="<?php echo str_pad($h, 2, '0', STR_PAD_LEFT); ?>" <?php if ($end_hour == str_pad($h, 2, '0', STR_PAD_LEFT)) echo 'selected'; ?>>
                                <?php echo str_pad($h, 2, '0', STR_PAD_LEFT); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                    <span class="text-3xl">H&nbsp;</span>

                    <select class="h-16 text-3xl text-center text-blue-600 mr-2" name="end_minute" required>
                        <option value="00" <?php if ($end_minute == '00') echo 'selected'; ?>>00</option>
                        <option value="15" <?php if ($end_minute == '15') echo 'selected'; ?>>15</option>
                        <option value="30" <?php if ($end_minute == '30') echo 'selected'; ?>>30</option>
                        <option value="45" <?php if ($end_minute == '45') echo 'selected'; ?>>45</option>
                    </select>
                </div>

                <input class="mb-6 h-16 text-3xl text-center text-blue-600" type="text" placeholder="Représentant" name="representative" value="<?php echo htmlspecialchars($permanence_to_edit['representative'] ?? ''); ?>" required>
                
                <input class="bg-gray-100 h-16 w-[50%] mx-auto text-3xl font-semibold text-green-700" type="submit" value="Valider">
            </form>
        </section>
    </main>    

</body>
</html>
