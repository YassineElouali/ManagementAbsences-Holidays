<?php

include_once '../Services/EmployeService.php';


extract($_GET);

$con = mysqli_connect('localhost', 'root', '', 'pfebd');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "employe");
$sql = "SELECT * FROM employe WHERE ENOM like'{$nom}%' and EPRENOM like '{$prenom}%'";

$result = mysqli_query($con, $sql);

include_once '../Services/GradeService.php';
while ($row = mysqli_fetch_array($result)) {
    echo"<tr>";
    echo "<td><input type=checkbox name=check></td>";
    // echo"<td>" . $v->getId() . "</td>";
   // $ga = $g->getById(row['GID']);

    // echo"<td>" . $ga->getLibelle() . "</td>";
    echo"<td>" . $row['ENOM'] . "</td>";
    echo"<td>" . $row['EPRENOM'] . "</td>";
    //  echo"<td>" . $v->getTel() . "</td>";
    echo"<td>" . $row['EADRESSE'] . "</td>";
    echo"<td>" . $row['EEMAIL'] . "</td>";
    //  echo"<td>" . $v->getMdp() . "</td>";
    // echo"<td>" . $v->getSalaire() . "</td>";
    //  echo"<td>" . $v->getDater() . "</td>";
    echo"<td>" . $row['ESOLDE'] . "</td>";

    echo "<td class=options-width >";
    echo "<a href=" . "../list/Employelistd.php?ide=" . $ide . "&id=" . $row['EID'] . " title=Detail class=icon-add info-tooltip></a>";
    echo "<a href=" . "../UpdateForm/EmployeUpdate.php?ide=" . $ide . "&id=" . $row['EID'] . " title=Modifier class=icon-1 info-tooltip></a>";
    echo "<a href=" . "../DeleteForm/EmployeDelete.php?ide=" . $ide . "&id=" . $row['EID'] . " title=Supprimer class=icon-2 info-tooltip></a>";
    echo "</td></tr>";
}
?>
