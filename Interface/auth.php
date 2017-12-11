<?php
  session_start();
extract($_POST);


include_once '../Services/EmployeService.php';


$con=mysqli_connect('localhost', 'root', '', 'pfedb');

$r=  mysqli_query($con, "select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
$n=mysqli_num_rows($r);
mysqli_close($con);

if ($n != 0) {
    $a=new EmployeService();
   $b= $a->auth($email, $mdp);

      
      
      
      
    

 $_SESSION['ide']=$b->getId();
header("location:../Interface/Home.php?ide=".$b->getId());

} else {
     header ("location:../Interface/login.php");
}
?>
