<?php
echo"hello :<br>";

include_once '../Connexion/connexion.php';
include_once '../Dao/IDao.php';

include_once './EmpServService.php';
include_once '../Classes/EmpService.php';




$a=new EmpService(1,4, "2015/12/2","2015/12/1");
$b=new EmpServService();?>