<?php

session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_GET);

include_once '../Services/GradeService.php';

$a=new GradeService();
echo $id;


$a->delete($id);
header("location:../list/Gradelist.php?delete=1&ide=".$ide);

?>

