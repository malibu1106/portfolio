<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $region = $_POST["region"];
    $envie = $_POST["envie"];
    $nompara1 = $_POST["nompara1"];
    $para1 = $_POST["para1"];
    $lieuDuSejour = $_POST["lieuDuSejour"];
    $phraseLieuDuSejour = $_POST["phraseLieuDuSejour"];
    $avantagesVoyage1 = $_POST["avantages-voyage-1"];
    $avantagesVoyage2 = $_POST["avantages-voyage-2"];
    $avantagesVoyage3 = $_POST["avantages-voyage-3"];
    $nombreJours = $_POST["nombre-jours"];
    $nombrePersonnes = $_POST["nombre-personne-max"];
    $dateDispo = $_POST["disponible-partir-de"];
    $prixNuitPersonne = $_POST["prixNuitParPers"];

    // Récupère les données des paragraphes optionnels

    if (isset($_POST['nompara2']) && isset($_POST['para2'])) {
        $nompara2 = $_POST['nompara2'];
        $para2 = $_POST['para2'];
    } else {
        $nompara2 = "";
        $para2 = "";
    }
    if (isset($_POST['nompara3']) && isset($_POST['para3'])) {
        $nompara3 = $_POST['nompara3'];
        $para3 = $_POST['para3'];
    } else {
        $nompara3 = "";
        $para3 = "";
    }

    if (isset($_POST['para4']) && isset($_POST['para4'])) {
        $nompara4 = $_POST['nompara4'];
        $para4 = $_POST['para4'];
    } else {
        $nompara4 = "";
        $para4 = "";
    }

    // Récupère les données promo le cas échéant


    if (isset($_POST['imagePromo'])) {
        $imagePromo = $_POST['imagePromo'];
    } else {
        $imagePromo = "";
    }

    if (isset($_POST['reduc'])) {
        $reduc = $_POST['reduc'];
    } else {
        $reduc = "";
    }

    // Lien temp avant correction

    $regionLien = "temp";
    $envieLien = "temp";

    // Correction des nom de régions / envies 

    if ($region === "Auvergne-Rhône-Alpes") {
        $regionLien = "auvergne";
    } elseif ($region === "Bourgogne-Franche-Comté") {
        $regionLien = "bourgogne";
    } elseif ($region === "Bretagne") {
        $regionLien = "bretagne";
    } elseif ($region === "Centre-Val de Loire") {
        $regionLien = "centre";
    } elseif ($region === "Corse") {
        $regionLien = "corse";
    } elseif ($region === "Grand Est") {
        $regionLien = "grandest";
    } elseif ($region === "Hauts-de-France") {
        $regionLien = "hdf";
    } elseif ($region === "Île-de-France") {
        $regionLien = "idf";
    } elseif ($region === "Normandie") {
        $regionLien = "normandie";
    } elseif ($region === "Nouvelle-Aquitaine") {
        $regionLien = "aquitaine";
    } elseif ($region === "Occitanie") {
        $regionLien = "occitanie";
    } elseif ($region === "Pays de la Loire") {
        $regionLien = "loire";
    } elseif ($region === "Provence-Alpes-Côte d'Azur") {
        $regionLien = "paca";
    } else {
        // Gérer le cas où aucune option n'est sélectionnée ou la valeur sélectionnée n'est pas reconnue
        $regionLien = "valeur_par_defaut";
    }


    if ($envie === "Atteignez des sommets") {
        $envieLien = "sommets";
    } elseif ($envie === "Bien-être absolu") {
        $envieLien = "bienetre";
    } elseif ($envie === "Escale marine") {
        $envieLien = "marine";
    } elseif ($envie === "Escapade gourmande") {
        $envieLien = "gourmande";
    } elseif ($envie === "Harmonie naturelle") {
        $envieLien = "harmonie";
    } elseif ($envie === "Plages de rêve") {
        $envieLien = "plage";
    } elseif ($envie === "Sentiers intrépides") {
        $envieLien = "sentiers";
    } elseif ($envie === "Sport Extrême") {
        $envieLien = "sport";
    } elseif ($envie === "Vibrations culturelles") {
        $envieLien = "culture";
    } elseif ($envie === "Voyages Écoresponsables") {
        $envieLien = "eco";
    } else {
        // Gérer le cas où aucune option n'est sélectionnée ou la valeur sélectionnée n'est pas reconnue
        $envieLien = "valeur_par_defaut";
    }







    // NEED GERER LES IMAGES AVANT :)



    // PROMO OU VOYAGE



    if (isset($_POST['promoCheckbox'])) {

        include 'ajoutervoyage.php';

        include 'ajouterpromo.php';

        echo 'promo + voyage';
    } else {
        include 'ajoutervoyage.php';
    }
}
