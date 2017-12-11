<?php






include_once '../Services/AbsenceService.php';







$absences=new AbsenceService();
$all=$absences->getAll();


$janvier=0;
$fevrier=0;
$mars=0;
$avril=0;
$mai=0;
$juin=0;
$juillet=0;
$aout=0;
$septembre=0;
$octobre=0;
$novembre=0;
$decembre=0;



foreach ($all as $v) {
    if($v->getEtat()=="Non Justifie"){
    $tab=explode("-", $v->getJours());
    
   if($tab[1]==1) $janvier++;
   if($tab[1]==2) $fevrier++;
   if($tab[1]==3) $mars++;
   if($tab[1]==4) $avril++;
   if($tab[1]==5) $mai++;
   if($tab[1]==6) $juin++;
   if($tab[1]==7) $juillet++;
   if($tab[1]==8) $aout++;
   if($tab[1]==9) $septembre++;
   if($tab[1]==10) $octobre++;
   if($tab[1]==11) $novembre++;
   if($tab[1]==12) $decembre++;
            
            
            
    }
    
    
    
    
    
}



$stat=array();
$t=array();
$t["country"]="Janvier";
$t["visits"]=$janvier;
$t["color"]= "#FF0F00";
array_push($stat, $t);

$t=array();

$t["country"]="Fevrier";
$t["visits"]=$fevrier;
$t["color"]= "#FF6600";
array_push($stat, $t);

$t=array();

$t["country"]="Mars";
$t["visits"]=$mars;
$t["color"]= "#FF9E01";
array_push($stat, $t);

$t=array();

$t["country"]="Avril";
$t["visits"]=$avril;
$t["color"]= "#FCD202";
array_push($stat, $t);

$t=array();

$t["country"]="Mai";
$t["visits"]=$mai;
$t["color"]= "#F8FF01";
array_push($stat, $t);

$t=array();

$t["country"]="Juin";
$t["visits"]=$juin;
$t["color"]= "#B0DE09";
array_push($stat, $t);

$t=array();

$t["country"]="Juillet";
$t["visits"]=$juillet;
$t["color"]= "#04D215";
array_push($stat, $t);

$tab=array();

$t["country"]="Aout";
$t["visits"]=$aout;
$t["color"]= "#0D8ECF";
array_push($stat, $t);

$t=array();

$t["country"]="Septembre";
$t["visits"]=$septembre;
$t["color"]= "#0D52D1";
array_push($stat, $t);

$tab=array();

$t["country"]="Octobre";
$t["visits"]=$octobre;
$t["color"]= "#2A0CD0";
array_push($stat, $t);

$t=array();

$t["country"]="Novembre";
$t["visits"]=$novembre;
$t["color"]= "#8A0CCF";
array_push($stat, $t);

$t=array();

$t["country"]="decembre";
$t["visits"]=$mars;
$t["color"]= "#CD0D74";
array_push($stat, $t);


print_r(json_encode($stat));









?>
