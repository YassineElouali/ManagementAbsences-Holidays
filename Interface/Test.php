<?php

$id = 74;
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

echo $nbj;
?>