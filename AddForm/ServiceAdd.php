<?php

include_once '../Services/ServiceService.php';
include_once '../Classes/Service.php';
session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");




extract($_POST);

$a = new ServiceService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getIds();
}


$c=new Service($b+1,$slibelle);
$a->create($c);

header("location:../list/Servicelist.php?add=1&ide=".$ide);
echo"cbon";
?>