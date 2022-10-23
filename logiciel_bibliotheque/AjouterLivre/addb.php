<?php
$bdd = new PDO('mysql:host=localhost;dbname=base_de_donnees_livres;charset=utf8', 'root', 'root');

if (isset($_POST['envoyer'])){
  if(!empty($_POST['titre']) AND !empty($_POST['synopsys']) AND !empty($_POST['nom_auteur']) AND !empty($_POST['nom_categorie'])){ 

    $titre = htmlspecialchars($_POST['titre']); 
    $synopsys = htmlspecialchars($_POST['synopsys']);
    $nom_auteur = htmlspecialchars($_POST['nom_auteur']);
    $nom_categorie = htmlspecialchars($_POST['nom_categorie']);
  

    $insertauteur = $bdd->prepare("INSERT INTO table_auteurs(nom_auteur) VALUES(?)");
    $insertauteur -> execute(array($nom_auteur));
    $idauteur = $bdd->lastInsertId();


    $insertcategorie = $bdd->prepare("INSERT INTO table_categories(nom_categorie) VALUES(?)");
    $insertcategorie -> execute(array($nom_categorie));
    $idcategorie = $bdd->lastInsertId();


    $insertlivre = $bdd->prepare("INSERT INTO table_livre(titre,synopsys) VALUES(?,?)");
    $insertlivre -> execute(array($titre, $synopsys));
    $idlivre = $bdd->lastInsertId();


    
}else {
    echo "Veuillez remplir les champs !";
  }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ajouter un Livre</title>
</head>
<body>
<form action="/AjouterLivre/addb.php" method="POST">
  <div>
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" autocomplete="off">
  </div>
  <div>
    <label for="synopsys">Synopsis</label>
    <input type="text" id="synopsys" name="synopsys" autocomplete="off">
  </div>
  <div>
    <label for="nom_auteur">Nom de l'auteur</label>
    <input type="text" id="nom_auteur" name="nom_auteur" autocomplete="off">
  </div>
  <div>
    <label for="nom_categorie">Nom de la catégorie</label>
    <input type="text" id="nom_categorie" name="nom_categorie" autocomplete="off">
  </div>
  <div>
    <button type="submit" name = "envoyer">Enregistrer les données</button>
  </div>
</form>
</body>
</html>
