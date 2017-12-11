<?php

include_once '../Services/AbsenceService.php';

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
$b->setEtat("N");

$a->update($b);

echo $b->getEtat();


include_once '../Services/NotificationService.php';
include_once '../Services/NotifdService.php';
$not=new NotificationService();
$noti=$not->getById($id);

$notd=new NotifdService();
$t=$notd->getAll();
$notd->create(new Notifd("",$ids,"Demande Refuser","Absence"));

header("location:../list/Absencelist.php?ide=".$ide);

?>
