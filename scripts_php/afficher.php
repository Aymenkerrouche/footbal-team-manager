<!DOCTYPE html>
	<html>
	<style>

	</style>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="afficher.css">
		<title>Afficher Joueur</title>
	</head>
	<body>
		<div >
			<div class="algeria-logo"></div>
			<div class="algeria-title">Algeria</div>
		</div>
		<form class="container">
			<table >
				<tr>
					<th>Num</th>
					<th>Poste</th>
					<th>Nom</th>
					<th>Age</th>
					<th>Selection</th>
					<th>Buts</th>
					<th>Club</th>
					<th>Annee</th>
				</tr>
			</table>
		</form>


<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=EquipeNationale;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}


$reponse = $bdd->query('SELECT * FROM Joueurs');


while ($donnees = $reponse->fetch()){

	$num = $donnees['Num'];
	$poste = $donnees['Poste'];
	$nom = $donnees['Nom'];
	$age = $donnees['Age'];
	$selection = $donnees['Selection'];
	$buts = $donnees['Buts'];
	$club = $donnees['Club'];
	$annee = $donnees['Annee']; 
	?>
		<form class="container">
			<table >
				<tr>
					<td><?php echo $num ?></td>
					<td><?php echo $poste ?></td>
					<td><?php echo $nom ?></td>
					<td><?php echo $age ?></td>
					<td><?php echo $selection ?></td>
					<td><?php echo $buts ?></td>
					<td><?php echo $club ?></td>
					<td><?php echo $annee ?></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
	<?php echo '<br>';
}
$reponse->closeCursor(); 
?>