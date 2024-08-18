<?php
// Chemin vers le fichier JavaScript


$cheminFichierJS = "script.js";

// Charger le contenu du fichier JavaScript dans une variable
$contenuJS = file_get_contents($cheminFichierJS);

// Nouveau voyage à ajouter
$nouveauVoyage = array(
    "region" => $regionLien,
    "envies" => array($envieLien) // Exemple d'envies pour le nouveau voyage
);

// Convertir le tableau PHP en une chaîne JSON
$nouveauVoyageJSON = json_encode($nouveauVoyage);

// Échapper les caractères spéciaux pour l'utilisation dans une chaîne JavaScript
$nouveauVoyageJSON = addslashes($nouveauVoyageJSON);

// Créer une chaîne JavaScript avec les valeurs
$scriptJS = "let nouveauVoyage = JSON.parse('" . $nouveauVoyageJSON . "');";

// Nouvelles envies à ajouter
$nouvellesEnvies = $nouveauVoyage['envies'];

// Vérifiez si des envies existent déjà pour cette région
if (preg_match("/enviesDisponiblesParRegion\['" . $nouveauVoyage['region'] . "'\]\s*=\s*\[(.*?)\];/s", $contenuJS, $matches)) {
    // Si la région est trouvée, récupérez les envies existantes
    $enviesExistantes = json_decode("[" . $matches[1] . "]", true);

    // Filtrez les nouvelles envies pour ne garder que celles qui ne sont pas déjà présentes
    $nouvellesEnvies = array_diff($nouvellesEnvies, $enviesExistantes);
}

// Vérifiez si des nouvelles envies doivent être ajoutées
if (!empty($nouvellesEnvies)) {
    // Nouvelle ligne à ajouter à la fin du fichier JavaScript
    $nouvelleLigneJS = "enviesDisponiblesParRegion['" . $nouveauVoyage['region'] . "'] = enviesDisponiblesParRegion['" . $nouveauVoyage['region'] . "'].concat(" . json_encode($nouvellesEnvies) . ");";

    // Ajoutez la nouvelle ligne à la fin du contenu du fichier JavaScript
    $contenuJS .= "\n" . $nouvelleLigneJS;

    // Enregistrez le contenu modifié dans le fichier JavaScript
    file_put_contents($cheminFichierJS, $contenuJS);
}
