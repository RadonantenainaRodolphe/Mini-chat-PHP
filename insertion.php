<?php
	if(isset($_POST['OK']))
	{
		if(isset($_POST['pseudo']) && isset($_POST['password']))
		{
			$pseudo=$_POST['pseudo'];
			$pass=$_POST['password'];

			//Ouverture de la base de donnée
			$bdd = new PDO ('mysql:host=localhost;dbname=chat','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			//Selection la table 
			$selection_base = $bdd->prepare('SELECT pseudo FROM inscription WHERE pseudo = ?');
			$selection_base->execute(array($pseudo));
			$valeur = $selection_base->fetch();
			
			//Tester si le pseudo est deja dans la base ou non et inserer si c'est le cas
			if($valeur['pseudo'] == $pseudo)
			{
				echo '<p> le pseudo : ' . $pseudo . 'est déjà choisie </p>';
				echo '<script> alert("pseudo existe deja");</script>';
				header('location:inscription.php');

			}
			else 
			{
				$requete = $bdd->prepare('INSERT INTO inscription(pseudo,pass) VALUES (?,?) ');
				$requete->execute(array($pseudo,$pass));
				echo ('insertion reussi');
				header('location:index.php');	
			}

			

			
			$bdd = NULL;

		}
	}
?>