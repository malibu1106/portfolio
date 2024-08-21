<?php
if (isset($_POST) && !empty($_POST['mail']) && !empty($_POST['message'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $tel = isset($_POST['tel']) ? $_POST['tel'] : "";
    $object = isset($_POST['object']) ? $_POST['object'] : "";
    $message = $_POST['message'];
    $mail = $_POST['mail'];

    $content = "<strong>Nom :</strong> " . htmlspecialchars($name) . "<br>";
    $content .= "<strong>Prénom :</strong> " . htmlspecialchars($firstname) . "<br>";
    $content .= "<strong>Email :</strong> " . htmlspecialchars($mail) . "<br>";
    $content .= "<strong>Téléphone :</strong> " . htmlspecialchars($tel) . "<br>";
    $content .= "<strong>Objet :</strong> " . htmlspecialchars($object) . "<br>";
    $content .= "<strong>Message :</strong> " . nl2br(htmlspecialchars($message)) . "<br>";

    echo $content;
}
?>
<h1>Traitement mail à voir + retour et message de confirmation !</h1>