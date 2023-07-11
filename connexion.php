<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Social">
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/libs/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <title>Social</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col l12 m12 s12">
                <div  class="row z-depth-1" id="index">
                    <form method="post" action="authentification.php">
                        <div class="avatar">
                            <img class="responsive-img circle" src="image/pastef.jpeg" id="img-log">
                        </div>
                        <form action="enregistrement.php" method="POST">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" name="username" id="username" required><br>

                            <label for="email">E-mail :</label>
                            <input type="email" name="email" id="email" required><br>

                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" required><br>
                            <div class="input-field col l12 m12 s12 col l12 m12 s12">
                                <button class="btn-large center-align"  name="btn-log" type="submit" id="btn-log">
                                    <i class="mdi-content-send right"></i> se connecter
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>



    </body>
    </html>


<!-- <?php
// ...

// Vérifier les informations d'identification de l'utilisateur
if ($username == $bdUsername && $password == $bdPassword) {
    // Enregistrer les informations de connexion
    include 'enregistrer_connexion.php';

    // Créer une session pour l'utilisateur
    session_start();
    $_SESSION['username'] = $username;

    // Rediriger vers la page du compte utilisateur
    header("Location: fildactualite.php");
    exit();
} else {
    echo "Identifiant ou mot de passe incorrect.";
}

// ...
?>   -->