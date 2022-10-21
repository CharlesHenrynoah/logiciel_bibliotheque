<?php
 
// Config PHP - Show Errors
ini_set('display_errors', 1);
// Session Start - Use Cookies to know who is the user
session_start();
 
// MySQL Credentials
$mysql_user = 'root';
$mysql_password = 'root';
 
// Require le fichier db et inclus la variable $db
require_once __DIR__ . '/database.inc.php';

// used for relative href

$folder_uri = dirname($_SERVER['REQUEST_URI']); // Cette ligne permet de récupérer le chemin relatif de la page actuelle
 
// Test
$config = [
   'key1' => 'value1'
];
 
try {
   $db = new PDO('mysql:host=localhost;dbname=base_de_donnees_livres', $mysql_user, $mysql_password);
   $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}







?>

