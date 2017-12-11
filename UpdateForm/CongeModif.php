<?php

include_once '../Services/CongeService.php';





session_start();
extract($_GET);


if (isset($_SESSION['ide'])&&isset($_GET['id'])) {
    
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new CongeService();
$b=$a->getById($id);

$c=new Conge($id, $ide, $Type, $Jdebut, $Jfin, $b->getEtat(), $b->getDdc());

$a->update($c);

header("location:../list/Congelist.php?update=1&ide=".$ide);
echo"cbon";
?>