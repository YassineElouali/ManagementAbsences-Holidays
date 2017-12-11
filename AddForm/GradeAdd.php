<?php

include_once '../Services/GradeService.php';
include_once '../Classes/Grade.php';




session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new GradeService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getId();
}


$c=new Grade($b+1,$glibelle);
$a->create($c);

header("location:../list/Gradelist.php?add=1&ide=".$ide);
echo"cbon";
?>