// enregistrer_connexion.php

<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si l'utilisateur est connecté
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $dateConnexion = date("Y-m-d H:i:s");

    // Insérer les informations de connexion dans le fichier
    $file = 'fichier_connexions.txt';
    $data = "$username - $dateConnexion\n";

    // Ouvrir le fichier en mode d'écriture et ajouter les données à la fin
    $handle = fopen($file, 'a');

    if ($handle) {
        fwrite($handle, $data);
        fclose($handle);
        echo "Connexion enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de la connexion.";
    }
} else {
    echo "Utilisateur non connecté.";
}
?>
