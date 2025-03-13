<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="#home">Accueil</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#about">À propos</a></li>
        <li><a href="#login" id="loginBtn">Se connecter</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <div class="hero">
      </div>
    </section>

    <section id="blog">

    </section>

    <section id="about">
      
    </section>

    <section id="login" class="connect">
      <div class="login-boxes">
        <div class="login-form1">
          <h2>S'inscrire</h2>
          <form method="POST" action="Inscription.php">
            <p>
              Nom d'utilisateur :
              <input type="text" id="Nom" name="Nom" required>
            </p>
            <p>
              Email :
              <input type="email" id="Email" name="Email" required>
            </p>
            <p>
              Mot de passe :
              <input type="password" id="Mdp" name="Mdp" required>
            </p>
            &nbsp;<input type="submit" value="Envoyer" class = "login-form1"/>
          </form>
        </div>
      </div> 

      <div class="login-form2">
          <h2>Se connecter</h2>
          <form method="POST" action="Connexion.php">
            <p>
              Nom d'utilisateur :
              <input type="text" id="Nom_connect" name="Nom_connect" required>
            </p>
            <p>
              Mot de passe :
              <input type="password" id="Mdp_connect" name="Mdp_connect" required>
            </p>
            &nbsp;<input type="submit" value="Envoyer" class = "login-form2"/>
          </form>
        </div>
      </div> 
    </section>
  </main>

  <footer>
    <br/><br/>
    <p>&copy; 2025 </p>
  </footer>

</body>
</html>

<?php

spl_autoload_register(function($className){
  $className = str_replace("\\","/",$className);
  require $className . ".php";
});

use Roles\Lecteur;
use Roles\Auteur;
use Roles\Admin;
use Roles\SuperAdmin;

$a = new Lecteur("a",1);
$superAdmin = new SuperAdmin("SA",0);

$superAdmin -> nommerAdmin("a",1);