<?php

include_once '../Services/ServiceService.php';


extract($_GET);
$q =$lib;
$con = mysqli_connect('localhost', 'root', '', 'pfebd');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "grade");
$sql = "SELECT * FROM service WHERE SLIBELLE like'{$q}%'";

$result = mysqli_query($con, $sql);


while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    
    echo "<td><input type=checkbox name=check></td>";
    // echo"<td>" . $v->getId() . "</td>";
    echo "<td>" . $row['SLIBELLE'] . "</td>";
    echo "<td class=options-width >";
    echo "<a href=" . "../UpdateForm/ServiceUpdate.php?ide=" . $ide . "&id=" . $row['SID'] . " title=Modifier class=icon-1 info-tooltip></a>";
    echo "<a href=" . "../DeleteForm/ServiceDelete.php?ide=" . $ide . "&id=" . $row['SID'] . " title=Supprimer class=icon-2 info-tooltip></a>";
    echo "</td></tr>";
}
?>
