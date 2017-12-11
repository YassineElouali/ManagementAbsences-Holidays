<?php

include_once '../Classes/Conge.php';
include_once '../Connexion/connexion.php';
include_once '../Dao/IDao.php';

class CongeService implements IDao {
private $listConge = array();
private $connexion;
function __construct() {
    
    $this->connexion = new Connexion();
}


    public function create($Conge) {
        $query = "INSERT INTO Conge (CID,EID,TCID,CJOURD,CJOURF,CETAT,CDDC) VALUES"
                . " ('" . $Conge->getId() . "','" . $Conge->getIde() ."','" .$Conge->getType() ."','" .
                $Conge->getJdebut()."','" .$Conge->getJfin()."','" .$Conge->getEtat()."','" .$Conge->getDdc()."')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
         $query = "DELETE FROM Conge WHERE CID = '" . $id . "'";
$req = $this->connexion->getConnextion()->prepare($query);
$req->execute();
    }

    public function getAll() {
        $query = "select * from conge";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listConge[] = new Conge($affichage->CID,$affichage->EID,$affichage->TCID,$affichage->CJOURD,$affichage->CJOURF
                    ,$affichage->CETAT,$affichage->CDDC);
        }
        return $this->listConge;  }

    public function getById($id) {
      $query = "select * from conge WHERE CID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $c = new Conge($affichage->CID,$affichage->EID,$affichage->TCID,$affichage->CJOURD,$affichage->CJOURF
                    ,$affichage->CETAT,$affichage->CDDC);
        }
        return $c;
    }

    public function update($Conge) {
      $query = "UPDATE conge
SET CID ='" . $Conge->getId() . "',EID ='" . $Conge->getIde() ."',TCID='" .$Conge->getType() ."'"
              . ",CJOURD='".$Conge->getJdebut()."',CJOURF='" .$Conge->getJfin()."',CETAT='" .$Conge->getEtat()."',CDDC='" .$Conge->getDdc(). "'
WHERE CID='" . $Conge->getId() . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();  
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function auth($a, $b) {
        
    }

    public function getAllByid($a) {
        $query = "select * from conge where EID='$a'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listConge[] = new Conge($affichage->CID,$affichage->EID,$affichage->TCID,$affichage->CJOURD,$affichage->CJOURF
                    ,$affichage->CETAT,$affichage->CDDC);
        }
        return $this->listConge; 
    }

}




?>