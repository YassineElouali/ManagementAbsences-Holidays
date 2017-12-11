<?php

include_once '../Services/ServiceService.php';





session_start();
extract($_GET);


if (isset($_SESSION['ide'])&&isset($_GET['id'])) {
    
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new ServiceService();



$c=new Service($id, $slibelle);
$a->update($c);

header("location:../list/Servicelist.php?update=1&ide=".$ide);
echo"cbon";
?>