<?php
session_start();
$_SESSION['login'] = $_POST['pseudo'];
?>
<?php 
if(isset($_POST['OK']))
{
	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$pass = $_POST['password'];
		echo $pseudo;
		echo $pass;
		//Ouverture de la base de donnée 
		$bdd = new PDO('mysql:host=localhost;dbname=chat','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		//Selection de la table 
		$select = $bdd -> prepare('SELECT pseudo,pass FROM inscription WHERE pseudo = ? AND pass =?');
		$select->execute(array($pseudo,$pass));
		$test = $select->fetch();
		//tester si la valeur existe deja dans la base
		if($test['pseudo'] == $pseudo && $test['pass']== $pass)
		{
			echo 'connexion reussi';
			header('location:message.php');
		}
		else
		{
			echo 'login n\'existe pas';
			header('location:index.php');
		}
		$bdd->Null;

	}
}
?>