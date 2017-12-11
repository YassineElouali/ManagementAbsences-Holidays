<?php

extract($_GET);



$conn=mysqli_connect('localhost', 'root', '', 'pfebd');
$rr=  mysqli_query($conn, "select DATEDIFF(CURDATE(),EDATER) as nbjj from employe where EID=$id");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$resuu= mysqli_fetch_assoc($rr);
$b=$resuu['nbjj'];
mysqli_close($conn);




include_once '../Services/AbsenceService.php';
include_once '../Services/EmployeService.php';
include_once '../Services/CongeService.php';

$c=new EmployeService();
$conge=$c->getById($id);
$nbjc=30-$conge->getSolde();

$con = mysqli_connect('localhost', 'root', '', 'pfebd');


mysqli_select_db($con, "conge");
//$sql = "SELECT TCID as idc FROM typeconge WHERE TCLIBELLE like'{$q}%'";


$res = mysqli_query($con,"SELECT count(*) as nbja FROM absence WHERE EID ='{$id}' AND AETAT='Non Justifie'");
$r= mysqli_fetch_assoc($res);
$nbja=$r['nbja'];
mysqli_close($con);


$b=$b-$nbjc-$nbja;

$stat=array();
$tab=array();
$tab["country"]="Jours Travaillés";
$tab["value"]=$b;
array_push($stat, $tab);

$tab=array();

$tab["country"]="Jours de Congé";
$tab["value"]=$nbjc;
array_push($stat, $tab);

$tab=array();

$tab["country"]="Jours d'Abscence";
$tab["value"]=$nbja;
array_push($stat, $tab);



print_r(json_encode($stat));










?>
