<?php




/*$con=mysqli_connect('localhost', 'root', '', 'pfebd');
$r=  mysqli_query($con, "select DATEDIFF('mm','2015/07/05','2015/07/02') as nbj ");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$resu= mysqli_fetch_assoc($r);
echo $resu['nbj'];
mysqli_close($con);*/


include_once '../Services/EmployeService.php';
include_once '../Connexion/connexion.php';
include_once '../Classes/Employe.php';
$e=new EmployeService();
$emp=$e->getAll();




 

?>

<select name="emp">
 <?php
 
 foreach ($emp as $v) {
     echo "<option value=".$v->getId().">".$v->getNom()."</option>";
     
 }
 
 ?>
    
</select>