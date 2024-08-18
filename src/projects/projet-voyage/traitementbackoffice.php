<?php
if (isset($_GET['action']) && $_GET['action'] === 'retirerpromo') {
    include 'retirerpromo.php';
} elseif (isset($_GET['action']) && $_GET['action'] === 'retirervoyage') {
    include 'retirervoyage.php';
} elseif (isset($_GET['action']) && $_GET['action'] === 'ajoutervoyage') {
    include 'traitementajout.php';
} else {
    echo 'Erreur de traitement';
}
