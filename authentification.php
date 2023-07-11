
<?php
// Inclure le fichier de connexion à la base de données
include 'bd.php';

// Récupérer les informations du formulaire de connexion
$username = $_POST['username'];
$password = $_POST['password'];

// Vérifier les informations d'identification dans la base de données
$sql = "SELECT * FROM Utilisateurs WHERE nom_utilisateur = '$username' AND mot_de_passe = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // L'utilisateur est authentifié avec succès
    session_start();
    $_SESSION['username'] = $username; // Stocker le nom d'utilisateur dans la session
    header("Location: mon_compte.php"); // Rediriger vers la page du compte utilisateur
} else {
    // Les informations d'identification sont invalides
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
