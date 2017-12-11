<?php

include_once '../Services/CongeService.php';
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

$a = new CongeService();
$b=$a->getById($id);
$b->setEtat("Accepter");



$a->update($b);








$con = mysqli_connect('localhost', 'root', '', 'pfebd');
$r = mysqli_query($con, "select DATEDIFF(CJOURF,CJOURD) as nbj from conge where CID='" . $id . "'");


//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$resu = mysqli_fetch_assoc($r);
$nbj = $resu['nbj'];
mysqli_close($con);

echo "nombre jours : " . $nbj . "<br>";

//teeeeeeeeeeeest 


$con = mysqli_connect('localhost', 'root', '', 'pfebd');
$r = mysqli_query($con, "select DAT from jourferier");
while ($resu = mysqli_fetch_assoc($r)) {
    echo"*************************<br>";
    echo $resu['DAT'] . "<br>";
    $datee = $resu['DAT'];
    $a = "select DATEDIFF(CJOURF,'$datee') as diff from conge where CID='" . $id . "'";
    
    $req = mysqli_query($con, $a);
    $resultat = mysqli_fetch_assoc($req);
    echo $resultat['diff'] . "<br>";
    $diff = $resultat['diff'];
    if ($diff >= 0) {

        $a = "select DATEDIFF('$datee',CJOURD) as diff from conge where CID='" . $id . "'";
        
        $req = mysqli_query($con, $a);
        $resultat = mysqli_fetch_assoc($req);
        $diff = $resultat['diff'];
        if($diff>=0){echo "ok";$nbj--;}
        else echo "non ok";
        
    }
    else echo 'non oke';
}

mysqli_close($con);






$emp=new EmployeService();
$em=$emp->getById($b->getIde());
$em->setSolde($em->getSolde()-$nbj);
$emp->update($em);


echo $b->getEtat();


$not=new NotificationService();
$noti=$not->getById($id);

$notd=new NotifdService();
$t=$notd->getAll();
$notd->create(new Notifd('',$ids,"Demande Accepter","Conge"));



header("location:../list/Congelist.php?ide=".$ide);

?>
