<?php

include_once '../Services/GradeService.php';





session_start();
extract($_GET);


if (isset($_SESSION['ide'])&&isset($_GET['id'])) {
    
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_POST);

$a = new GradeService();



$c=new Grade($id,$glibelle);
$a->update($c);

header("location:../list/Gradelist.php?update=1&ide=".$ide);
echo"cbon";
?>