<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] = "<div id='alert_message'>Vous vous êtes bien déconnecté</div>";
header('Location: ../index.php');
exit();
?>