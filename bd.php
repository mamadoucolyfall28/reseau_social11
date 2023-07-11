<?php

$host = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$database = "reseau_social"; // Nom de la base de données

// Établir la connexion
$conn = mysqli_connect($host, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}


?>
