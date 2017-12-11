<?php


extract($_GET);

if(isset($da)) {
    
    
 
$con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Demande d\'absence";
$r=  mysqli_query($con, "Delete  from notification WHERE LIBELLE = '$a' ");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 

mysqli_close($con);
    
header("location:../list/Absencelist.php?ide=$ide");
    
    
}
else if(isset($aa)){
    
 $con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Justifie";$b="Absence";
$r=  mysqli_query($con, "Delete  from notifd WHERE IDD = '$ide' and NTYPE = '$b' and LIBELLE = '$a'");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 echo $ide;

mysqli_close($con);
    echo "ok";
header("location:../list/Absencelista.php?ide=$ide");   
   
}

else if(isset($ar)){
    
 $con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Non Justifie";
 $b="Absence";
$r=  mysqli_query($con, "Delete  from notifd WHERE IDD = '$ide' and NTYPE = '$b' and LIBELLE = '$a'");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 echo $ide;

mysqli_close($con);
    echo "ok";
header("location:../list/Absencelistr.php?ide=$ide");   
   
}

else if(isset($cd)){
    
 
$con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Demande de Conge";
$r=  mysqli_query($con, "Delete  from notification WHERE LIBELLE = '$a' ");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 

mysqli_close($con);
    
header("location:../list/Congelist.php?ide=$ide");
   
}


else if(isset($dca)){
    
 
$con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Demande Accepter";
 $b="Conge";
$r=  mysqli_query($con, "Delete  from notifd WHERE IDD = '$ide' and NTYPE = '$b' and LIBELLE = '$a'");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 echo $ide;

mysqli_close($con);
    
header("location:../list/Congelista.php?ide=$ide");
   
}

   else if(isset($dcr)){
    
 $con=  mysqli_connect("localhost", "root", '', "pfedb");
 $a="Demande Refuser";
 $b="Conge";
$r=  mysqli_query($con, "Delete  from notifd WHERE IDD = '$ide' and NTYPE = '$b' and LIBELLE = '$a'");
//$r = mysql_query("select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'")or die("erreur requette");
 echo $ide;

mysqli_close($con);
    echo "ok";
header("location:../list/Congelistr.php?ide=$ide");   
   
}



?>