

<?php
// Inclure le fichier de connexion à la base de données
include 'mon_compte.php';

// Vérifier si l'utilisateur est connecté
session_start();

if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupérer l'ID de la publication à aimer
$publicationId = $_POST['publication_id'];
$auteur = $_SESSION['username'];

// Vérifier si l'utilisateur a déjà aimé cette publication
$sql = "SELECT * FROM Likes WHERE publication_id = '$publicationId' AND auteur = '$auteur'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Vous avez déjà aimé cette publication.";
} else {
    // Insérer le like dans la base de données
    $sql = "INSERT INTO Likes (publication_id, auteur) VALUES ('$publicationId', '$auteur')";

    if (mysqli_query($conn, $sql)) {
        echo "Publication aimée avec succès.";
    } else {
        echo "Erreur lors de l'ajout du like : " . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
