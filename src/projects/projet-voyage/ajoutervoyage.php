<?php
// Vérifie si un fichier a été téléchargé
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    // Emplacement de sauvegarde de l'image
    $image_dir = "img/voyages/";
    $original_file_name = $_FILES["image"]["name"];
    $sanitized_file_name = str_replace(' ', '_', $original_file_name); // Remplacer les espaces par des underscores
    $image_path = $image_dir . $sanitized_file_name;

    if (isset($_FILES["imageLieuVoyage"]) && $_FILES["imageLieuVoyage"]["error"] == UPLOAD_ERR_OK) {
        // Emplacement de sauvegarde de l'image
        $image_lieu_dir = "img/voyages/promos/";
        $original_lieu_file_name = $_FILES["imageLieuVoyage"]["name"];
        $sanitized_lieu_file_name = str_replace(' ', '_', $original_lieu_file_name); // Remplacer les espaces par des underscores
        $image_lieu_path = $image_lieu_dir . $sanitized_lieu_file_name;
    }




    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path) && move_uploaded_file($_FILES["imageLieuVoyage"]["tmp_name"], $image_lieu_path)) {
        // Générer le nom de fichier PHP
        $folder_path = "pages/";
        $file_name = $folder_path . $regionLien . $envieLien . ".php";

        // Si le fichier existe déjà, ajout d'un numéro incrémental au nom de fichier
        $counter = 0;
        while (file_exists($file_name)) {
            $counter++;
            $file_name = $folder_path . $regionLien . $envieLien . $counter . ".php";
        }

        $nomSansExtension1 = pathinfo(basename($avantagesVoyage1), PATHINFO_FILENAME);
        $nomSansExtension2 = pathinfo(basename($avantagesVoyage2), PATHINFO_FILENAME);
        $nomSansExtension3 = pathinfo(basename($avantagesVoyage3), PATHINFO_FILENAME);

        // Générer le contenu HTML
        $html = '<section class="detail-voyage">
    <div class="conteneur-detail-voyage">
        <h2 class="titre-voyage">' . ucfirst($region) . '</h2>
        <h3 class="sous-titre-voyage">' . ucfirst($envie) . '</h3>
        <div class="conteneur-detail-voyage-prez">
            <div class="conteneur-detail-voyage-prez-img"><img src=' . $image_path . '>
            </div>
            <div class="conteneur-detail-voyage-prez-infos">
            <h5 class="detail-voyage-lieu">' . $nompara1 . '</h5>
            <p class="detail-voyage-lieu-texte">' . $para1 . '</p>';

        if (isset($nompara2) && isset($para2)) {
            $html .= '
            <h5 class="detail-voyage-lieu">' . $nompara2 . '</h5>
            <p class="detail-voyage-lieu-texte">' . $para2 . '</p>';
        }
        if (isset($nompara3) && isset($para3)) {
            $html .= '
            <h5 class="detail-voyage-lieu">' . $nompara3 . '</h5>
            <p class="detail-voyage-lieu-texte">' . $para3 . '</p>';
        }
        if (isset($nompara4) && isset($para4)) {
            $html .= '
            <h5 class="detail-voyage-lieu">' . $nompara4 . '</h5>
            <p class="detail-voyage-lieu-texte">' . $para4 . '</p>';
        }

        $html .= '                
            </div>
        </div>
        <div class="conteneur-detail-voyage-texte">
            <h4>' . $lieuDuSejour . '</h4>
            <p class="phrase-voyage">
            ' . $phraseLieuDuSejour . '</p>
        </div>
        <div class="conteneur-detail-voyage-reservation">

            <div class="conteneur-detail-voyage-reservation-image"><img src="' . $image_lieu_path . '"></div>
            <div class="conteneur-detail-voyage-avantages-infos">
                <div class="conteneur-detail-voyage-avantages">
                    <div class="detail-voyage-avantage"><img src="' . $avantagesVoyage1 . '">
                        <div class="voyage-titre-avantage">' . $nomSansExtension1 . '</div>
                    </div>
                    <div class="detail-voyage-avantage"><img src="' . $avantagesVoyage2 . '">
                        <div class="voyage-titre-avantage">' . $nomSansExtension2 . '</div>
                    </div>
                    <div class="detail-voyage-avantage"><img src="' . $avantagesVoyage3 . '">
                        <div class="voyage-titre-avantage">' . $nomSansExtension3 . '</div>
                    </div>
                </div>
                <div class="conteneur-detail-voyage-reservation-infos">
                    <select name="durée-sejour" class="durée-sejour" required>';

        for ($i = 1; $i <= $nombreJours; $i++) {
            $html .= '<option value="' . $i . '">' . $i . ' jour' . ($i > 1 ? 's' : '') . '</option>';
        }

        $html .= '</select>
                    <select name="nb-personnes" class="nb-personnes" required>';
        for ($i = 1; $i <= $nombrePersonnes; $i++) {
            $html .= '<option value="' . $i . '">' . $i . ' personne' . ($i > 1 ? 's' : '') . '</option>';
        }
        $html .= '

                        
                    </select><br>
                    <label for="startdate">Jour d\'arrivée:</label>
                    <input type="date" id="startdate" name="startdate" value="' . $dateDispo . '" min="' . $dateDispo . '" max="2024-12-31" /><br>

                    <span class="prix-reservation-voyage">' . $prixNuitPersonne . '</span><br>
                    <button>Reservez</button>
                </div>
            </div>
        </div>




    </div>
</section>';



        echo $html;
        //Écriture du contenu HTML dans le fichier PHP
        if (file_put_contents($file_name, $html)) {
            // Affichage d'un message de succès
            echo "<center>Le fichier $file_name a été créé avec succès.</center>";
        } else {
            echo "Erreur lors de la création du fichier PHP.";
        }
    } else {
        echo "Erreur lors de l'envoi de l'image.";
    }
} else {
    echo "Veuillez sélectionner une image.";
}

include 'addobjectinsearch.php';
