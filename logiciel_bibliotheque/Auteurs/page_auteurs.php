<?php
 
// Config PHP - Show Errors
ini_set('display_errors', 1);
// Session Start - Use Cookies to know who is the user
session_start();
 
// MySQL Credentials
$mysql_user = 'root';
$mysql_password = 'root';
 
// Require le fichier db et inclus la variable $db
require_once __DIR__ . '/page_auteurs.php';

// used for relative href

$folder_uri = dirname($_SERVER['REQUEST_URI']); // Cette ligne permet de récupérer le chemin relatif de la page actuelle
 
// Test
$config = [
   'key1' => 'value1'
];


$bdd = new PDO('mysql:host=localhost;dbname=base_de_donnees_livres;charset=utf8', 'root', 'root');

try {
  $db = new PDO('mysql:host=localhost;dbname=base_de_donnees_livres', $mysql_user, $mysql_password);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

// Se connnecter à la table bdd_ge se trouvant dans la base de données nommée : base_de_donnees_livres
$tblivres = $db->query('SELECT * FROM table_auteurs')->fetchAll();


?>
<?php

include_once 'page_auteurs.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<header>  
          <ul>
              <li><a href="/Page_livre/page_livre.php">Page Livres</a></li>
              <li><a href="/Categorie/page_cat.php">Page Catégories des Livres</a></li>
              <li><a href="/Auteurs/page_auteurs.php>Pages Auteurs des Livres</a></li>
         </ul>
</header>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<table class="tab">
  <thead>
    <tr>
      <th>ID de l'auteur</th>
      <th>Nom de l'auteur</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tblivres as $row): ?>
      <tr>
        <td><?php echo $row->id_auteur; ?></td>
        <td><?php echo $row->nom_auteur; ?></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>
   </br>
   <!-- Bouton avec un lien  vers une autre page -->
   <a href="/Page_livre/page_livre.php">Retour page Livre</a>
</div>
</body>
</html>
