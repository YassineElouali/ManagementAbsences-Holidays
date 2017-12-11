<?php

include_once '../Services/CongeService.php';
include_once '../Services/NotifdService.php';
include_once '../Services/NotificationService.php';
session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
} else
    header("location:../Interface/login.php");
extract($_POST);

$a = new CongeService();
$b=$a->getById($id);
$b->setEtat("Refuser");

$a->update($b);

echo $b->getEtat();


$not=new NotificationService();
$noti=$not->getById($id);

$notd=new NotifdService();
$t=$notd->getAll();
$notd->create(new Notifd("",$ids,"Demande Refuser","Conge"));



header("location:../list/Congelist.php?ide=".$ide);

?>
