<?php

include_once '../Services/TypeCongeService.php';





session_start();
extract($_GET);


if (isset($_SESSION['ide'])&&isset($_GET['id'])) {
    
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new TypeCongeService();



$c=new TypeConge($id, $tclibelle);
$a->update($c);

header("location:../list/TypeCongelist.php?update=1&ide=".$ide);
echo"cbon";
?>