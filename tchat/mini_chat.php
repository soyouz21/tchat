<?php
//effectuer ici la requete qui insere le message
//puis redigerer vers minichat.php comme ceci:

//connexion à la base de donnees

try{
$bdd = new PDO ('mysql:host=localhost;dbname=MiniChat; charset=utf8;','root','user');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
  die ('erreur:'.$e->getMesssage());

}

//insertion du message dans la base de donnee a l aide d une requete preparee
$req= $bdd->prepare('INSERT INTO Chat (pseudo, message) VALUES(?,?)');
$req->execute (array($_POST['pseudo'], $_POST['message']));

//redirection du visiteur vers la page index.php
header ('Location:index.php');


 ?>
