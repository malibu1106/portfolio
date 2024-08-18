<?php
// Vérifie si un fichier a été téléchargé



// Générer le nom de fichier PHP
$folder_promo_path = "promos/";
$file_promo_name = $folder_promo_path . $regionLien . $envieLien . "promo.php";

// Si le fichier existe déjà, ajout d'un numéro incrémental au nom de fichier
$counterpromo = 0;
while (file_exists($file_promo_name)) {
    $counterpromo++;
    $file_promo_name = $folder_promo_path . $regionLien . $envieLien . "promo" . $counterpromo . ".php";
}

// Générer le contenu HTML pour afficher la nouvelle promotion
$htmlPromo = '
<a href="index.php?region=' . $regionLien . '&envie=' . $envieLien . '&promo=true&counter=' . $counterpromo . '">
    <article class="promo">
        <figure>
            <img title="promo" src="' . $image_lieu_path . '" alt="promo">
            <figcaption>
                <div class="pourcent-promo">' . $reduc . '</div>
                <div class="titre-promo bold">' . ucfirst($region) . '</div>
                <div class="sous-titre-promo semibold">' . ucfirst($envie) . '</div>
                <div class="conteneur-duree-prix">
                    <div class="duree-promo"><img src="img/voyages/promos/hourglass.png">' . $nombreJours . ' jrs max</div>
                    <div class="prix-promo"><span class="red bold prix">' . $prixNuitPersonne . '€</span>/nuit</div>
                </div>
            </figcaption>
        </figure>
    </article>
</a>';

echo '<section class="section-promos">
<div class="conteneur-promo">';
echo $htmlPromo;
echo '</div>
</section>';

//Écriture du contenu HTML dans le fichier PHP
if (file_put_contents($file_promo_name, $htmlPromo)) {
    // Affichage d'un message de succès
    echo "<center>Le fichier $file_promo_name a été créé avec succès.</center>";
} else {
    echo "Erreur lors de la création du fichier PHP.";
}
