<?php
 



$mydate=getdate(date("U"));
$month="$mydate[mon]";
$day="$mydate[mday]";

if(($month==6)&&($day==12)){
$con=mysqli_connect('localhost', 'root', '', 'pfebd');
$r=  mysqli_query($con, "update employe set ESOLDE=ESOLDE-30 ");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
/*$resu= mysqli_fetch_assoc($r);
echo $resu['nbj'];*/
mysqli_close($con);}


echo $day;
?>
