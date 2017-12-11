<?php

include_once '../Services/AbsenceService.php';
include_once '../Services/NotifdService.php';
include_once '../Services/NotificationService.php';
include_once '../Services/EmployeService.php';
session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
} else
    header("location:../Interface/login.php");
extract($_POST);

$a = new AbsenceService();
$b=$a->getById($id);
$b->setEtat("Justifie");

$a->update($b);

echo $b->getEtat();


$not=new NotificationService();
$noti=$not->getById($id);

$notd=new NotifdService();
$t=$notd->getAll();
$notd->create(new Notifd("",$ids,"Justifie","Absence"));






$e=new EmployeService();
  $empp=$e->getById($ids);
  $x=$empp->getSolde();
  $x++;echo $x;
$empp->setSolde($x);
$e->update($empp);



header("location:../list/Absencelist.php?ide=".$ide);

?>
