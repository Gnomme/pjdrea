<!DOCTYPE html>

<?php // php yoyo
	$parties = scandir("parties"); //scan les parties
	$parties = array_slice($parties, 2); //on vire les 2 premiers (.. et ... ) qui ne servent pas ici
	
	$partieNom = $partiePath = $partiePitch = $partieStat = $partieMaster = $partieJoueurs = []; //liste des tables qui contiennent les infos sur les parties
	
	//LA boucle
	for ($i = 0; $i < count($parties); $i++) {
		$partieNom[$i] = "$parties[$i]"; //le nom du fichier brut //
		$partieNom[$i] = str_replace("_"," ", $partieNom[$i]); //le nom du fichier propre pour affichage
		$partiePath[$i] = "parties/" . "$parties[$i]";

		//	ouvrir le pdo sur la bdd de la base
		$bdd = "sqlite:" . "$partiePath[$i]" . "/BasePartie.bdd";
		$c = new PDO($bdd);
		
		//	choper le pitch, le master, les joueurs, etc.
		foreach ($c->query("select pitch, master_id, finie from info") as $inf){
			$partiePitch[$i] = $inf['pitch'];
			$partieStat[$i] = $inf['finie'];
			$partieMaster[$i] = $inf['master_id'];
		}
		
		$partieJoueurs[$i] = [];
		$k = 0;
		foreach ($c->query("select nom from joueurs") as $j) {
			$partieJoueurs[$i][$k] = $j['nom'];
			$k++;
		}
		
		//	fermer le pdo
		//echo "$partieNom[$i]"." $partiePath[$i]"." $partiePitch[$i]" ; // pour test
		$c = NULL;
	}
?>



<!-- HTML yop yop-->
<html>
<head>
<meta charset="ANSI">
	<title>Petits JDR entre amis</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</meta>
</head>
<body>
<div id="warp">
	<div id="menu">
		<img id="ban"> <!-- une image qui va bien -->
		<div id="connex"> <!-- le bouton de connexion à l'admin -->
		</div>
	</div>
	<div id="PartiesEnCours">
		<h1> Parties en cours </h1>
		<!-- la boucle des parties "finie = 0" -->
	</div>
		<div id="PartiesFinies">
		<h1> Parties Finies </h1>
		<!-- la boucle des parties "finie = 1" -->
	</div>
</div>
</body>
</html>
