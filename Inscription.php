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
			 
		    $Nom = $_POST["Nom"];
			$Email = $_POST["Email"]; 
            $Mdp = $_POST["Mdp"]; 
				
            try {
                $mysqlClient = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }

            $sqlQuery = 'SELECT * FROM users WHERE mail = :Email';
            $usersStatement = $mysqlClient->prepare($sqlQuery);
            $usersStatement->bindParam(':Email', $Email);
            $usersStatement->execute();
            $existingUser = $usersStatement->fetch();

            if ($existingUser) {
                echo "<p>Un utilisateur avec cet email existe déjà. Veuillez vous connecter ou utiliser un autre email.</p>";
            } 
            else { 
                $Mdp_hache = hash('sha256', $Mdp);

                $sqlQuery = 'INSERT INTO users (nom, mail, mdp) VALUES (:Nom, :Email, :Mdp)';
                $usersStatement = $mysqlClient->prepare($sqlQuery);
                $usersStatement->bindParam(':Nom', $Nom);
                $usersStatement->bindParam(':Email', $Email);
                $usersStatement->bindParam(':Mdp', $Mdp);
                $usersStatement->execute();
    
                $sqlQuery = 'SELECT * FROM users';
                $usersStatement = $mysqlClient->prepare($sqlQuery);
                $usersStatement->execute();      
                $user = $usersStatement->fetch();
    
                if ($user) {
                    $_SESSION['nom'] = $user['nom'];
                }
    
                echo "<p>Bienvenue, " . $_SESSION['nom'] . " !</p>";
            }
            
		?>

        <form method="POST" action="Inscription.php">
            <input type="submit" name="logout" value="Déconnexion" />
        </form>
	</body>
</html>