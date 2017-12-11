<?php

$server = new PDO("mysql:host=localhost;dbname=pfebd;charset=utf8");
$var = $_GET['var'];

//$server->exec("INSERT INTO salles Values('','$code','$libelle')");

$res = $server->query(" select * from Grade where GLIBELLE like '".$var."%'");
$resultat = "";
while($row = $res->fetch(PDO::FETCH_OBJ)){
	$resultat .= "<tr><td>{$row->GID}</td><td>{$row->GLIBELLE}</td></tr>";
}



echo $resultat;




// echo "<tr><td>Code</td><td>Libelle</td><td>Modifier</td><td>Supprimer</td></tr>";
