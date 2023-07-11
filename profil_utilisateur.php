
<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si l'identifiant de l'utilisateur est passé en paramètre dans l'URL
if (isset($_GET['utilisateur_id'])) {
    $utilisateurId = $_GET['utilisateur_id'];

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM Utilisateurs WHERE id = '$utilisateurId'";
    $result = mysqli_query($conn, $sql);

    // Vérifier si l'utilisateur existe
    if (mysqli_num_rows($result) > 0) {
        $utilisateur = mysqli_fetch_assoc($result);

        // Afficher les informations du profil de l'utilisateur
        echo '<h2>Profil de ' . $utilisateur['nom_utilisateur'] . '</h2>';
        echo '<p>Nom : ' . $utilisateur['nom'] . '</p>';
        echo '<p>Prénom : ' . $utilisateur['prenom'] . '</p>';
        // Afficher d'autres informations du profil de l'utilisateur

        // Afficher les publications de l'utilisateur
        echo '<h3>Publications de ' . $utilisateur['nom_utilisateur'] . '</h3>';

        // Requête pour récupérer les publications de l'utilisateur
        $sql = "SELECT * FROM Publications WHERE auteur_id = '$utilisateurId' ORDER BY date_creation DESC";
        $result = mysqli_query($conn, $sql);

        // Vérifier s'il y a des publications
        if (mysqli_num_rows($result) > 0) {
            // Parcourir les résultats de la requête
            while ($row = mysqli_fetch_assoc($result)) {
                // Afficher les informations de la publication
                echo '<div class="publication">';
                echo '<h4>Auteur : ' . $utilisateur['nom_utilisateur'] . '</h4>';
                echo '<p>Texte : ' . $row['texte'] . '</p>';
                // Afficher les médias s'il y en a
                if (!empty($row['medias'])) {
                    echo '<img src="' . $row['medias'] . '" alt="Médias">';
                }
                echo '</div>';
            }
        } else {
            echo 'Aucune publication à afficher.';
        }
    } else {
        echo 'Utilisateur introuvable.';
    }
} else {
    echo 'Aucun utilisateur spécifié.';
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
