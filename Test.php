<?php

extract($_GET);


include_once '../Services/AbsenceService.php';
include_once '../Services/EmployeService.php';
include_once '../Services/CongeService.php';
$id=1;
$c=new EmployeService();
$conge=$c->getById($id);
$nbjc=30-$conge->getSolde();

$con = mysqli_connect('localhost', 'root', '', 'pfebd');


mysqli_select_db($con, "conge");
//$sql = "SELECT TCID as idc FROM typeconge WHERE TCLIBELLE like'{$q}%'";


$res = mysqli_query($con,"SELECT count(*) as nbja FROM absence WHERE EID ='{$id}' AND AETAT='Accepter'");
$r= mysqli_fetch_assoc($res);
$nbja=$r['nbja'];
mysqli_close($con);


$con=mysqli_connect('localhost', 'root', '', 'pfebd');
$r=  mysqli_query($con, "select DATEDIFF(CURDATE(),EDATER) as nbj from employe where EID=$id");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$resu= mysqli_fetch_assoc($r);
echo $resu['nbj'];
mysqli_close($con);


$c=$resu['nbj'];

$b=$c-$nbjc-$nbja;

$stat=array();
$tab=array();
$tab["country"]="Jours travaillé";
$tab["value"]=$b;
array_push($stat, $tab);

$tab=array();

$tab["country"]="Jours de congé";
$tab["value"]=$nbjc;
array_push($stat, $tab);

$tab=array();

$tab["country"]="Jours d'abscence";
$tab["value"]=$nbja;
array_push($stat, $tab);



print_r(json_encode($stat));









?>
