<?php


include_once '../Services/CongeService.php';
include_once '../Services/TypeCongeService.php';
include_once '../Classes/../Services/EmployeService.php';


extract($_GET);
$q =$lib;


$con = mysqli_connect('localhost', 'root', '', 'pfedb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "typeconge");
//$sql = "SELECT TCID as idc FROM typeconge WHERE TCLIBELLE like'{$q}%'";


$res = mysqli_query($con,"SELECT TCID as idc FROM typeconge WHERE TCLIBELLE like'{$q}%'");
$r= mysqli_fetch_assoc($res);
$idc=$r['idc'];
mysqli_close($con);






$con = mysqli_connect('localhost', 'root', '', 'pfedb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "conge");

if($lib=="tout")
{$sql = "SELECT * FROM conge";}
else {$sql = "SELECT * FROM conge WHERE TCID ='{$idc}%'";}

$result = mysqli_query($con, $sql);

$empl=new EmployeService();
$tycc=new TypeCongeService();

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    
    echo "<td><input type=checkbox name=check></td>";
    // echo"<td>" . $v->getId() . "</td>";
    $e=$empl->getById($row['EID']);
    echo "<td>" . $e->getNom()." ".$e->getPrenom() . "</td>";
    $cong=$tycc->getById($row['TCID']);
     echo "<td>" . $cong->getLibelle() . "</td>";
     echo "<td>" . $row['CJOURD'] . "</td>";
      echo "<td>" . $row['CJOURF'] . "</td>";
       echo "<td>" . $row['CETAT'] . "</td>";
        echo "<td>" . $row['CDDC'] . "</td>";
    echo "<td class=options-width >";
    echo "<a href=" . "../UpdateForm/GradeUpdate.php?ide=" . $ide . "&id=" . $row['CID'] . " title=Modifier class=icon-1 info-tooltip></a>";
    echo "<a href=" . "../DeleteForm/GradeDelete.php?ide=" . $ide . "&id=" . $row['CID'] . " title=Supprimer class=icon-2 info-tooltip></a>";
    echo "</td></tr>";
}


?>
