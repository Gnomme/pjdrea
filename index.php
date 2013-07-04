<!DOCTYPE html>

<?php // php y�y� //
	$parties = scandir("parties"); //scan les parties
	$parties = array_slice($parties, 2); //on vire les 2 premiers
	
	$partieNom = $partiePath = [];
	
	//LA boucle
	for ($i = 0; $i < count($parties); $i++) {
		$partieNom[$i] = "$parties[$i]"; //le nom du fichier brut //
		$partieNom[$i] = str_replace("_"," ", $partieNom[$i]);
		$partiePath[$i] = "parties/" . "$parties[$i]";
		
		//echo "$partieNom[$i]" . " " . "$partiePath[$i]"; // pour test
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
		<img id="ban">
		<div id="connex">
		</div>
	</div>
	<div id="PartiesEnCours">
		<h1> Parties en cours </h1>
		<!-- ila boucle des partie "finie = 0" -->
	</div>
		<div id="PartiesFinies">
		<h1> Parties Finies </h1>
		<!-- la boucle des partie "finie = 1" -->
	</div>
</div>
</body>
</html>
