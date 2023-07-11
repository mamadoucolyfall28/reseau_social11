
<!DOCTYPE html>
<html>
<head>
    <title>Mon réseau social</title>
</head>
<body>
    

    <?php
        // Inclure le fichier de connexion à la base de données
    include 'bd.php';

        // Requête pour récupérer les publications
    $sql = "SELECT * FROM publications ORDER BY date_creation DESC";
    $result = mysqli_query($conn, $sql);

        // Vérifier s'il y a des publications
    if (mysqli_num_rows($result) > 0) {
            // Parcourir les résultats de la requête
        while ($row = mysqli_fetch_assoc($result)) {
                // Afficher les informations de la publication
            echo '<div class="publication">';
            echo '<h3>Auteur : ' . $row['auteur'] . '</h3>';
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

        // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>

</body>
</html>
