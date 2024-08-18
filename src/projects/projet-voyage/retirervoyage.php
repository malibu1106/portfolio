<?php
if (isset($_GET['action']) && $_GET['action'] === 'retirervoyage') {
    if (isset($_POST['delete'])) {
        $filename_to_delete = $_POST['filename'];
        if (file_exists($filename_to_delete)) {
            unlink($filename_to_delete);
            echo "Le fichier $filename_to_delete a été supprimé avec succès.";
        } else {
            echo "Le fichier $filename_to_delete n'existe pas.";
        }
    }
}
