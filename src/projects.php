<?php

    $project = $_GET['project'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/nav.js" defer></script>
    <link rel="stylesheet" href="css/projects.css">
    <title><?=ucfirst($project)?></title>
</head>
<body>


<a href="index.php#<?=$project?>"><div class="return_to_portfolio"></div></a>
<iframe id="<?=$project?>" src="projects/<?=$project?>/"></iframe>


</body>
</html>