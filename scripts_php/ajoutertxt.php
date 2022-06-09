<!DOCTYPE html>
  <html>
  <style>

  </style>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="afficher.css">
    <title>Ajouter Joueur Txt</title>
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




if (isset($_POST['ajt'])) {

	$joueur_num = $_POST['num'] ;

	$monfichier = fopen('Joueurs.txt','r');


	while(!feof($monfichier)){
		$ligne = fgets($monfichier);
		$num = substr($ligne,0,2);
		if ($num == $joueur_num) {
			$ary = explode(' | ',$ligne);
		}
	}
	fclose($monfichier);
}




$req = $bdd->prepare('INSERT INTO Joueurs(num, poste, nom, age, selection, buts, club, annee) VALUES(:Num, :Poste, :Nom, :Age, :Selection, :Buts, :Club, :Annee)');
$req->execute(array(
	'Num' => $ary[0],
	'Poste' => $ary[1],
	'Nom' => $ary[2],
	'Age' => $ary[3],
	'Selection' => $ary[4] ,
	'Buts' => $ary[5],
	'Club' => $ary[6],
	'Annee' => $ary[7]
));
  echo "<h2> Le nouveau joueur <strong>$ary[2]</strong> a été ajouté</h2>";
  echo "<br>";
// AFFICHAGE
  $reponse = $bdd->query("SELECT * FROM Joueurs WHERE Num LIKE $ary[0]");


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