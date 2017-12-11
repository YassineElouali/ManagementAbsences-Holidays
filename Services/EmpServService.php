<?php

include_once '../Classes/EmpService.php';
include_once '../Connexion/connexion.php';
include_once '../Dao/IDao.php';

class EmpServService implements IDao{
   private $listEmpService=array();
   private $connexion;
    
   function __construct() {
       $this->connexion =new Connexion();
   }

    public function create($EmpService) {
        $query = "INSERT INTO empserv (SID,EID,DATED,DATEF) VALUES ('" . $EmpService->getIds() . "','" . $EmpService->getIde() .
                "','" . $EmpService->getDated() . "','" . $EmpService->getDatef()."')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        
    }

    public function delete2($ids,$ide) {
      $query = "DELETE FROM empserv WHERE SID = '" . $ids . "' AND EID = '".$ide."'";
$req = $this->connexion->getConnextion()->prepare($query);
$req->execute();}

    public function getAll() {
        $query = "select * from empserv";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listEmpService[] = new EmpService($affichage->SID,$affichage->EID,$affichage->DATED,$affichage->DATEF);
        }
        return $this->listEmpService; 
    }

   public function getBydId2($ids,$ide) {
        $query = "select * from empserv where SID = '" . $ids . "' AND EID = '".$ide."'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $es = new EmpService($affichage->SID,$affichage->EID,$affichage->DATED,$affichage->DATEF);
        }
        return $es;
   }
   
   
 public function update($Empservice) {
        
        $query = "UPDATE empserv SET DATEF='" . $Empservice->getDatef() . "',DATEd='".$Empservice->getDated()."' WHERE SID='" . $Empservice->getIds() ."'AND EID='".$Empservice->getIde()."'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        
    }

   

    public function delete($obj) {
     
    }

    public function getById($obj) {
      
    }

    public function auth($a, $b) {
        
    }

}


?>

