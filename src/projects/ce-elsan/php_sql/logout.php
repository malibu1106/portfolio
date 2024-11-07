<?php
session_start();
session_destroy();
session_start();
$_SESSION['info_message'] = "Déconnecté</div>";
header('Location: ../index.php');
exit();
?>