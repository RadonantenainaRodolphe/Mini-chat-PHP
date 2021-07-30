<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<meta charset="utf-8">
	<title>Mini-Chat</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/select.min.js"></script>
	<script type="text/javascript" src="dist/tether/js/tether.js"></script>
	<script type="text/javascript" src="dist/bootstrap.min.js"></script>
	<style type="text/css">
		header a{
			font-size: 30px;
			font-weight: bolder;
		}
	</style>
</head>
<body>
	<header class="container-fluid header">
		<a href="index.php" class="logo">MINI-CHAT</a>
	</header>
	<div class="container">
		<form action="message.php" method="POST">
			<div class="form-group">
				<label for="texto">Votre message : </label>
				<textarea class="form-control" id="texto" name="texto" required="required"></textarea>
			</div>
			<button type="submit" name="OK" class="btn btn-primary">ENVOYER</button>
			
		</form>
	</div>
	</body>
</html>

<?php
//Ouverture de la base de donnée
$bdd = new PDO ('mysql:host=localhost;dbname=chat','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if(isset($_POST['OK']))
{
	if(!empty($_POST['texto']))
	{
		
		$texte = $_POST['texto'];
		//selection de la table inscription
		$requete = $bdd->prepare('SELECT pseudo FROM inscription WHERE pseudo = ?');
		$requete->execute(array($_SESSION['login']));
		$valeur = $requete->fetch();
		//insertion de message dans la table message
		$insertion = $bdd -> prepare('INSERT INTO texto(pseudo,message) VALUES (?,?)');
		$insertion->execute(array($valeur['pseudo'],$texte));
	}
}
//Selection de la table texto et afficher tous les messages
$select = $bdd -> prepare('SELECT pseudo, message FROM texto ORDER BY id DESC');
$select->execute();
while($donne=$select->fetch())
{
	echo '<p>' . $donne['pseudo'] . ' : ' . $donne['message'];
}

$bdd=NULL;
?>