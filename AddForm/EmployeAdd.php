<?php

include_once '../Services/EmployeService.php';





session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");


extract($_POST);

$a=  new EmployeService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getId();
}

$mydate=getdate(date("U"));
$auj="$mydate[year]-$mydate[mon]-$mydate[mday]";


$c=new Employe($b+1, $eg, $nom, $prenom, $tel, $adresse, $email, $mdpp, $salaire,$auj,30);
$a->create($c);

header("location:../list/Employelist.php?add=1&ide=".$ide);
echo"cbon";
?>