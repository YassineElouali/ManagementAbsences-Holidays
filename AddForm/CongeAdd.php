<?php


include_once '../Services/CongeService.php';
include_once '../Services/EmployeService.php';

include_once '../Services/NotifdService.php';
include_once '../Services/NotificationService.php';

extract($_POST);
extract($_GET);

$a = new CongeService();
$t = array();
$t = $a->getAll();
foreach ($t as $key => $v) {

  $b=$v->getId();
}

/*$dtab=  explode("-", $Jdebut);
$ftab=  explode("-", $Jfin);
echo $dtab[0];
echo '<br>';
echo $dtab[1];
echo '<br>';
echo $dtab[2];
echo "<br>date f :<br>";
echo $ftab[0];
echo '<br>';
echo $ftab[1];
echo '<br>';
echo $ftab[2];

$nbj=($ftab[0]-$dtab[0])*365+($ftab[1]-$dtab[1])*30+$ftab[2]-$dtab[2];
echo "<br>".$nbj;*/

$mydate=getdate(date("U"));
$auj="$mydate[year]-$mydate[mon]-$mydate[mday]";

$es=new EmployeService();
$emplo=$es->getById($ide);




$con=mysqli_connect('localhost', 'root', '', 'pfedb');
$r=  mysqli_query($con, "select DATEDIFF('".$Jfin."','".$Jdebut."') as nbj ");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$resu= mysqli_fetch_assoc($r);
echo $resu['nbj'];
mysqli_close($con);

if($resu['nbj']<0) {    header("location:../Formulaire/CongeForm.php?errn=1&ide=".$ide);

}

if($emplo->getSolde() < $resu['nbj']) {

header("location:../Formulaire/CongeForm.php?errin=1&ide=".$ide);

} 
 echo $resu['nbj']." ".$emplo->getSolde();


if(($emplo->getSolde() > $resu['nbj'])&&($resu['nbj']>0))  {
     $c=new Conge($b+1, $ide,$Type, $Jdebut, $Jfin, "En attente",$auj);
$a->create($c); 
    

$n=new NotificationService();
$x=$n->getAll();

foreach ($x as $key => $y) {

  $idn=$y->getId();
}


$lib="Demande de conge";
echo $lib;
$n->create(new Notification($idn+1,$ide,$lib));

header("location:../list/Congelist.php?add=1&ide=".$ide);

}







echo"cbon";
?>