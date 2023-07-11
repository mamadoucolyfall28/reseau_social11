

<?php
// Inclure le fichier de connexion à la base de données
include 'bd.php';

// Vérifier si l'utilisateur est connecté
session_start();

if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupérer les informations du formulaire de publication
$texte = $_POST['texte'];
$auteur = $_SESSION['username'];

// Gérer l'upload de médias s'il y en a
$medias = '';
if (!empty($_FILES['medias']['tmp_name'])) {
    $file = $_FILES['medias'];
    $targetDir = '\xampp\htdocs\reseau_social\image\Ousmane-Sonko.jpg'; // Chemin vers le dossier où vous souhaitez enregistrer les médias

    // Générer un nom de fichier unique
    $filename = uniqid() . '_' . $file['name'];

    // Déplacer le fichier téléchargé vers le dossier de destination
    move_uploaded_file($file['tmp_name'], $targetDir . $filename);

    $medias = $targetDir . $filename;
}

// Insérer la nouvelle publication dans la base de données
$sql = "INSERT INTO Publications (auteur, texte, medias) VALUES ('$auteur', '$texte', '$medias')";

if (mysqli_query($conn, $sql)) {
    echo "Publication ajoutée avec succès.";
} else {
    echo "Erreur lors de l'ajout de la publication : " ;
}


?>
