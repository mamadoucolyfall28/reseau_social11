

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

// Récupérer l'ID de la publication à commenter
$publicationId = $_POST['publication_id'];
$auteur = $_SESSION['username'];
$contenu = $_POST['contenu'];

// Insérer le commentaire dans la base de données
$sql = "INSERT INTO Commentaires (publication_id, auteur, contenu) VALUES ('$publication_Id', '$auteur', '$contenu')";

if (mysqli_query($conn, $sql)) {
    echo "Commentaire ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout du commentaire : " . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
