<?php

include_once '../Classes/TypeConge.php';
include_once '../Classes/Conge.php';
include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';

class TypeCongeService implements IDao {

    private $listTypeConge = array();
    private $connexion;

    function __construct() {

        $this->connexion = new Connexion();
    }

    public function create($TypeConge) {
        $query = "INSERT INTO typeconge (TCID,TCLIBELLE) VALUES ('" . $TypeConge->getId() . "','" . $TypeConge->getLibelle() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM typeconge WHERE TCID = '" . $id . "'";
$req = $this->connexion->getConnextion()->prepare($query);
$req->execute();
    }

    public function getAll() {
        $query = "select * from typeconge";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listTypeConge[] = new TypeConge($affichage->TCID, $affichage->TCLIBELLE);
        }
        return $this->listTypeConge;
    }

    public function getById($id) {
        $query = "select * from typeconge WHERE TCID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $tc = new TypeConge($affichage->TCID, $affichage->TCLIBELLE);
        }
        return $tc;
    }

    public function update($TypeConge) {
         $query = "UPDATE typeconge
SET TCLIBELLE='" . $TypeConge->getLibelle() . "'
WHERE TCID='" . $TypeConge->getId() . "'";
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
        
    }

}

?>