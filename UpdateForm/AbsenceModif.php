<?php

include_once '../Services/AbsenceService.php';





session_start();
extract($_GET);


if (isset($_SESSION['ide'])&&isset($_GET['id'])) {
    
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new AbsenceService();
$b=$a->getById($id);

$c=new absence($id, $ide, $jours, $motif, $b->getEtat(), $b->getDda());

$a->update($c);

header("location:../list/Absencelist.php?update=1&ide=".$ide);
echo"cbon";
?>