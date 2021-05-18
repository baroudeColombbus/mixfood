<?php 
// init 
// fichier indispensable au fonctionnement 


// start the session here

session_start();


///////// 1- connexion a la base de données           ///////////

define('SITEURL', 'http://localhost/mixfood/'); // la racine
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('MIXFOOD', 'mixfood');


$pdoSITE  = new PDO("mysql:host=LOCALHOST;dbname=MIXFOOD", DB_USERNAME, DB_PASSWORD);
  // set the PDO error mode to exception
  $pdoSITE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




  $message = '' ;


?>