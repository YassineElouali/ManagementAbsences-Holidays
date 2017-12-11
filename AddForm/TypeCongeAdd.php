<?php


session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}



include_once '../Services/TypeCongeService.php';
include_once '../Classes/TypeConge.php';

extract($_POST);

$a = new TypeCongeService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getId();
}


$c=new TypeConge($b+1,$tclibelle);
$a->create($c);

header("location:../list/TypeCongelist.php?add=1&ide=".$ide);
echo"cbon";
?>