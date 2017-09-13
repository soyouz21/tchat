
<!DOCTYPE html>
<html>
  <head>
    <title>Mon premier Tchat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


 <link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/styleChat.css" />

  
  </head>
  <body>
    <form class="" action="mini_chat.php" method="post">
    <label for="pseudo">Pseudo</label>  <input type="text" name="pseudo" id="pseudo"/><br/>
    <label for="message">Message</label>  <input type="text" name="message" id="message"/><br/>
    <input type="submit" name="envoyer" value="send"/><br/>

    </form>
    <?php //connection à la base de donnée minichat
    try {
$bdd= new PDO ('mysql:host=localhost;dbname=MiniChat;charset=utf8;','root','user');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
  die ('erreur:'.$e->getMesssage());

}
//Recupation de la base de donnee les 20 premiers messages
$reponse=$bdd->query('SELECT pseudo, message, date FROM Chat ORDER BY id DESC LIMIT 20');

//affichage de chaque message (toutes les donnes sont protégées par htmlspacialchars)
while ($donnees=$reponse->fetch())
{
echo '<p><strong>' .htmlspecialchars($donnees['pseudo']) . '</strong> :'. ($donnees['message']." --- ".htmlspecialchars($donnees['date']) ). '</p>';
//htmlspecialchars methode qui permet de proteger des caracteres speciaux et sql ne saura pas lire.
}
$reponse->closeCursor();
     ?>
  </body>
</html>
