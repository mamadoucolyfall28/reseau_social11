
<?php
// Inclure le fichier de connexion à la base de données
include 'bd.php';


// Récupérer les informations du formulaire d'inscription
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Vérifier si l'utilisateur existe déjà dans la base de données
$sql = "SELECT * FROM Utilisateurs WHERE nom_utilisateur = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // L'utilisateur existe déjà
    echo "Nom d'utilisateur déjà utilisé. Veuillez en choisir un autre.";
} else {
    // Insérer les informations de l'utilisateur dans la base de données
    $sql = "INSERT INTO Utilisateurs (nom_utilisateur, mot_de_passe, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur lors de l'inscription : " . mysqli_error($conn);
    }
}


?>

<?php
include 'connexion.php';


// Vérifier les informations d'identification de l'utilisateur
if ($username  && $password == $email) {
    // Enregistrer les informations de connexion
    include 'enregistrement.php';

    // Créer une session pour l'utilisateur
    session_start();
    $_SESSION['username'] = $username;

    // Rediriger vers la page du compte utilisateur
    header("Location: mon_compte.php");
    exit();
} else {
    echo "Identifiant ou mot de passe incorrect.";
}

?>

