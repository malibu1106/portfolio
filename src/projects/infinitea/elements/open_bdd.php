<?php
const DBHOST = "db";
const DBNAME = "infinitea";
const DBUSER = "infinitea";
const DBPASS = "infinitea_password";

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    // echo "Connexion BDD réussie";
} catch (PDOException $error) {
    echo "Problème de connexion : ";
    echo $error->getMessage();
}
?>
