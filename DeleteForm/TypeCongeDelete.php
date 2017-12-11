<?php

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
}
else header("location:../Interface/login.php");


extract($_GET);

include_once '../Services/TypeCongeService.php';

$a=new TypeCongeService();
echo $id;


$a->delete($id);
header("location:../list/TypeCongelist.php?delete=1&ide=".$ide);

?>

