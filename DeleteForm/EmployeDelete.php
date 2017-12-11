<?php

session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");
extract($_GET);

include_once '../Services/EmployeService.php';

$a=new EmployeService();
echo $id;


$a->delete($id);
header("location:../list/Employelist.php?delete=1&ide=".$ide);

?>

