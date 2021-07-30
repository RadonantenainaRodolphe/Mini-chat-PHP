<!DOCTYPE html>
<html>
<head>
	<title>MINI-CHAT</title>
	<meta charset="utf-8">
	<title>Mini-Chat</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/select.min.js"></script>
	<script type="text/javascript" src="dist/tether/js/tether.js"></script>
	<script type="text/javascript" src="dist/bootstrap.min.js"></script>
	<style type="text/css">
		.inscription{

			float:right;
		}
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
		<form action="connexion.php" method="POST">
			<div class="form-group">
				<legend style="color: blue;">Champ de saisie</legend>
				<p>
					<label for="pseudo">Pseudo : </label>
					<input type="text" name="pseudo" id="pseudo" placeholder="ecrire votre pseudo ici" required="required" class="form-control">
				</p>
			</div>
			<div class="form-group">
				<p>
					<label for="password">Mot de passe : </label>
					<input type="password" name="password" id="password" required="required" class="form-control" placeholder="saisissez votre mot de passe">
				</p>
			</div>
			<button type="submit" class="btn btn-primary" name="OK">CONNEXION</button>
			<div class="inscription">
				<p>Pas inscrit ? <a href="inscription.php">Inscrivez-vous ici</a></p>
			</div>
			
		</form>
	</div>


</body>
</html>