<?php

include_once '../Classes/Absence.php';
include_once '../Connexion/connexion.php';
include_once '../Dao/IDao.php';

class AbsenceService implements IDao {
private $listAbsence = array();
private $connexion;
function __construct() {
    
    $this->connexion = new Connexion();
}


    public function create($Absence) {
        $query = "INSERT INTO Absence (AID,EID,AJOUR,AMOTIF,AETAT,ADDA ) VALUES"
                . " ('" . $Absence->getID() . "','" . $Absence->getIde() ."','" .$Absence->getJours() ."','" .
                $Absence->getMotif()."','" .$Absence->getEtat()."','" .$Absence->getDda()."')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM absence WHERE AID = '" . $id . "'";
$req = $this->connexion->getConnextion()->prepare($query);
$req->execute();
    }

    public function getAll() {
    $query = "select * from absence ";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listAbsence[] = new absence($affichage->AID,$affichage->EID,$affichage->AJOUR,$affichage->AMOTIF,$affichage->AETAT
                    ,$affichage->ADDA);
        }
        return $this->listAbsence; 
    }

    public function getById($id) {
      $query = "select * from absence where AID='".$id."'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $abs = new absence($affichage->AID,$affichage->EID,$affichage->AJOUR,$affichage->AMOTIF,$affichage->AETAT
                    ,$affichage->ADDA);
        }
        return $abs;
    }

    public function update($absence) {
      $query="update absence set AJOUR='".$absence->getJours()."' ,AMOTIF='".$absence->getMotif()."',AETAT='".$absence->getEtat()."' where AID='".$absence->getId()."' and EID='".$absence->getIde()."'";
       $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();  
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function auth($a, $b) {
        
    }

    public function getAllByid($id) {
        $query = "select * from absence where EID='".$id."'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listAbsence[] = new absence($affichage->AID,$affichage->EID,$affichage->AJOUR,$affichage->AMOTIF,$affichage->AETAT
                    ,$affichage->ADDA);
        }
        return $this->listAbsence; 
        
    }

}




?>