<?php

include_once '../Services/AbsenceService.php';
include_once '../Services/NotificationService.php';
include_once '../Services/NotifdService.php';
include_once '../Services/EmployeService.php';



session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new AbsenceService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getId();
}


$mydate=getdate(date("U"));
$auj="$mydate[year]-$mydate[mon]-$mydate[mday]";

$c=new absence($b+1, $emp, $jours, $motif, $etat, $auj);
$a->create($c);



$n=new NotifdService();
$x=$n->getAll();

foreach ($x as $key => $y) {

  $idn=$y->getId();
}


$lib=$etat;



$n->create(new Notifd($idn+1, $emp, $lib, "Absence"));


echo $etat;

if($etat=="Non Justifie")
{
  $e=new EmployeService();
  $empp=$e->getById($emp);
  $x=$empp->getSolde();
  $x--;echo $x;
$empp->setSolde($x);
$e->update($empp);
    
}

header("location:../list/Absencelist.php?add=1&ide=".$ide);
//echo"cbon";
?>