<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

            session_start();

            if (isset($_POST['logout'])) {
                session_destroy();
                header('Location: Page_principale.php'); 
                exit();
            }
			
		    $Nom_connect = $_POST["Nom_connect"]; 
            $Mdp_connect = $_POST["Mdp_connect"]; 
				
            try {
                $mysqlClient = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }

            $sqlQuery = 'SELECT * FROM users';
            $usersStatement = $mysqlClient->prepare($sqlQuery);
            $usersStatement->execute();
            $user = $usersStatement->fetch();

            if ($Nom_connect !== $user['nom']) {
                die("Nom d'utilisateur incorrect.");
            }
            elseif (hash('sha256', $Mdp_connect) !== hash('sha256', $user['mdp'])) {
                die("Mot de passe incorrect.");
            }

            if ($user) {
                $_SESSION['nom'] = $user['nom'];
            }

            echo "<p>Bon retour parmis nous, " . $_SESSION['nom'] . " !</p>";

		?>

        <form method="POST" action="Connexion.php">
            <input type="submit" name="logout" value="Déconnexion" />
        </form>
	</body>
</html>