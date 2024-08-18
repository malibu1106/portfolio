<?php
echo '<div class="type-voyage">

<a href="index.php?envie=eco">
    <h3 class="titre-type-voyages">Voyage Écoresponsable</h3>
</a>
';
// Chercher tous les fichiers qui contiennent le mot "plage" dans leur nom
foreach (glob("pages/*eco*.php") as $filename) {
    // Charger le contenu de chaque fichier
    $contenuPageVoyage = file_get_contents($filename);
    // echo $filename;
    // Expression régulière pour correspondre au contenu entre les balises h2, h4 et img
    $regex = '/<h2 class="titre-voyage">(.*?)<\/h2>.*?<h4>(.*?)<\/h4>.*?<img.*?src="(.*?)".*?>/s';
    if (preg_match($regex, $contenuPageVoyage, $matches)) {
        // $matches[1] contient le contenu entre les balises h2
        // $matches[2] contient le contenu entre les balises h4
        // $matches[3] contient l'URL de l'image

        if ($matches[1] === "Auvergne-Rhône-Alpes") {
            $region = "auvergne";
        } elseif ($matches[1] === "Bourgogne-Franche-Comté") {
            $region = "bourgogne";
        } elseif ($matches[1] === "Bretagne") {
            $region = "bretagne";
        } elseif ($matches[1] === "Centre-Val de Loire") {
            $region = "centre";
        } elseif ($matches[1] === "Corse") {
            $region = "corse";
        } elseif ($matches[1] === "Grand Est") {
            $region = "grandest";
        } elseif ($matches[1] === "Hauts-de-France") {
            $region = "hdf";
        } elseif ($matches[1] === "Île-de-France") {
            $region = "idf";
        } elseif ($matches[1] === "Normandie") {
            $region = "normandie";
        } elseif ($matches[1] === "Nouvelle-Aquitaine") {
            $region = "aquitaine";
        } elseif ($matches[1] === "Occitanie") {
            $region = "occitanie";
        } elseif ($matches[1] === "Pays de la Loire") {
            $region = "loire";
        } elseif ($matches[1] === "Provence-Alpes-Côte d'Azur") {
            $region = "paca";
        }
        $htmlVoyage = '<a href="index.php?region=' . $region . '&envie=eco">
        <div class="voyage"><img src="' . $matches[3] . '">
            <div class="conteneur-titre-voyage">
                <h4>' . $matches[1] . '</h4>
                <h5>' . $matches[2] . '</h5>
            </div>
        </div>
    </a>';
        echo $htmlVoyage;
        // echo "Contenu entre balises h2 : " . $matches[1] . "<br>";
        // echo "Contenu entre balises h4 : " . $matches[2] . "<br>";
        // echo "URL de l'image : " . $matches[3] . "<br>";
    } else {
        echo "";
    }
}
echo '</div>';
